<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class VolumeConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('volume-converter');
        return view("tools.converters.volume-converter", compact('tool'));
    }
}