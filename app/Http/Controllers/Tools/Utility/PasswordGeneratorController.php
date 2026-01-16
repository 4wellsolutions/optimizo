<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class PasswordGeneratorController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'password-generator')->active()->firstOrFail();
        return view('tools.utility.password-generator', compact('tool'));
    }
}
