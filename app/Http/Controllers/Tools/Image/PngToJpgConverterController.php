<?php

namespace App\Http\Controllers\Tools\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;


class PngToJpgConverterController extends Controller
{public function index()
    {
        $tool = Tool::where('slug', 'png-to-jpg-converter')->firstOrFail();
        return view("tools.image.png-to-jpg-converter", compact('tool'));
    }
}
