<?php

namespace App\Http\Controllers\Tools\Seo;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class SlugGeneratorController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'slug-generator')->firstOrFail();
        return view("tools.seo.slug-generator", compact('tool'));
    }
}
