<?php

namespace App\Http\Controllers\Tools\Time;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class EpochTimeConverterController extends Controller
{public function index()
    {
        $tool = $this->getTool('epoch-time-converter');
        return view("tools.time.epoch-time-converter", compact('tool'));
    }
}
