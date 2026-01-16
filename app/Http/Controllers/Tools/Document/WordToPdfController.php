<?php

namespace App\Http\Controllers\Tools\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class WordToPdfController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'word-to-pdf')->first();
        return view("tools.document.word-to-pdf", compact('tool'));
    }

    public function process(Request $request)
    {
        $request->validate(['file' => 'required|mimes:doc,docx|max:10240']);

        return response()->json([
            'success' => false,
            'message' => __('This feature is currently in development. Please check back soon!')
        ], 503);
    }
}