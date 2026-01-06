<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAgentParserController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'user-agent-parser')->first();
        return view('tools.utility.user-agent-parser', compact('tool'));
    }
}
