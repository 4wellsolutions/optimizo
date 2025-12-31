<?php

namespace App\Http\Controllers\Tools\Network;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class WhatIsMyIspController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'what-is-my-isp')->firstOrFail();
        return view('tools.network.what-is-my-isp', compact('tool'));
    }
}
