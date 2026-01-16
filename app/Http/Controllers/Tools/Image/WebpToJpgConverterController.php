<?php

namespace App\Http\Controllers\Tools\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;


class WebpToJpgConverterController extends Controller
{public function index()
    {
        $tool = Tool::where('slug', 'webp-to-jpg-converter')->firstOrFail();
        return view("tools.image.webp-to-jpg-converter", compact('tool'));
    }
}
