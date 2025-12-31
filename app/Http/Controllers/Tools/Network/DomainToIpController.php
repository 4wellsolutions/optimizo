<?php

namespace App\Http\Controllers\Tools\Network;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class DomainToIpController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'domain-to-ip')->firstOrFail();
        return view('tools.network.domain-to-ip', compact('tool'));
    }
}
