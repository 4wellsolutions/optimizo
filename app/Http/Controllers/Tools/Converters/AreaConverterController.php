<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class AreaConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('area-converter');
        return view("tools.converters.area-converter", compact('tool'));
    }
}