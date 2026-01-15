<?php

namespace App\Http\Controllers\Tools\Text;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoremIpsumGeneratorController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'lorem-ipsum-generator')->first();
        return view('tools.utility.lorem-ipsum-generator', compact('tool'));
    }
}
