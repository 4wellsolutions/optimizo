<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class CodeFormatterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'code-formatter')->firstOrFail();
        return view('tools.development.code-formatter', compact('tool'));
    }

    public function format(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'language' => 'required|in:html,css,javascript,php,python,java,cpp,json',
            'action' => 'required|in:beautify,minify'
        ]);

        $code = $request->code;
        $language = $request->language;
        $action = $request->action;

        try {
            if ($action === 'beautify') {
                $formatted = $this->beautifyCode($code, $language);
            } else {
                $formatted = $this->minifyCode($code, $language);
            }

            return response()->json([
                'success' => true,
                'formatted' => $formatted,
                'language' => $language,
                'action' => $action
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to format code. Please check your syntax.'
            ], 400);
        }
    }

    private function beautifyCode($code, $language)
    {
        switch ($language) {
            case 'html':
                return $this->beautifyHtml($code);
            case 'css':
                return $this->beautifyCss($code);
            case 'javascript':
            case 'json':
                return $this->beautifyJs($code);
            case 'php':
                return $this->beautifyPhp($code);
            default:
                return $this->addIndentation($code);
        }
    }

    private function minifyCode($code, $language)
    {
        switch ($language) {
            case 'html':
                return preg_replace('/\s+/', ' ', $code);
            case 'css':
                return preg_replace('/\s+/', ' ', preg_replace('/\/\*.*?\*\//s', '', $code));
            case 'javascript':
            case 'json':
                return preg_replace('/\s+/', ' ', $code);
            default:
                return preg_replace('/\s+/', ' ', $code);
        }
    }

    private function beautifyHtml($html)
    {
        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        @$dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        return $dom->saveHTML();
    }

    private function beautifyCss($css)
    {
        // Simple CSS beautification
        $css = preg_replace('/\s+/', ' ', $css);
        $css = str_replace('{', "{\n    ", $css);
        $css = str_replace('}', "\n}\n", $css);
        $css = str_replace(';', ";\n    ", $css);
        return trim($css);
    }

    private function beautifyJs($js)
    {
        // Simple JS beautification
        $js = preg_replace('/\s+/', ' ', $js);
        $js = str_replace('{', "{\n    ", $js);
        $js = str_replace('}', "\n}\n", $js);
        $js = str_replace(';', ";\n    ", $js);
        return trim($js);
    }

    private function beautifyPhp($php)
    {
        // Simple PHP beautification
        $php = preg_replace('/\s+/', ' ', $php);
        $php = str_replace('{', "{\n    ", $php);
        $php = str_replace('}', "\n}\n", $php);
        $php = str_replace(';', ";\n    ", $php);
        return trim($php);
    }

    private function addIndentation($code)
    {
        $lines = explode("\n", $code);
        $indentLevel = 0;
        $formatted = [];

        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line))
                continue;

            if (preg_match('/^}/', $line)) {
                $indentLevel--;
            }

            $formatted[] = str_repeat('    ', max(0, $indentLevel)) . $line;

            if (preg_match('/{$/', $line)) {
                $indentLevel++;
            }
        }

        return implode("\n", $formatted);
    }
}
