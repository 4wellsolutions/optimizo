<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class ImageCompressorController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'image-compressor')->firstOrFail();

        return view('tools.utility.image-compressor', compact('tool'));
    }
}
