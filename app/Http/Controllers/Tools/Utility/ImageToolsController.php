<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class ImageToolsController extends Controller
{
    public function imageConverter()
    {
        $tool = Tool::where('slug', 'image-converter')->firstOrFail();
        return view('tools.image.image-converter', compact('tool'));
    }

    public function jpgToPng()
    {
        $tool = Tool::where('slug', 'jpg-to-png-converter')->firstOrFail();
        return view('tools.image.jpg-to-png-converter', compact('tool'));
    }

    public function pngToJpg()
    {
        $tool = Tool::where('slug', 'png-to-jpg-converter')->firstOrFail();
        return view('tools.image.png-to-jpg-converter', compact('tool'));
    }

    public function jpgToWebp()
    {
        $tool = Tool::where('slug', 'jpg-to-webp-converter')->firstOrFail();
        return view('tools.image.jpg-to-webp-converter', compact('tool'));
    }

    public function webpToJpg()
    {
        $tool = Tool::where('slug', 'webp-to-jpg-converter')->firstOrFail();
        return view('tools.image.webp-to-jpg-converter', compact('tool'));
    }

    public function pngToWebp()
    {
        $tool = Tool::where('slug', 'png-to-webp-converter')->firstOrFail();
        return view('tools.image.png-to-webp-converter', compact('tool'));
    }

    public function imageToBase64()
    {
        $tool = Tool::where('slug', 'image-to-base64-converter')->firstOrFail();
        return view('tools.image.image-to-base64-converter', compact('tool'));
    }

    public function base64ToImage()
    {
        $tool = Tool::where('slug', 'base64-to-image-converter')->firstOrFail();
        return view('tools.image.base64-to-image-converter', compact('tool'));
    }

    public function svgToPng()
    {
        $tool = Tool::where('slug', 'svg-to-png-converter')->firstOrFail();
        return view('tools.image.svg-to-png-converter', compact('tool'));
    }

    public function svgToJpg()
    {
        $tool = Tool::where('slug', 'svg-to-jpg-converter')->firstOrFail();
        return view('tools.image.svg-to-jpg-converter', compact('tool'));
    }

    public function heicToJpg()
    {
        $tool = Tool::where('slug', 'heic-to-jpg-converter')->firstOrFail();
        return view('tools.image.heic-to-jpg-converter', compact('tool'));
    }

    public function icoConverter()
    {
        $tool = Tool::where('slug', 'ico-converter')->firstOrFail();
        return view('tools.image.ico-converter', compact('tool'));
    }
}
