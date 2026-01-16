<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class PressureConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('pressure-converter');
        return view("tools.converters.pressure-converter", compact('tool'));
    }
}