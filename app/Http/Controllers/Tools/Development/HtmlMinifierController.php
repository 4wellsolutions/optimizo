<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class HtmlMinifierController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'html-minifier')->firstOrFail();
        return view('tools.development.html-minifier', compact('tool'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'html' => 'required|string',
            'action' => 'required|in:minify,beautify'
        ]);

        $html = $request->html;
        $action = $request->action;

        try {
            if ($action === 'minify') {
                $result = $this->minifyHTML($html);
            } else {
                $result = $this->beautifyHTML($html);
            }

            return response()->json([
                'success' => true,
                'result' => $result
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to process HTML: ' . $e->getMessage()
            ], 500);
        }
    }

    private function minifyHTML($html)
    {
        // Remove HTML comments
        $html = preg_replace('/<!--(.|\s)*?-->/', '', $html);
        // Remove whitespace between tags
        $html = preg_replace('/>\s+</', '><', $html);
        // Remove extra whitespace
        $html = preg_replace('/\s+/', ' ', $html);
        return trim($html);
    }

    private function beautifyHTML($html)
    {
        // Remove extra whitespace first
        $html = preg_replace('/>\s+</', '><', $html);
        // Add line breaks between tags
        $html = preg_replace('/></', '>\n<', $html);

        $lines = explode("\n", $html);
        $indent = 0;
        $result = '';

        foreach ($lines as $line) {
            $trimmed = trim($line);
            if (preg_match('/^<\//', $trimmed)) {
                $indent = max(0, $indent - 1);
            }

            $result .= str_repeat('  ', $indent) . $trimmed . "\n";

            if (preg_match('/^<[^\/]/', $trimmed) && !preg_match('/\/>$/', $trimmed)) {
                if (!preg_match('/<(br|hr|img|input|meta|link)/i', $trimmed)) {
                    $indent++;
                }
            }
        }

        return trim($result);
    }
}
