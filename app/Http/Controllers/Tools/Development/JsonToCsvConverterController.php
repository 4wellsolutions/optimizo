<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class JsonToCsvConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'json-to-csv-converter')->active()->firstOrFail();
        return view('tools.development.json-to-csv-converter', compact('tool'));
    }
}
