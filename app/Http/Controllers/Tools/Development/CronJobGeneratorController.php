<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CronJobGeneratorController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'cron-job-generator')->first();
        return view('tools.development.cron-job-generator', compact('tool'));
    }
}
