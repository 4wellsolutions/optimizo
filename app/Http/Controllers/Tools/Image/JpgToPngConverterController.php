<?php

namespace App\Http\Controllers\Tools\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;


class JpgToPngConverterController extends Controller
{public function index()
    {
        $tool = Tool::where('slug', 'jpg-to-png-converter')->firstOrFail();
        return view("tools.image.jpg-to-png-converter", compact('tool'));
    }
}
