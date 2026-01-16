<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class DigitalStorageConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('digital-storage-converter');
        return view("tools.converters.digital-storage-converter", compact('tool'));
    }
}