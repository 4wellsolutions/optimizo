<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;

class CsvXmlController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('route_name', 'utility.csv-xml')->firstOrFail();
        return view('tools.utility.csv-xml-converter', compact('tool'));
    }
}
