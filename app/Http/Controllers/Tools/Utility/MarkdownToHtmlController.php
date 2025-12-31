<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Parsedown;

class MarkdownToHtmlController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'markdown-to-html-converter')->firstOrFail();
        return view('tools.utility.markdown-to-html', compact('tool'));
    }

    public function convert(Request $request)
    {
        $request->validate([
            'markdown' => 'required|string|max:100000',
        ]);

        $parsedown = new Parsedown();
        $html = $parsedown->text($request->markdown);

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
}
