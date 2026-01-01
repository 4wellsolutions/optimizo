<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TextToMorseController extends Controller
{
    public function index()
    {
        $tool = DB::table('tools')->where('slug', 'text-to-morse-converter')->first();
        return view('tools.utility.text-to-morse-converter', compact('tool'));
    }
}
