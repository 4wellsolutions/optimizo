<?php

namespace App\Http\Controllers\Tools\Spreadsheet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class CsvToSqlController extends Controller
{
    public function index(Request $request)
    {
        $tool = Tool::where('slug', 'csv-to-sql')->firstOrFail();
        return view("tools.spreadsheet.csv-to-sql", compact('tool'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
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

                                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                    $spreadsheet = $reader->load($fullPath);
                    $sheet = $spreadsheet->getActiveSheet();
                    $rows = $sheet->toArray();

                    if (empty($rows)) {
                        throw new \Exception("CSV file is empty");
                    }

                    $tableName = $request->input('table_name') ?: Str::slug($baseName, '_');
                    $columns = array_shift($rows);
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

            \Illuminate\Support\Facades\Storage::delete($tempPath);

            return response()->streamDownload(function () use ($outputContent) {
                echo $outputContent;
            }, $outputFilename, $headers);

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Storage::delete($tempPath);
            return back()->with('error', 'Conversion failed: ' . $e->getMessage());
        }
    }
}