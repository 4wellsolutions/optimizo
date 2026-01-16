<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class FrequencyConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('frequency-converter');
        return view("tools.converters.frequency-converter", compact('tool'));
    }
}