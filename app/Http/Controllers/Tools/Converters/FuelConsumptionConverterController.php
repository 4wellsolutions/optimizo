<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class FuelConsumptionConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('fuel-consumption-converter');
        return view("tools.converters.fuel-consumption-converter", compact('tool'));
    }
}