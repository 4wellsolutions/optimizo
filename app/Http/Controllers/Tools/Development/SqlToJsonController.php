<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class SqlToJsonController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'sql-to-json')->active()->firstOrFail();
        return view('tools.development.sql-to-json', compact('tool'));
    }
}
