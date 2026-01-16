<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class WeightConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('weight-converter');
        return view("tools.converters.weight-converter", compact('tool'));
    }
}