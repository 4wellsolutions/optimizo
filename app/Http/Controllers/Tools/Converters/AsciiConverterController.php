<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class AsciiConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'ascii-converter')->active()->firstOrFail();
        return view('tools.converters.ascii-converter', compact('tool'));
    }

    public function asciiConvert(Request $request)
    {
        return back();
    }
}
