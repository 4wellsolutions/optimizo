<?php

namespace App\Http\Controllers\Tools\Time;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class DateToUnixTimestampController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'date-to-unix-timestamp')->firstOrFail();
        return view('tools.time.date-to-unix-timestamp', compact('tool'));
    }
}