<?php

namespace App\Http\Controllers\Tools\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;


class SvgToPngConverterController extends Controller
{public function index()
    {
        $tool = Tool::where('slug', 'svg-to-png-converter')->firstOrFail();
        return view("tools.image.svg-to-png-converter", compact('tool'));
    }
}
