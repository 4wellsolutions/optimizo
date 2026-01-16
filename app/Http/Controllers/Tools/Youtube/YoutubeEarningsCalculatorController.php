<?php

namespace App\Http\Controllers\Tools\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class YoutubeEarningsCalculatorController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'youtube-earnings-calculator')->active()->firstOrFail();
        return view('tools.youtube.youtube-earnings-calculator', compact('tool'));
    }
}
