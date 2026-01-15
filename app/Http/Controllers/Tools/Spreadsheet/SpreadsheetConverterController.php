<?php

namespace App\Http\Controllers\Tools\Spreadsheet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Tool;

class SpreadsheetConverterController extends Controller
{
    public function index(Request $request)
    {
        // Get tool slug from route defaults
        $toolSlug = $request->route()->parameter('tool') ?? $request->route()->defaults['tool'] ?? null;

        if (!$toolSlug) {
            abort(404, 'Tool not specified');
        }

        $tool = Tool::where('slug', $toolSlug)->firstOrFail();
        // Return valid view based on tool slug
        // excel-to-csv, csv-to-excel, xls-to-xlsx, xlsx-to-xls, google-sheets-to-excel, csv-to-sql
        return view("tools.spreadsheet.{$tool->slug}", compact('tool'));
    }

    public function convert(Request $request)
    {
        // Get tool slug from route defaults
        $tool = $request->route()->parameter('tool') ?? $request->route()->defaults['tool'] ?? null;

        if (!$tool) {
            abort(404, 'Tool not specified');
        }

        $request->validate([
            'file' => 'required|file|max:10240', // 10MB max
            'delimiter' => 'nullable|string',
            'table_name' => 'nullable|string',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $baseName = pathinfo($originalName, PATHINFO_FILENAME);
        $ext = strtolower($file->getClientOriginalExtension());

        $tempPath = $file->store('temp');
        $fullPath = storage_path('app/' . $tempPath);

        try {
            $spreadsheet = null;
            $outputContent = null;
            $outputFilename = '';
            $headers = [];

            switch ($tool) {
                case 'excel-to-csv':
                    $spreadsheet = IOFactory::load($fullPath);
                    $writer = new Csv($spreadsheet);
                    $writer->setDelimiter($request->input('delimiter', ','));
                    $writer->setEnclosure('"');

                    ob_start();
                    $writer->save('php://output');
                    $outputContent = ob_get_clean();
                    $outputFilename = $baseName . '.csv';
                    $headers = [
                        'Content-Type' => 'text/csv',
                        'Content-Disposition' => "attachment; filename=\"{$outputFilename}\""
                    ];
                    break;

                case 'csv-to-excel':
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                    // Detect delimiter if possible or use default
                    $spreadsheet = $reader->load($fullPath);

                    $tempOut = tempnam(sys_get_temp_dir(), 'excel');
                    $writer = new Xlsx($spreadsheet);
                    $writer->save($tempOut);

                    $outputContent = file_get_contents($tempOut);
                    unlink($tempOut);
                    $outputFilename = $baseName . '.xlsx';
                    $headers = [
                        'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'Content-Disposition' => "attachment; filename=\"{$outputFilename}\""
                    ];
                    break;

                case 'xls-to-xlsx':
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                    $spreadsheet = $reader->load($fullPath);

                    $tempOut = tempnam(sys_get_temp_dir(), 'xlsx');
                    $writer = new Xlsx($spreadsheet);
                    $writer->save($tempOut);

                    $outputContent = file_get_contents($tempOut);
                    unlink($tempOut);
                    $outputFilename = $baseName . '.xlsx';
                    $headers = [
                        'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'Content-Disposition' => "attachment; filename=\"{$outputFilename}\""
                    ];
                    break;

                case 'xlsx-to-xls':
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                    $spreadsheet = $reader->load($fullPath);

                    $tempOut = tempnam(sys_get_temp_dir(), 'xls');
                    $writer = new Xls($spreadsheet);
                    $writer->save($tempOut);

                    $outputContent = file_get_contents($tempOut);
                    unlink($tempOut);
                    $outputFilename = $baseName . '.xls';
                    $headers = [
                        'Content-Type' => 'application/vnd.ms-excel',
                        'Content-Disposition' => "attachment; filename=\"{$outputFilename}\""
                    ];
                    break;

                case 'google-sheets-to-excel':
                    // Just alias for CSV/ODS/XLSX to Excel really, but we'll accept whatever they exported
                    $spreadsheet = IOFactory::load($fullPath);

                    $tempOut = tempnam(sys_get_temp_dir(), 'gs_excel');
                    $writer = new Xlsx($spreadsheet);
                    $writer->save($tempOut);

                    $outputContent = file_get_contents($tempOut);
                    unlink($tempOut);
                    $outputFilename = $baseName . '_converted.xlsx';
                    $headers = [
                        'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'Content-Disposition' => "attachment; filename=\"{$outputFilename}\""
                    ];
                    break;

                case 'csv-to-sql':
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                    $spreadsheet = $reader->load($fullPath);
                    $sheet = $spreadsheet->getActiveSheet();
                    $rows = $sheet->toArray();

                    if (empty($rows)) {
                        throw new \Exception("CSV file is empty");
                    }

                    $tableName = $request->input('table_name') ?: Str::slug($baseName, '_');
                    $columns = array_shift($rows); // Assume first row is headers
                    // Sanitize columns
                    $columns = array_map(function ($col) {
                        return '`' . Str::slug($col, '_') . '`';
                    }, $columns);

                    $sql = "CREATE TABLE `{$tableName}` (\n";
                    $sql .= implode(",\n", array_map(function ($col) {
                        return "  {$col} TEXT";
                    }, $columns));
                    $sql .= "\n);\n\n";

                    $sql .= "INSERT INTO `{$tableName}` (" . implode(', ', $columns) . ") VALUES\n";

                    $values = [];
                    foreach ($rows as $row) {
                        $rowValues = array_map(function ($val) {
                            return "'" . addslashes($val) . "'";
                        }, $row);
                        // Pad row if missing columns
                        while (count($rowValues) < count($columns)) {
                            $rowValues[] = "NULL";
                        }
                        $values[] = "(" . implode(', ', $rowValues) . ")";
                    }
                    $sql .= implode(",\n", $values) . ";";

                    $outputContent = $sql;
                    $outputFilename = $baseName . '.sql';
                    $headers = [
                        'Content-Type' => 'application/sql',
                        'Content-Disposition' => "attachment; filename=\"{$outputFilename}\""
                    ];
                    break;

                default:
                    abort(404);
            }

            Storage::delete($tempPath);

            return response()->streamDownload(function () use ($outputContent) {
                echo $outputContent;
            }, $outputFilename, $headers);

        } catch (\Exception $e) {
            Storage::delete($tempPath);
            return back()->with('error', 'Conversion failed: ' . $e->getMessage());
        }
    }
}
