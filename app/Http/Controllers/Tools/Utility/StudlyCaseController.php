<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudlyCaseController extends Controller
{
    public function index()
    {
        $tool = DB::table('tools')->where('slug', 'studly-case-converter')->first();
        return view('tools.utility.studly-case-converter', compact('tool'));
    }
}
