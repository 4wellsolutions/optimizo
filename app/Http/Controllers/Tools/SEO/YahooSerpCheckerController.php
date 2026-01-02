<?php

namespace App\Http\Controllers\Tools\Seo;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class YahooSerpCheckerController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'yahoo-serp-checker')->first();

        if (!$tool) {
            $tool = new Tool([
                'name' => 'Yahoo SERP Checker',
                'description' => 'Check Yahoo search results from any location.',
                'slug' => 'yahoo-serp-checker'
            ]);
        }

        return view('tools.seo.yahoo-serp-checker', compact('tool'));
    }
}
