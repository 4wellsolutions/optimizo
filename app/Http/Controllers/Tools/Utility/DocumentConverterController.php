<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
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
        // Placeholder for logic using specialized library or API
        // PDF to Word is complex in pure PHP. Often requires 'pdftotext' or external service.
        // For now, we returns a "not fully implemented" or "best effort" message if lib missing.

        return back()->with('error', 'PDF to Word conversion requires advanced libraries not fully configured.');
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

        try {
            // Logic using PHPOffice/PHPWord to load Docx and save as HTML then PDF (via DomPDF)
            // $phpWord = \PhpOffice\PhpWord\IOFactory::load($request->file('file')->path());
            // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF');
            // $fileName = 'converted_' . time() . '.pdf';
            // $xmlWriter->save(storage_path('app/public/' . $fileName));
            // return response()->download(storage_path('app/public/' . $fileName));
            return back()->with('error', 'Conversion Logic Pending Library Setup');
        } catch (\Exception $e) {
            return back()->with('error', 'Conversion failed: ' . $e->getMessage());
        }
    }

    // --- PDF to Excel ---
    public function indexPdfToExcel()
    {
        $tool = \App\Models\Tool::where('slug', 'pdf-to-excel')->first();
        return view('tools.document.pdf-to-excel', compact('tool'));
    }

    // --- Excel to PDF ---
    public function indexExcelToPdf()
    {
        $tool = \App\Models\Tool::where('slug', 'excel-to-pdf')->first();
        return view('tools.document.excel-to-pdf', compact('tool'));
    }

    // --- PowerPoint to PDF ---
    public function indexPptToPdf()
    {
        $tool = \App\Models\Tool::where('slug', 'powerpoint-to-pdf')->first();
        return view('tools.document.ppt-to-pdf', compact('tool'));
    }

    // --- PDF to PowerPoint ---
    public function indexPdfToPpt()
    {
        $tool = \App\Models\Tool::where('slug', 'pdf-to-powerpoint')->first();
        return view('tools.document.pdf-to-ppt', compact('tool'));
    }

    // --- PDF to JPG ---
    public function indexPdfToJpg()
    {
        $tool = \App\Models\Tool::where('slug', 'pdf-to-jpg')->first();
        return view('tools.document.pdf-to-jpg', compact('tool'));
    }

    // --- JPG to PDF ---
    public function indexJpgToPdf()
    {
        $tool = \App\Models\Tool::where('slug', 'jpg-to-pdf')->first();
        return view('tools.document.jpg-to-pdf', compact('tool'));
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
}
