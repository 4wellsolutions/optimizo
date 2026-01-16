<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class PowerConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('power-converter');
        return view("tools.converters.power-converter", compact('tool'));
    }
}