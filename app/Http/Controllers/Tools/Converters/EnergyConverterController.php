<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class EnergyConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('energy-converter');
        return view("tools.converters.energy-converter", compact('tool'));
    }
}