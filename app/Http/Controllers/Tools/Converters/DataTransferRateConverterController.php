<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class DataTransferRateConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('data-transfer-rate-converter');
        return view("tools.converters.data-transfer-rate-converter", compact('tool'));
    }
}