<?php

namespace App\Http\Controllers\Tools\Time;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class LocalTimeToUtcController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'local-time-to-utc')->firstOrFail();
        return view('tools.time.local-time-to-utc', compact('tool'));
    }
}