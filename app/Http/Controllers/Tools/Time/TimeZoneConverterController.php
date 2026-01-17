<?php

namespace App\Http\Controllers\Tools\Time;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;

class TimeZoneConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'time-zone-converter')->active()->firstOrFail();
        return view("tools.time.time-zone-converter", compact('tool'));
    }

    public function process(Request $request)
    {
        // Handled in browser
        return response()->json(['error' => 'Client-side processing expected'], 400);
    }
}
