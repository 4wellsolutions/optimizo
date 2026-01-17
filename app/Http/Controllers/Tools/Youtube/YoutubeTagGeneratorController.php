<?php

namespace App\Http\Controllers\Tools\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class YoutubeTagGeneratorController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'youtube-tag-generator')->active()->firstOrFail();
        return view('tools.youtube.youtube-tag-generator', compact('tool'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string|max:255'
        ]);

        $keyword = $request->keyword;

        // Generate related tags based on the keyword
        $tags = $this->generateRelatedTags($keyword);

        return view('tools.youtube.youtube-tag-generator', compact('tags', 'keyword'));
    }

    private function generateRelatedTags($keyword)
    {
        // Generate variations and related tags
        $tags = [];

        // Add the main keyword
        $tags[] = $keyword;

        // Add common variations
        $tags[] = strtolower($keyword);
        $tags[] = ucwords($keyword);

        // Add with common suffixes
        $suffixes = ['tutorial', 'guide', 'tips', 'tricks', 'how to', 'review', '2024', 'explained', 'for beginners'];
        foreach ($suffixes as $suffix) {
            $tags[] = $keyword . ' ' . $suffix;
        }

        // Add with common prefixes
        $prefixes = ['best', 'top', 'learn', 'free', 'complete', 'ultimate'];
        foreach ($prefixes as $prefix) {
            $tags[] = $prefix . ' ' . $keyword;
        }

        // Add word combinations if keyword has multiple words
        $words = explode(' ', $keyword);
        if (count($words) > 1) {
            $tags[] = implode('', $words); // No spaces
            $tags[] = implode('-', $words); // Hyphenated
        }

        return array_unique($tags);
    }
}
