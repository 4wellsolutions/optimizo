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

class CsvToExcelController extends Controller
{
    public function index(Request $request)
    {
        $tool = Tool::where('slug', 'csv-to-excel')->firstOrFail();
        return view("tools.spreadsheet.csv-to-excel", compact('tool'));
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