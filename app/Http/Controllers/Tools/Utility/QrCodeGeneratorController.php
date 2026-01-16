<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class QrCodeGeneratorController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'qr-code-generator')->active()->firstOrFail();
        return view('tools.utility.qr-code-generator', compact('tool'));
    }
}
