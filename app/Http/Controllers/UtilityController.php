<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function qrGenerator()
    {
        return view('tools.utility.qr-generator');
    }

    public function generateQr(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:1000'
        ]);

        $text = urlencode($request->text);
        $size = $request->input('size', 300);

        // Use Google Charts API (free, no limits for QR codes)
        $qrUrl = "https://chart.googleapis.com/chart?chs={$size}x{$size}&cht=qr&chl={$text}&choe=UTF-8";

        return view('tools.utility.qr-generator', compact('qrUrl', 'text'));
    }

    public function passwordGenerator()
    {
        return view('tools.utility.password-generator');
    }

    public function generatePassword(Request $request)
    {
        $length = $request->input('length', 16);
        $includeUppercase = $request->input('uppercase', true);
        $includeLowercase = $request->input('lowercase', true);
        $includeNumbers = $request->input('numbers', true);
        $includeSymbols = $request->input('symbols', true);

        $characters = '';
        if ($includeLowercase)
            $characters .= 'abcdefghijklmnopqrstuvwxyz';
        if ($includeUppercase)
            $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($includeNumbers)
            $characters .= '0123456789';
        if ($includeSymbols)
            $characters .= '!@#$%^&*()_+-=[]{}|;:,.<>?';

        $password = '';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[random_int(0, $charactersLength - 1)];
        }

        $strength = $this->calculatePasswordStrength($password);

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'password' => $password,
                'strength' => $strength
            ]);
        }

        return view('tools.utility.password-generator', compact('password', 'strength'));
    }

    public function jsonFormatter()
    {
        return view('tools.utility.json-formatter');
    }

    public function formatJson(Request $request)
    {
        $request->validate([
            'json' => 'required|string'
        ]);

        try {
            $decoded = json_decode($request->json);

            if (json_last_error() !== JSON_ERROR_NONE) {
                $error = 'Invalid JSON: ' . json_last_error_msg();
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json(['success' => false, 'error' => $error], 400);
                }
                return back()->with('error', $error);
            }

            $action = $request->input('action', 'format');
            $formatted = json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            $minified = json_encode($decoded, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            $result = $action === 'minify' ? $minified : $formatted;

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => true, 'result' => $result, 'action' => $action]);
            }

            return view('tools.utility.json-formatter', compact('formatted', 'minified'));
        } catch (\Exception $e) {
            $error = 'Failed to parse JSON';
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'error' => $error], 400);
            }
            return back()->with('error', $error);
        }
    }

    public function base64()
    {
        return view('tools.utility.base64');
    }

    public function processBase64(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'action' => 'required|in:encode,decode'
        ]);

        try {
            if ($request->action === 'encode') {
                $result = base64_encode($request->text);
            } else {
                $result = base64_decode($request->text, true);
                if ($result === false) {
                    $error = 'Invalid Base64 string';
                    if ($request->ajax() || $request->wantsJson()) {
                        return response()->json(['success' => false, 'error' => $error], 400);
                    }
                    return back()->with('error', $error);
                }
            }

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => true, 'result' => $result, 'action' => $request->action]);
            }

            return view('tools.utility.base64', compact('result'));
        } catch (\Exception $e) {
            $error = 'Failed to process text';
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'error' => $error], 400);
            }
            return back()->with('error', $error);
        }
    }

    private function calculatePasswordStrength($password)
    {
        $strength = 0;
        $length = strlen($password);

        // Length
        if ($length >= 8)
            $strength += 20;
        if ($length >= 12)
            $strength += 20;
        if ($length >= 16)
            $strength += 10;

        // Complexity
        if (preg_match('/[a-z]/', $password))
            $strength += 15;
        if (preg_match('/[A-Z]/', $password))
            $strength += 15;
        if (preg_match('/[0-9]/', $password))
            $strength += 10;
        if (preg_match('/[^a-zA-Z0-9]/', $password))
            $strength += 10;

        return min($strength, 100);
    }

    // Username Checker
    public function usernameChecker()
    {
        return view('tools.utility.username-checker');
    }

    // MD5 Generator
    public function md5Generator()
    {
        return view('tools.utility.md5-generator');
    }

    // Case Converter
    public function caseConverter()
    {
        return view('tools.utility.case-converter');
    }

    // RGB to HEX Converter
    public function rgbHexConverter()
    {
        return view('tools.utility.rgb-hex-converter');
    }

    // Slug Generator
    public function slugGenerator()
    {
        return view('tools.utility.slug-generator');
    }

    // Image Compressor
    public function imageCompressor()
    {
        return view('tools.utility.image-compressor');
    }

    // Internet Speed Test
    public function speedTest()
    {
        return view('tools.utility.internet-speed-test');
    }
}
