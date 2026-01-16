<?php

namespace App\Http\Controllers\Tools\Text;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileDifferenceCheckerController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'file-difference-checker')->first();
        return view("tools.text.file-difference-checker", compact('tool'));
    }
}
