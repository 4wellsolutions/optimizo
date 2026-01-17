<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;

class JwtDecoderController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'jwt-decoder')->active()->firstOrFail();
        return view("tools.development.jwt-decoder", compact('tool'));
    }

    public function process(Request $request)
    {
        // For standardizing, we add the process method.
        // However, the current blade file handles decoding in the browser.
        return response()->json(['error' => 'Client-side processing expected'], 400);
    }
}
