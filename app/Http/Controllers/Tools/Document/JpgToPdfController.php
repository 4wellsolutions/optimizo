<?php

namespace App\Http\Controllers\Tools\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;


class JpgToPdfController extends Controller
{public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'jpg-to-pdf')->first();
        return view("tools.document.jpg-to-pdf", compact('tool'));
    }

public function process(Request $request)
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
                'download_url' => route('document.jpg-to-pdf.download', ['filename' => $filename])
            ]);

        } catch (\Exception $e) {
            \Log::error('JPG to PDF conversion failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to convert image to PDF. Please ensure the file is a valid image.'
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
