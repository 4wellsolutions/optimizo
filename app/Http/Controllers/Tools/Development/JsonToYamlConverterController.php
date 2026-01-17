<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;

class JsonToYamlConverterController extends Controller
{
    /**
     * Display the JSON to YAML Converter tool.
     */
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])
            ->where('slug', 'json-to-yaml-converter')
            ->active()
            ->firstOrFail();

        return view('tools.development.json-to-yaml-converter', compact('tool'));
    }
}
