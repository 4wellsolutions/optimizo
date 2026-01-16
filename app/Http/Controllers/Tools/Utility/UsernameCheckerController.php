<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class UsernameCheckerController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'username-checker')->active()->firstOrFail();
        return view('tools.utility.username-checker', compact('tool'));
    }
}
