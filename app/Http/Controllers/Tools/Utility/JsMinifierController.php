<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class JsMinifierController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'js-minifier')->firstOrFail();
        return view('tools.development.js-minifier', compact('tool'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'js' => 'required|string',
            'action' => 'required|in:minify,beautify'
        ]);

        $js = $request->js;
        $action = $request->action;

        try {
            if ($action === 'minify') {
                $result = $this->minifyJS($js);
            } else {
                $result = $this->beautifyJS($js);
            }

            return response()->json([
                'success' => true,
                'result' => $result
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to process JavaScript: ' . $e->getMessage()
            ], 500);
        }
    }

    private function minifyJS($js)
    {
        // Remove single-line comments
        $js = preg_replace('!//.*?\n!', "\n", $js);
        // Remove multi-line comments
        $js = preg_replace('!/\*.*?\*/!s', '', $js);
        // Remove whitespace
        $js = preg_replace('/\s+/', ' ', $js);
        // Remove spaces around operators
        $js = preg_replace('/\s*([{}:;,=<>+\-*\/()[\]])\s*/', '$1', $js);
        return trim($js);
    }

    private function beautifyJS($js)
    {
        // Add line breaks after special characters
        $js = preg_replace('/\{/', " {\n  ", $js);
        $js = preg_replace('/\}/', "\n}\n", $js);
        $js = preg_replace('/;/', ";\n  ", $js);
        $js = preg_replace('/\n\s+\n/', "\n", $js);
        return trim($js);
    }
}
