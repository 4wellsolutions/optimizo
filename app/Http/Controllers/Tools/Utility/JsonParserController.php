<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class JsonParserController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'json-parser')->firstOrFail();

        return view('tools.utility.json-parser', compact('tool'));
    }
}
