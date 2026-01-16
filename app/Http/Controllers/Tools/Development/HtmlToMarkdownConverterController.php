<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Services\ToolData;
use Illuminate\Http\Request;

class HtmlToMarkdownConverterController extends Controller
{
    public function index()
    {
        $tool = ToolData::getToolBySlug('html-to-markdown-converter');
        return view("tools.development.html-to-markdown-converter", compact('tool'));
    }
}