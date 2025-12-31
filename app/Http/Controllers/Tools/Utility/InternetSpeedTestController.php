<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class InternetSpeedTestController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'internet-speed-test')->firstOrFail();
        return view('tools.utility.internet-speed-test', compact('tool'));
    }
}
