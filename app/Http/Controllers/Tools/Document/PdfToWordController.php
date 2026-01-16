<?php

namespace App\Http\Controllers\Tools\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;


class PdfToWordController extends Controller
{public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'pdf-to-word')->first();
        return view("tools.document.pdf-to-word", compact('tool'));
    }

public function process(Request $request)
    {
        $request->validate(['file' => 'required|mimes:pdf|max:10240']); // 10MB

        return response()->json([
            'success' => false,
            'message' => __('This feature is currently in development. Please check back soon!')
        ], 503);
    }
}
