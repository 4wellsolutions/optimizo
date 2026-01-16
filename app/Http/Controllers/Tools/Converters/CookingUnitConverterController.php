<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class CookingUnitConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('cooking-unit-converter');
        return view("tools.converters.cooking-unit-converter", compact('tool'));
    }
}