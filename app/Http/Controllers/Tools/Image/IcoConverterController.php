<?php

namespace App\Http\Controllers\Tools\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;


class IcoConverterController extends Controller
{public function index()
    {
        $tool = Tool::where('slug', 'ico-converter')->firstOrFail();
        return view("tools.image.ico-converter", compact('tool'));
    }
}
