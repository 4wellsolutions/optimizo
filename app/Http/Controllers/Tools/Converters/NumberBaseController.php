<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class NumberBaseController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'number-base-converter')->firstOrFail();
        return view('tools.utility.number-base-converter', compact('tool'));
    }
}
