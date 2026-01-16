<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class TemperatureConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('temperature-converter');
        return view("tools.converters.temperature-converter", compact('tool'));
    }
}