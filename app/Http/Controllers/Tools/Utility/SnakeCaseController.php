<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SnakeCaseController extends Controller
{
    public function index()
    {
        $tool = DB::table('tools')->where('slug', 'snake-case-converter')->first();
        return view('tools.utility.snake-case-converter', compact('tool'));
    }
}
