<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CamelCaseController extends Controller
{
    public function index()
    {
        $tool = DB::table('tools')->where('slug', 'camel-case-converter')->first();
        return view('tools.utility.camel-case-converter', compact('tool'));
    }
}
