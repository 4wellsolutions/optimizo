<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MorseToTextController extends Controller
{
    public function index()
    {
        $tool = DB::table('tools')->where('slug', 'morse-to-text-converter')->first();
        return view('tools.utility.morse-to-text-converter', compact('tool'));
    }
}
