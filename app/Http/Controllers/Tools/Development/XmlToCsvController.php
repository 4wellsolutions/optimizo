<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class XmlToCsvController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'xml-to-csv')->active()->firstOrFail();
        return view('tools.development.xml-to-csv', compact('tool'));
    }

    public function process(Request $request)
    {
        // Handled in browser
        return response()->json(['error' => 'Client-side processing expected'], 400);
    }
}
