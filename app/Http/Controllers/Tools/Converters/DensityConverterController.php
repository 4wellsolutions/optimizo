<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class DensityConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('density-converter');
        return view("tools.converters.density-converter", compact('tool'));
    }
}