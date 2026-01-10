<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Barryvdh\DomPDF\Facade\Pdf;
// Libraries will be used here
// use PhpOffice\PhpWord\PhpWord;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use setasign\Fpdi\Fpdi;

class DocumentConverterController extends Controller
{
    // --- PDF to Word ---
    public function indexPdfToWord()
    {
        $tool = \App\Models\Tool::where('slug', 'pdf-to-word')->first();
        return view('tools.document.pdf-to-word', compact('tool'));
    }

    public function processPdfToWord(Request $request)
    {
        $request->validate(['file' => 'required|mimes:pdf|max:10240']); // 10MB

        return response()->json([
            'success' => false,
            'message' => __('This feature is currently in development. Please check back soon!')
        ], 503);
    }

    // --- Word to PDF ---
    public function indexWordToPdf()
    {
        $tool = \App\Models\Tool::where('slug', 'word-to-pdf')->first();
        return view('tools.document.word-to-pdf', compact('tool'));
    }

    public function processWordToPdf(Request $request)
    {
        $request->validate(['file' => 'required|mimes:doc,docx|max:10240']);

        return response()->json([
            'success' => false,
            'message' => __('This feature is currently in development. Please check back soon!')
        ], 503);
    }

    // --- PDF to Excel ---
    public function indexPdfToExcel()
    {
        $tool = \App\Models\Tool::where('slug', 'pdf-to-excel')->first();
        return view('tools.document.pdf-to-excel', compact('tool'));
    }

    public function processPdfToExcel(Request $request)
    {
        $request->validate(['file' => 'required|mimes:pdf|max:10240']);

        return response()->json([
            'success' => false,
            'message' => __('This feature is currently in development. Please check back soon!')
        ], 503);
    }

    // --- Excel to PDF ---
    public function indexExcelToPdf()
    {
        $tool = \App\Models\Tool::where('slug', 'excel-to-pdf')->first();
        return view('tools.document.excel-to-pdf', compact('tool'));
    }

    public function processExcelToPdf(Request $request)
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
                'download_url' => route('utility.excel-to-pdf.download', ['filename' => $filename])
            ]);

        } catch (\Exception $e) {
            \Log::error('Excel to PDF conversion failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to convert Excel to PDF. Please ensure the file is a valid Excel document.'
            ], 500);
        }
    }

    // --- PowerPoint to PDF ---
    public function indexPptToPdf()
    {
        $tool = \App\Models\Tool::where('slug', 'powerpoint-to-pdf')->first();
        return view('tools.document.ppt-to-pdf', compact('tool'));
    }

    public function processPptToPdf(Request $request)
    {
        $request->validate(['file' => 'required|mimes:ppt,pptx|max:10240']);

        return response()->json([
            'success' => false,
            'message' => __('This feature is currently in development. Please check back soon!')
        ], 503);
    }

    // --- PDF to PowerPoint ---
    public function indexPdfToPpt()
    {
        $tool = \App\Models\Tool::where('slug', 'pdf-to-powerpoint')->first();
        return view('tools.document.pdf-to-ppt', compact('tool'));
    }

    public function processPdfToPpt(Request $request)
    {
        $request->validate(['file' => 'required|mimes:pdf|max:10240']);

        return response()->json([
            'success' => false,
            'message' => __('This feature is currently in development. Please check back soon!')
        ], 503);
    }

    // --- PDF to JPG ---
    public function indexPdfToJpg()
    {
        $tool = \App\Models\Tool::where('slug', 'pdf-to-jpg')->first();
        return view('tools.document.pdf-to-jpg', compact('tool'));
    }

    public function processPdfToJpg(Request $request)
    {
        $request->validate(['file' => 'required|mimes:pdf|max:10240']);

        return response()->json([
            'success' => false,
            'message' => __('This feature is currently in development. Please check back soon!')
        ], 503);
    }

    // --- JPG to PDF ---
    public function indexJpgToPdf()
    {
        $tool = \App\Models\Tool::where('slug', 'jpg-to-pdf')->first();
        return view('tools.document.jpg-to-pdf', compact('tool'));
    }

    public function processJpgToPdf(Request $request)
    {
        try {
            $request->validate(['file' => 'required|mimes:jpg,jpeg,png|max:10240']);

            $file = $request->file('file');
            $filename = Str::random(32);
            $storagePath = storage_path('app/temp');

            // Create temp directory if it doesn't exist
            if (!file_exists($storagePath)) {
                mkdir($storagePath, 0755, true);
            }

            // Save uploaded image temporarily
            $imagePath = $storagePath . '/' . $filename . '_img.' . $file->getClientOriginalExtension();
            $file->move($storagePath, $filename . '_img.' . $file->getClientOriginalExtension());

            // Get image dimensions
            list($width, $height) = getimagesize($imagePath);

            // Create HTML with the image
            $html = '<html><body style="margin:0;padding:0;"><img src="' . $imagePath . '" style="width:100%;height:auto;"/></body></html>';

            // Generate PDF
            $pdf = Pdf::loadHTML($html);

            // Set paper size based on image aspect ratio
            if ($width > $height) {
                $pdf->setPaper('A4', 'landscape');
            } else {
                $pdf->setPaper('A4', 'portrait');
            }

            $pdfPath = $storagePath . '/' . $filename . '.pdf';
            $pdf->save($pdfPath);

            // Clean up temp image
            @unlink($imagePath);

            return response()->json([
                'success' => true,
                'message' => 'Image converted to PDF successfully!',
                'download_url' => route('utility.jpg-to-pdf.download', ['filename' => $filename])
            ]);

        } catch (\Exception $e) {
            \Log::error('JPG to PDF conversion failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to convert image to PDF. Please ensure the file is a valid image.'
            ], 500);
        }
    }

    // --- PDF Compressor ---
    public function indexPdfCompressor()
    {
        $tool = \App\Models\Tool::where('slug', 'pdf-compressor')->first();
        return view('tools.document.pdf-compressor', compact('tool'));
    }

    // --- PDF Merger ---
    public function indexPdfMerger()
    {
        $tool = \App\Models\Tool::where('slug', 'pdf-merger')->first();
        return view('tools.document.pdf-merger', compact('tool'));
    }

    // --- PDF Splitter ---
    public function indexPdfSplitter()
    {
        $tool = \App\Models\Tool::where('slug', 'pdf-splitter')->first();
        return view('tools.document.pdf-splitter', compact('tool'));
    }

    // --- Download Methods ---
    public function downloadExcelToPdf($filename)
    {
        $filePath = storage_path('app/temp/' . $filename . '.pdf');

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath, 'converted.pdf')->deleteFileAfterSend(true);
    }

    public function downloadJpgToPdf($filename)
    {
        $filePath = storage_path('app/temp/' . $filename . '.pdf');

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath, 'converted.pdf')->deleteFileAfterSend(true);
    }
}
