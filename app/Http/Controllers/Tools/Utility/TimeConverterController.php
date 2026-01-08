<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimeConverterController extends Controller
{
    private function getTool($slug)
    {
        return \App\Models\Tool::with(['categoryRelation', 'translations'])->where('slug', $slug)->firstOrFail();
    }

    public function timeZoneConverter()
    {
        $tool = $this->getTool('time-zone-converter');
        return view('tools.time.time-zone-converter', compact('tool'));
    }

    public function epochTimeConverter()
    {
        $tool = $this->getTool('epoch-time-converter');
        return view('tools.time.epoch-time-converter', compact('tool'));
    }

    public function unixToDate()
    {
        $tool = $this->getTool('unix-timestamp-to-date');
        return view('tools.time.unix-to-date', compact('tool'));
    }

    public function dateToUnix()
    {
        $tool = $this->getTool('date-to-unix-timestamp');
        return view('tools.time.date-to-unix', compact('tool'));
    }

    public function utcToLocal()
    {
        $tool = $this->getTool('utc-to-local-time');
        return view('tools.time.utc-to-local', compact('tool'));
    }

    public function localToUtc()
    {
        $tool = $this->getTool('local-time-to-utc');
        return view('tools.time.local-to-utc', compact('tool'));
    }
}
