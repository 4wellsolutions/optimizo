<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class ForceConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('force-converter');
        return view("tools.converters.force-converter", compact('tool'));
    }
}