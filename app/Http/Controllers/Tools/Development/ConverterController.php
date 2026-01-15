<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;

class ConverterController extends Controller
{
    /**
     * HTML to Markdown Converter
     */
    public function htmlToMarkdown()
    {
        $tool = Tool::where('slug', 'html-to-markdown-converter')->first();
        return view('tools.development.html-to-markdown-converter', compact('tool'));
    }

    /**
     * CSV to JSON Converter
     */
    public function csvToJson()
    {
        $tool = Tool::where('slug', 'csv-to-json-converter')->first();
        return view('tools.utility.csv-to-json-converter', compact('tool'));
    }

    /**
     * JSON to CSV Converter
     */
    public function jsonToCsv()
    {
        $tool = Tool::where('slug', 'json-to-csv-converter')->first();
        return view('tools.utility.json-to-csv-converter', compact('tool'));
    }

    /**
     * XML to JSON Converter
     */
    public function xmlToJson()
    {
        $tool = Tool::where('slug', 'xml-to-json-converter')->first();
        return view('tools.utility.xml-to-json', compact('tool'));
    }

    /**
     * YAML to JSON Converter
     */
    public function yamlToJson()
    {
        $tool = Tool::where('slug', 'yaml-to-json-converter')->first();
        return view('tools.utility.yaml-to-json', compact('tool'));
    }

    /**
     * Text to Binary Converter
     */
    public function textToBinary()
    {
        $tool = Tool::where('slug', 'text-to-binary-converter')->first();
        return view('tools.utility.text-to-binary', compact('tool'));
    }

    public function binaryToText()
    {
        $tool = Tool::where('slug', 'binary-to-text-converter')->first();
        return view('tools.utility.binary-to-text', compact('tool'));
    }

    /**
     * JSON to XML Converter
     */
    public function jsonToXml()
    {
        $tool = Tool::where('slug', 'json-to-xml-converter')->first();
        return view('tools.development.json-to-xml-converter', compact('tool'));
    }

    /**
     * JSON to YAML Converter
     */
    public function jsonToYaml()
    {
        $tool = Tool::where('slug', 'json-to-yaml-converter')->first();
        return view('tools.development.json-to-yaml-converter', compact('tool'));
    }

    /**
     * CSV to XML Converter
     */
    public function csvToXml()
    {
        $tool = Tool::where('slug', 'csv-to-xml-converter')->first();
        return view('tools.development.csv-to-xml-converter', compact('tool'));
    }

    /**
     * XML to CSV Converter
     */
    public function xmlToCsv()
    {
        $tool = Tool::where('slug', 'xml-to-csv-converter')->first();
        return view('tools.utility.xml-to-csv', compact('tool'));
    }

    /**
     * SQL to JSON Converter
     */
    public function sqlToJson()
    {
        $tool = Tool::where('slug', 'sql-to-json-converter')->first();
        return view('tools.utility.sql-to-json', compact('tool'));
    }

    /**
     * JSON to SQL Converter
     */
    public function jsonToSql()
    {
        $tool = Tool::where('slug', 'json-to-sql-converter')->first();
        return view('tools.development.json-to-sql-converter', compact('tool'));
    }

    /**
     * TSV to CSV Converter
     */
    public function tsvToCsv()
    {
        $tool = Tool::where('slug', 'tsv-to-csv-converter')->first();
        return view('tools.utility.tsv-to-csv-converter', compact('tool'));
    }

    /**
     * CSV to TSV Converter
     */
    public function csvToTsv()
    {
        $tool = Tool::where('slug', 'csv-to-tsv-converter')->first();
        return view('tools.utility.csv-to-tsv-converter', compact('tool'));
    }
}
