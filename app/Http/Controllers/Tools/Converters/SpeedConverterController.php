<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class SpeedConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('speed-converter');
        return view("tools.converters.speed-converter", compact('tool'));
    }
}