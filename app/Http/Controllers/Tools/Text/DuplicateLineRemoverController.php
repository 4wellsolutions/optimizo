<?php

namespace App\Http\Controllers\Tools\Text;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DuplicateLineRemoverController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'duplicate-line-remover')->first();
        return view("tools.text.duplicate-line-remover", compact('tool'));
    }
}
