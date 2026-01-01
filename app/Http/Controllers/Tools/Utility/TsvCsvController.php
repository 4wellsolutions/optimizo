<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;

class TsvCsvController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('route_name', 'utility.tsv-csv')->firstOrFail();
        return view('tools.utility.tsv-csv-converter', compact('tool'));
    }
}
