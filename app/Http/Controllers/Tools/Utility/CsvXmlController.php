<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;

class CsvXmlController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'csv-to-xml-converter')->firstOrFail();
        return view('tools.development.csv-to-xml-converter', compact('tool'));
    }
}
