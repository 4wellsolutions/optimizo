<?php

namespace App\Http\Controllers\Tools\Spreadsheet;

use App\Http\Controllers\Controller;

class TsvCsvController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'tsv-to-csv-converter')->firstOrFail();
        return view('tools.utility.tsv-to-csv-converter', compact('tool'));
    }

    public function convert()
    {
        // TODO: Implement conversion logic
        return back()->with('error', 'Conversion not yet implemented');
    }
}
