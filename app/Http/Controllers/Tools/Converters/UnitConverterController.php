<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class UnitConverterController extends Controller
{
    // Batch A: Basic
    public function length()
    {
        $tool = ToolData::getToolBySlug('length-converter');
        return view('tools.converters.length-converter', compact('tool'));
    }

    public function weight()
    {
        $tool = ToolData::getToolBySlug('weight-converter');
        return view('tools.converters.weight-converter', compact('tool'));
    }

    public function temperature()
    {
        $tool = ToolData::getToolBySlug('temperature-converter');
        return view('tools.converters.temperature-converter', compact('tool'));
    }

    public function volume()
    {
        $tool = ToolData::getToolBySlug('volume-converter');
        return view('tools.converters.volume-converter', compact('tool'));
    }

    public function area()
    {
        $tool = ToolData::getToolBySlug('area-converter');
        return view('tools.converters.area-converter', compact('tool'));
    }

    // Batch B: Scientific
    public function speed()
    {
        $tool = ToolData::getToolBySlug('speed-converter');
        return view('tools.converters.speed-converter', compact('tool'));
    }

    public function time()
    {
        $tool = ToolData::getToolBySlug('time-unit-converter');
        return view('tools.converters.time-unit-converter', compact('tool'));
    }

    public function storage()
    {
        $tool = ToolData::getToolBySlug('digital-storage-converter');
        return view('tools.converters.digital-storage-converter', compact('tool'));
    }

    public function energy()
    {
        $tool = ToolData::getToolBySlug('energy-converter');
        return view('tools.converters.energy-converter', compact('tool'));
    }

    public function pressure()
    {
        $tool = ToolData::getToolBySlug('pressure-converter');
        return view('tools.converters.pressure-converter', compact('tool'));
    }

    // Batch C: Engineering
    public function power()
    {
        $tool = ToolData::getToolBySlug('power-converter');
        return view('tools.converters.power-converter', compact('tool'));
    }

    public function force()
    {
        $tool = ToolData::getToolBySlug('force-converter');
        return view('tools.converters.force-converter', compact('tool'));
    }

    public function angle()
    {
        $tool = ToolData::getToolBySlug('angle-converter');
        return view('tools.converters.angle-converter', compact('tool'));
    }

    public function fuel()
    {
        $tool = ToolData::getToolBySlug('fuel-consumption-converter');
        return view('tools.converters.fuel-consumption-converter', compact('tool'));
    }

    public function dataTransfer()
    {
        $tool = ToolData::getToolBySlug('data-transfer-rate-converter');
        return view('tools.converters.data-transfer-rate-converter', compact('tool'));
    }

    // Batch D: Specialized
    public function cooking()
    {
        $tool = ToolData::getToolBySlug('cooking-unit-converter');
        return view('tools.converters.cooking-unit-converter', compact('tool'));
    }

    public function torque()
    {
        $tool = ToolData::getToolBySlug('torque-converter');
        return view('tools.converters.torque-converter', compact('tool'));
    }

    public function density()
    {
        $tool = ToolData::getToolBySlug('density-converter');
        return view('tools.converters.density-converter', compact('tool'));
    }

    public function molarMass()
    {
        $tool = ToolData::getToolBySlug('molar-mass-converter');
        return view('tools.converters.molar-mass-converter', compact('tool'));
    }

    public function frequency()
    {
        $tool = ToolData::getToolBySlug('frequency-converter');
        return view('tools.converters.frequency-converter', compact('tool'));
    }
}
