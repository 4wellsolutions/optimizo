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

class ExcelToCsvController extends Controller
{
    public function index(Request $request)
    {
        $tool = Tool::where('slug', 'excel-to-csv')->firstOrFail();
        return view("tools.spreadsheet.excel-to-csv", compact('tool'));
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