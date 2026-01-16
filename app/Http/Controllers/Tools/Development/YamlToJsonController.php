<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class YamlToJsonController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'yaml-to-json')->active()->firstOrFail();
        return view('tools.development.yaml-to-json', compact('tool'));
    }
}
