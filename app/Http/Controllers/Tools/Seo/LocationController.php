<?php

namespace App\Http\Controllers\Tools\Seo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LocationController extends Controller
{
    /**
     * Search for locations based on query string.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
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
