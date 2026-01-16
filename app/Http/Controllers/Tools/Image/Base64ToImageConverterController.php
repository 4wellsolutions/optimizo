<?php

namespace App\Http\Controllers\Tools\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;


class Base64ToImageConverterController extends Controller
{public function index()
    {
        $tool = Tool::where('slug', 'base64-to-image-converter')->firstOrFail();
        return view("tools.image.base64-to-image-converter", compact('tool'));
    }
}
