<?php

namespace App\Http\Controllers\Tools\Text;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class MorseToTextConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'morse-to-text-converter')->firstOrFail();
        return view("tools.text.morse-to-text-converter", compact('tool'));
    }

    public function process(Request $request)
    {
        // Handled in browser
        return response()->json(['error' => 'Client-side processing expected'], 400);
    }
}
