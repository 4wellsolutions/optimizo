<?php

namespace App\Http\Controllers\Tools\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;


class ImageConverterController extends Controller
{public function index()
    {
        $tool = Tool::where('slug', 'image-converter')->firstOrFail();
        return view("tools.image.image-converter", compact('tool'));
    }
}
