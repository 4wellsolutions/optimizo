<?php

namespace App\Http\Controllers\Tools\Time;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;

class EpochTimeConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'epoch-time-converter')->active()->firstOrFail();
        return view("tools.time.epoch-time-converter", compact('tool'));
    }

    public function process(Request $request)
    {
        // Handled in browser
        return response()->json(['error' => 'Client-side processing expected'], 400);
    }
}
