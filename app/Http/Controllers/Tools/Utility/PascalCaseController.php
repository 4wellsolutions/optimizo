<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PascalCaseController extends Controller
{
    public function index()
    {
        $tool = DB::table('tools')->where('slug', 'pascal-case-converter')->first();
        return view('tools.utility.pascal-case-converter', compact('tool'));
    }
}
