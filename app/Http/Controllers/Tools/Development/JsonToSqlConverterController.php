<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class JsonToSqlConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('json-to-sql-converter');
        return view("tools.development.json-to-sql-converter", compact('tool'));
    }
}