<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class HtmlViewerController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'html-viewer')->firstOrFail();

        return view('tools.development.html-viewer', compact('tool'));
    }
}
