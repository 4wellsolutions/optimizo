<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class BinaryToTextController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'binary-to-text')->firstOrFail();
        return view('tools.converters.binary-to-text', compact('tool'));
    }
}