<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;

class JsonSqlController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('route_name', 'utility.json-sql')->firstOrFail();
        return view('tools.utility.json-sql-converter', compact('tool'));
    }
}
