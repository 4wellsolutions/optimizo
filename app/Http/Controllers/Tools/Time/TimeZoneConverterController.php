<?php

namespace App\Http\Controllers\Tools\Time;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TimeZoneConverterController extends Controller
{public function index()
    {
        $tool = $this->getTool('time-zone-converter');
        return view("tools.time.time-zone-converter", compact('tool'));
    }
}
