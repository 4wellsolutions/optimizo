<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;

class JsonSqlController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('route_name', 'utility.json-sql')->firstOrFail();
        return view("tools.development.json-to-sql-converter", compact('tool'));
    }
}
