<?php

namespace App\Http\Controllers\Tools\Network;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class InternetSpeedTestController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'internet-speed-test')->firstOrFail();
        return view("tools.network.internet-speed-test", compact('tool'));
    }
}
