<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SentenceCaseController extends Controller
{
    public function index()
    {
        $tool = DB::table('tools')->where('slug', 'sentence-case-converter')->first();
        return view('tools.utility.sentence-case-converter', compact('tool'));
    }
}
