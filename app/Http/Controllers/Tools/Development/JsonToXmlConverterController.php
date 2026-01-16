<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class JsonToXmlConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('json-to-xml-converter');
        return view("tools.development.json-to-xml-converter", compact('tool'));
    }
}