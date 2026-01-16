<?php

namespace App\Http\Controllers\Tools\Time;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class TimeUnitConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('time-unit-converter');
        return view("tools.time.time-unit-converter", compact('tool'));
    }
}