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

    public function binaryToText()
    {
        $tool = DB::table('tools')->where('slug', 'binary-to-text-converter')->first();
        return view('tools.utility.binary-to-text', compact('tool'));
    }

    /**
     * JSON to XML Converter
     */
    public function jsonToXml()
    {
        $tool = DB::table('tools')->where('slug', 'json-to-xml-converter')->first();
        return view('tools.utility.json-to-xml', compact('tool'));
    }

    /**
     * JSON to YAML Converter
     */
    public function jsonToYaml()
    {
        $tool = DB::table('tools')->where('slug', 'json-to-yaml-converter')->first();
        return view('tools.utility.json-to-yaml', compact('tool'));
    }

    /**
     * CSV to XML Converter
     */
    public function csvToXml()
    {
        $tool = DB::table('tools')->where('slug', 'csv-to-xml-converter')->first();
        return view('tools.utility.csv-to-xml', compact('tool'));
    }

    /**
     * XML to CSV Converter
     */
    public function xmlToCsv()
    {
        $tool = DB::table('tools')->where('slug', 'xml-to-csv-converter')->first();
        return view('tools.utility.xml-to-csv', compact('tool'));
    }

    /**
     * SQL to JSON Converter
     */
    public function sqlToJson()
    {
        $tool = DB::table('tools')->where('slug', 'sql-to-json-converter')->first();
        return view('tools.utility.sql-to-json', compact('tool'));
    }

    /**
     * JSON to SQL Converter
     */
    public function jsonToSql()
    {
        $tool = DB::table('tools')->where('slug', 'json-to-sql-converter')->first();
        return view('tools.utility.json-to-sql', compact('tool'));
    }

    /**
     * TSV to CSV Converter
     */
    public function tsvToCsv()
    {
        $tool = DB::table('tools')->where('slug', 'tsv-to-csv-converter')->first();
        return view('tools.utility.tsv-to-csv', compact('tool'));
    }

    /**
     * CSV to TSV Converter
     */
    public function csvToTsv()
    {
        $tool = DB::table('tools')->where('slug', 'csv-to-tsv-converter')->first();
        return view('tools.utility.csv-to-tsv', compact('tool'));
    }
}
