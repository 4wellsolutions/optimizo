<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class TorqueConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('torque-converter');
        return view("tools.converters.torque-converter", compact('tool'));
    }
}