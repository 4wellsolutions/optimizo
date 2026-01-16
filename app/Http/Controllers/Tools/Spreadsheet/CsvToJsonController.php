<?php

namespace App\Http\Controllers\Tools\Spreadsheet;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class CsvToJsonController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'csv-to-json')->firstOrFail();
        return view('tools.spreadsheet.csv-to-json', compact('tool'));
    }
}