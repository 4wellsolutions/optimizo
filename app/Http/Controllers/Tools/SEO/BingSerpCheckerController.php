<?php

namespace App\Http\Controllers\Tools\Seo;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class BingSerpCheckerController extends Controller
{
    public function index()
    {
        // Ideally we would have a tool record for 'bing-serp-checker' but for now we might mock it or reuse metadata
        // For this task, assuming we might not have a database entry yet, so we'll pass a dummy object or just view data.
        // However, checking the Google one, it uses Tool::where(...)->firstOrFail().
        // If the user hasn't seeded the DB, this might fail.
        // But since I'm implementing based on the request, I'll follow the pattern.
        // If it fails, I'll fix the seed/data later.
        // Actually, to be safe and avoid 404s if data is missing, I will soft-fail or mock if not found, 
        // but sticking to the Google pattern is better consistency.

        // Use a try-catch or just standard lookup if we expect data to be there. 
        // Given I cannot run seeders easily, I will create a fallback object if the DB record is missing
        // so the tool works immediately.

        $tool = Tool::where('slug', 'bing-serp-checker')->first();

        if (!$tool) {
            $tool = new Tool([
                'name' => 'Bing SERP Checker',
                'description' => 'Check Bing search results from any location.',
                'slug' => 'bing-serp-checker'
            ]);
        }

        return view('tools.seo.bing-serp-checker', compact('tool'));
    }
}
