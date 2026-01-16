<?php

namespace App\Http\Controllers\Tools\Time;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class UnixTimestampToDateController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'unix-timestamp-to-date')->firstOrFail();
        return view('tools.time.unix-timestamp-to-date', compact('tool'));
    }
}