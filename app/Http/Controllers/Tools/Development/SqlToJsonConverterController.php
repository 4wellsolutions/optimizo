<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class SqlToJsonConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'sql-to-json-converter')->firstOrFail();
        return view('tools.development.sql-to-json-converter', compact('tool'));
    }
}