<?php

namespace App\Http\Controllers\Tools\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;


class HeicToJpgConverterController extends Controller
{public function index()
    {
        $tool = Tool::where('slug', 'heic-to-jpg-converter')->firstOrFail();
        return view("tools.image.heic-to-jpg-converter", compact('tool'));
    }
}
