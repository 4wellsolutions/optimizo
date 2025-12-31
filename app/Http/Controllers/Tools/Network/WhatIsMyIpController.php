<?php

namespace App\Http\Controllers\Tools\Network;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class WhatIsMyIpController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'what-is-my-ip')->firstOrFail();
        return view('tools.network.what-is-my-ip', compact('tool'));
    }
}
