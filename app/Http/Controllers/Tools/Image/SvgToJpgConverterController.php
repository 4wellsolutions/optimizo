<?php

namespace App\Http\Controllers\Tools\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;


class SvgToJpgConverterController extends Controller
{public function index()
    {
        $tool = Tool::where('slug', 'svg-to-jpg-converter')->firstOrFail();
        return view("tools.image.svg-to-jpg-converter", compact('tool'));
    }
}
