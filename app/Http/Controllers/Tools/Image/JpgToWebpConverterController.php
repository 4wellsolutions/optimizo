<?php

namespace App\Http\Controllers\Tools\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;


class JpgToWebpConverterController extends Controller
{public function index()
    {
        $tool = Tool::where('slug', 'jpg-to-webp-converter')->firstOrFail();
        return view("tools.image.jpg-to-webp-converter", compact('tool'));
    }
}
