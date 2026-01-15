<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class CssMinifierController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'css-minifier')->firstOrFail();
        return view('tools.development.css-minifier', compact('tool'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'css' => 'required|string',
            'action' => 'required|in:minify,beautify'
        ]);

        $css = $request->css;
        $action = $request->action;

        try {
            if ($action === 'minify') {
                $result = $this->minifyCSS($css);
            } else {
                $result = $this->beautifyCSS($css);
            }

            return response()->json([
                'success' => true,
                'result' => $result
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to process CSS: ' . $e->getMessage()
            ], 500);
        }
    }

    private function minifyCSS($css)
    {
        // Remove comments
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
        // Remove whitespace
        $css = preg_replace('/\s+/', ' ', $css);
        // Remove spaces around special characters
        $css = preg_replace('/\s*([{}:;,>+~])\s*/', '$1', $css);
        // Remove last semicolon in block
        $css = preg_replace('/;}/', '}', $css);
        return trim($css);
    }

    private function beautifyCSS($css)
    {
        // Remove existing formatting
        $css = preg_replace('/\s+/', ' ', $css);
        // Add line breaks and indentation
        $css = preg_replace('/\{/', " {\n  ", $css);
        $css = preg_replace('/\}/', "\n}\n", $css);
        $css = preg_replace('/;/', ";\n  ", $css);
        $css = preg_replace('/\n\s+\n/', "\n", $css);
        return trim($css);
    }
}
