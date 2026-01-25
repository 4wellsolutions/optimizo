<?php

namespace App\Http\Controllers\Tools\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DigitalSignatureController extends Controller
{
    public function index()
    {
        $tool = (object) [
            'name' => 'Digital Signature',
            'slug' => 'digital-signature',
            'description' => 'Sign documents securely online.',
            'category' => 'document'
        ];
        return view('tools.document.digital-signature', compact('tool'));
    }
}
