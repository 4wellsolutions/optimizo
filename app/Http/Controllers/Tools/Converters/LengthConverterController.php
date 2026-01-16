<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class LengthConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('length-converter');
        return view("tools.converters.length-converter", compact('tool'));
    }
}