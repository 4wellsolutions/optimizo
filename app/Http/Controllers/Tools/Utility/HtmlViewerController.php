<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class HtmlViewerController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'html-viewer')->firstOrFail();

        return view('tools.utility.html-viewer', compact('tool'));
    }
}
