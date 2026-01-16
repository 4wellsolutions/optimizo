<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class AngleConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('angle-converter');
        return view("tools.converters.angle-converter", compact('tool'));
    }
}