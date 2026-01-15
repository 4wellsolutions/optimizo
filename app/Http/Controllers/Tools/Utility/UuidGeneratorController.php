<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UuidGeneratorController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'uuid-generator')->first();
        return view('tools.development.uuid-generator', compact('tool'));
    }
}
