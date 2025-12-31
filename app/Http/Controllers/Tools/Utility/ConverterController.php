<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConverterController extends Controller
{
    /**
     * HTML to Markdown Converter
     */
    public function htmlToMarkdown()
    {
        $tool = DB::table('tools')->where('slug', 'html-to-markdown-converter')->first();
        return view('tools.utility.html-to-markdown', compact('tool'));
    }

    /**
     * CSV to JSON Converter
     */
    public function csvToJson()
    {
        $tool = DB::table('tools')->where('slug', 'csv-to-json-converter')->first();
        return view('tools.utility.csv-to-json', compact('tool'));
    }

    /**
     * JSON to CSV Converter
     */
    public function jsonToCsv()
    {
        $tool = DB::table('tools')->where('slug', 'json-to-csv-converter')->first();
        return view('tools.utility.json-to-csv', compact('tool'));
    }

    /**
     * XML to JSON Converter
     */
    public function xmlToJson()
    {
        $tool = DB::table('tools')->where('slug', 'xml-to-json-converter')->first();
        return view('tools.utility.xml-to-json', compact('tool'));
    }

    /**
     * YAML to JSON Converter
     */
    public function yamlToJson()
    {
        $tool = DB::table('tools')->where('slug', 'yaml-to-json-converter')->first();
        return view('tools.utility.yaml-to-json', compact('tool'));
    }

    /**
     * Text to Binary Converter
     */
    public function textToBinary()
    {
        $tool = DB::table('tools')->where('slug', 'text-to-binary-converter')->first();
        return view('tools.utility.text-to-binary', compact('tool'));
    }

    /**
     * Binary to Text Converter
     */
    public function binaryToText()
    {
        $tool = DB::table('tools')->where('slug', 'binary-to-text-converter')->first();
        return view('tools.utility.binary-to-text', compact('tool'));
    }
}
