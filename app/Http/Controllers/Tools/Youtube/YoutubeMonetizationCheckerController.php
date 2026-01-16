<?php

namespace App\Http\Controllers\Tools\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class YoutubeMonetizationCheckerController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'youtube-monetization-checker')->active()->firstOrFail();
        return view('tools.youtube.youtube-monetization-checker', compact('tool'));
    }

    public function check(Request $request)
    {
        // Implementation logic placeholder
        return back();
    }
}
