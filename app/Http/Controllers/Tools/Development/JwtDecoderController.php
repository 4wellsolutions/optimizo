<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;

class JwtDecoderController extends Controller
{
    public function urlEncode()
    {
        $tool = Tool::where('slug', 'url-encoder')->firstOrFail();
        return view("tools.development.url-encoder-decoder", compact('tool'));
    }

    public function urlDecode()
    {
        $tool = Tool::where('slug', 'url-decoder')->firstOrFail();
        return view("tools.development.url-encoder-decoder", compact('tool'));
    }

    public function htmlEncode()
    {
        $tool = Tool::where('slug', 'html-encoder')->firstOrFail();
        return view("tools.development.html-encoder-decoder", compact('tool'));
    }

    public function htmlDecode()
    {
        $tool = Tool::where('slug', 'html-decoder')->firstOrFail();
        return view("tools.development.html-encoder-decoder", compact('tool'));
    }

    public function unicodeEncode()
    {
        $tool = Tool::where('slug', 'unicode-encoder')->firstOrFail();
        return view("tools.development.unicode-encoder-decoder", compact('tool'));
    }

    public function unicodeDecode()
    {
        $tool = Tool::where('slug', 'unicode-decoder')->firstOrFail();
        return view("tools.development.unicode-encoder-decoder", compact('tool'));
    }

    public function jwtDecode()
    {
        $tool = Tool::where('slug', 'jwt-decoder')->firstOrFail();
        return view("tools.development.jwt-decoder", compact('tool'));
    }

    public function asciiConvert()
    {
        $tool = Tool::where('slug', 'ascii-converter')->firstOrFail();
        return view("tools.converters.ascii-converter", compact('tool'));
    }
}
