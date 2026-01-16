<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class MolarMassConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('molar-mass-converter');
        return view("tools.converters.molar-mass-converter", compact('tool'));
    }
}