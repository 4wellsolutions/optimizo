<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class QrGeneratorController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'qr-code-generator')->firstOrFail();
        return view('tools.utility.qr-generator', compact('tool'));
    }
}
