<?php

namespace App\Http\Controllers\Tools\Seo;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Support\Facades\File;

class GoogleSerpCheckerController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'google-serp-checker')->firstOrFail();
        return view('tools.seo.google-serp-checker', compact('tool'));
    }

    public function searchLocations(\Illuminate\Http\Request $request)
    {
        $query = $request->get('q');
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $results = [];
        $query = strtolower($query);
        $limit = 10;

        $path = resource_path('data/locations_full.jsonl');

        if (!File::exists($path)) {
            return response()->json([]);
        }

        $handle = fopen($path, 'r');
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $location = json_decode($line, true);
                if (isset($location['name']) && str_contains(strtolower($location['name']), $query)) {
                    $results[] = $location;
                    if (count($results) >= $limit) {
                        break;
                    }
                }
            }
            fclose($handle);
        }

        return response()->json($results);
    }
}
