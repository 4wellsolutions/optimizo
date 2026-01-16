<?php

namespace App\Http\Controllers\Tools\Time;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class UtcToLocalTimeController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'utc-to-local-time')->firstOrFail();
        return view('tools.time.utc-to-local-time', compact('tool'));
    }
}