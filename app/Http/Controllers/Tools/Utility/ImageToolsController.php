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
        return view('tools.utility.image.image-converter', compact('tool'));
    }

    public function jpgToPng()
    {
        $tool = Tool::where('slug', 'jpg-to-png-converter')->firstOrFail();
        return view('tools.utility.image.jpg-to-png', compact('tool'));
    }

    public function pngToJpg()
    {
        $tool = Tool::where('slug', 'png-to-jpg-converter')->firstOrFail();
        return view('tools.utility.image.png-to-jpg', compact('tool'));
    }

    public function jpgToWebp()
    {
        $tool = Tool::where('slug', 'jpg-to-webp-converter')->firstOrFail();
        return view('tools.utility.image.jpg-to-webp', compact('tool'));
    }

    public function webpToJpg()
    {
        $tool = Tool::where('slug', 'webp-to-jpg-converter')->firstOrFail();
        return view('tools.utility.image.webp-to-jpg', compact('tool'));
    }

    public function pngToWebp()
    {
        $tool = Tool::where('slug', 'png-to-webp-converter')->firstOrFail();
        return view('tools.utility.image.png-to-webp', compact('tool'));
    }

    public function imageToBase64()
    {
        $tool = Tool::where('slug', 'image-to-base64-converter')->firstOrFail();
        return view('tools.utility.image.image-to-base64', compact('tool'));
    }

    public function base64ToImage()
    {
        $tool = Tool::where('slug', 'base64-to-image-converter')->firstOrFail();
        return view('tools.utility.image.base64-to-image', compact('tool'));
    }

    public function svgToPng()
    {
        $tool = Tool::where('slug', 'svg-to-png-converter')->firstOrFail();
        return view('tools.utility.image.svg-to-png', compact('tool'));
    }

    public function svgToJpg()
    {
        $tool = Tool::where('slug', 'svg-to-jpg-converter')->firstOrFail();
        return view('tools.utility.image.svg-to-jpg', compact('tool'));
    }

    public function heicToJpg()
    {
        $tool = Tool::where('slug', 'heic-to-jpg-converter')->firstOrFail();
        return view('tools.utility.image.heic-to-jpg', compact('tool'));
    }

    public function icoConverter()
    {
        $tool = Tool::where('slug', 'ico-converter')->firstOrFail();
        return view('tools.utility.image.ico-converter', compact('tool'));
    }
}
