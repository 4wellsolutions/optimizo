<?php

namespace App\Http\Controllers\Tools\Spreadsheet;

use App\Http\Controllers\Controller;

class CsvToXmlConverterController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'csv-to-xml-converter')->firstOrFail();
        return view("tools.spreadsheet.csv-to-xml-converter", compact('tool'));
    }
}
