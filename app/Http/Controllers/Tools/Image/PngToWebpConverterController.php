<?php

namespace App\Http\Controllers\Tools\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;


class PngToWebpConverterController extends Controller
{public function index()
    {
        $tool = Tool::where('slug', 'png-to-webp-converter')->firstOrFail();
        return view("tools.image.png-to-webp-converter", compact('tool'));
    }
}
