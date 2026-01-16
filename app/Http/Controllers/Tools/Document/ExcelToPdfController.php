<?php

namespace App\Http\Controllers\Tools\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;


class ExcelToPdfController extends Controller
{public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'excel-to-pdf')->first();
        return view("tools.document.excel-to-pdf", compact('tool'));
    }

public function process(Request $request)
    {
        try {
            $request->validate(['file' => 'required|mimes:xls,xlsx|max:10240']);

            $file = $request->file('file');
            $filename = Str::random(32);
            $storagePath = storage_path('app/temp');

            // Create temp directory if it doesn't exist
            if (!file_exists($storagePath)) {
                mkdir($storagePath, 0755, true);
            }

            // Load the Excel file
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getRealPath());

            // Convert to HTML
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Html($spreadsheet);
            $htmlContent = $writer->generateHTMLAll();

            // Generate PDF from HTML
            $pdf = Pdf::loadHTML($htmlContent);
            $pdf->setPaper('A4', 'landscape');

            $pdfPath = $storagePath . '/' . $filename . '.pdf';
            $pdf->save($pdfPath);

            // Clean up
            $file->delete();

            return response()->json([
                'success' => true,
                'message' => 'Excel converted to PDF successfully!',
                'download_url' => route('document.excel-to-pdf.download', ['filename' => $filename])
            ]);

        } catch (\Exception $e) {
            \Log::error('Excel to PDF conversion failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to convert Excel to PDF. Please ensure the file is a valid Excel document.'
            ], 500);
        }
    }

public function download($filename)
    {
        $filePath = storage_path('app/temp/' . $filename . '.pdf');

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath, 'converted.pdf')->deleteFileAfterSend(true);
    }
}
