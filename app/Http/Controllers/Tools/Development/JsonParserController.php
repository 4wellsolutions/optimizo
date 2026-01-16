<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class JsonParserController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'json-parser')->firstOrFail();

        return view("tools.development.json-parser", compact('tool'));
    }
}
