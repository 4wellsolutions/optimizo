<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class XmlToJsonController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'xml-to-json')->active()->firstOrFail();
        return view('tools.development.xml-to-json', compact('tool'));
    }
}
