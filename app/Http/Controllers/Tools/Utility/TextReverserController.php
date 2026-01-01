<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TextReverserController extends Controller
{
    public function index()
    {
        $tool = DB::table('tools')->where('slug', 'text-reverser')->first();
        return view('tools.utility.text-reverser', compact('tool'));
    }
}
