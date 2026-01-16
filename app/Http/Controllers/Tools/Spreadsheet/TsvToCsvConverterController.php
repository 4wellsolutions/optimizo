<?php

namespace App\Http\Controllers\Tools\Spreadsheet;

use App\Http\Controllers\Controller;

class TsvToCsvConverterController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'tsv-to-csv-converter')->firstOrFail();
        return view("tools.spreadsheet.tsv-to-csv-converter", compact('tool'));
    }

    public function convert()
    {
        // TODO: Implement conversion logic
        return back()->with('error', 'Conversion not yet implemented');
    }
}
