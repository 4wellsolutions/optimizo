<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KebabCaseController extends Controller
{
    public function index()
    {
        $tool = DB::table('tools')->where('slug', 'kebab-case-converter')->first();
        return view('tools.utility.kebab-case-converter', compact('tool'));
    }
}
