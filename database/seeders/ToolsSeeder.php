<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToolsSeeder extends Seeder
{
    public function run()
    {
        // Clear existing tools
        DB::table('tools')->truncate();

        // YouTube Tools with Subcategories
        $youtubeTools = [
            // Channel Analytics
            ['name' => 'YouTube Monetization Checker', 'slug' => 'youtube-monetization-checker', 'route_name' => 'youtube.monetization', 'controller' => 'MonetizationCheckerController', 'meta_description' => 'Check if a YouTube channel is monetized and eligible for ads.', 'subcategory' => 'Channel Analytics'],
            ['name' => 'YouTube Channel Data Extractor', 'slug' => 'youtube-channel-data-extractor', 'route_name' => 'youtube.channel', 'controller' => 'ChannelDataExtractorController', 'meta_description' => 'Extract comprehensive data and statistics from YouTube channels.', 'subcategory' => 'Channel Analytics'],
            ['name' => 'YouTube Channel ID Finder', 'slug' => 'youtube-channel-id-finder', 'route_name' => 'youtube.channel-id', 'controller' => 'ChannelIdFinderController', 'meta_description' => 'Find the unique channel ID for any YouTube channel.', 'subcategory' => 'Channel Analytics'],
            ['name' => 'YouTube Earnings Calculator', 'slug' => 'youtube-earnings-calculator', 'route_name' => 'youtube.earnings', 'controller' => 'EarningsCalculatorController', 'meta_description' => 'Estimate potential earnings for YouTube channels based on views and engagement.', 'subcategory' => 'Channel Analytics'],

            // Video Tools
            ['name' => 'YouTube Video Data Extractor', 'slug' => 'youtube-video-data-extractor', 'route_name' => 'youtube.extractor', 'controller' => 'VideoDataExtractorController', 'meta_description' => 'Extract detailed metadata and information from YouTube videos.', 'subcategory' => 'Video Tools'],
            ['name' => 'YouTube Tag Generator', 'slug' => 'youtube-tag-generator', 'route_name' => 'youtube.tags', 'controller' => 'TagsGeneratorController', 'meta_description' => 'Generate SEO-optimized tags for your YouTube videos.', 'subcategory' => 'Video Tools'],
            ['name' => 'YouTube Video Tags Extractor', 'slug' => 'youtube-video-tags-extractor', 'route_name' => 'youtube.video-tags', 'controller' => 'VideoTagsExtractorController', 'meta_description' => 'Extract tags from any YouTube video to analyze competitor strategies.', 'subcategory' => 'Video Tools'],

            // Media Tools
            ['name' => 'YouTube Thumbnail Downloader', 'slug' => 'youtube-thumbnail-downloader', 'route_name' => 'youtube.thumbnail', 'controller' => 'ThumbnailDownloaderController', 'meta_description' => 'Download high-quality YouTube video thumbnails in various resolutions.', 'subcategory' => 'Media Tools'],

            // Availability Checkers
            ['name' => 'YouTube Handle Checker', 'slug' => 'youtube-handle-checker', 'route_name' => 'youtube.handle', 'controller' => 'HandleCheckerController', 'meta_description' => 'Check if a YouTube handle is available for your channel.', 'subcategory' => 'Availability Checkers'],
        ];

        // SEO Tools with Subcategories
        $seoTools = [
            // Analysis Tools
            ['name' => 'Meta Tag Analyzer', 'slug' => 'meta-tag-analyzer', 'route_name' => 'seo.meta-analyzer', 'controller' => 'MetaAnalyzerController', 'meta_description' => 'Analyze and optimize meta tags for better search engine rankings.', 'subcategory' => 'Analysis Tools'],
            ['name' => 'Keyword Density Checker', 'slug' => 'keyword-density-checker', 'route_name' => 'seo.keyword-density', 'controller' => 'KeywordDensityController', 'meta_description' => 'Check keyword density and optimize your content for SEO.', 'subcategory' => 'Analysis Tools'],

            // Content Tools
            ['name' => 'Word Counter', 'slug' => 'word-counter', 'route_name' => 'seo.word-counter', 'controller' => 'WordCounterController', 'meta_description' => 'Count words, characters, and analyze text for SEO optimization.', 'subcategory' => 'Content Tools'],
        ];

        // Network Tools with Subcategories
        $networkTools = [
            // IP Tools
            ['name' => 'What is My IP', 'slug' => 'what-is-my-ip', 'route_name' => 'network.what-is-my-ip', 'controller' => 'WhatIsMyIpController', 'meta_description' => 'Find your public IP address instantly.', 'subcategory' => 'IP Tools'],
            ['name' => 'IP Lookup', 'slug' => 'ip-lookup', 'route_name' => 'network.ip-lookup', 'controller' => 'IpLookupController', 'meta_description' => 'Get detailed information about any IP address.', 'subcategory' => 'IP Tools'],
            ['name' => 'Domain to IP', 'slug' => 'domain-to-ip', 'route_name' => 'network.domain-to-ip', 'controller' => 'DomainToIpController', 'meta_description' => 'Convert domain names to IP addresses.', 'subcategory' => 'IP Tools'],
            ['name' => 'Reverse DNS', 'slug' => 'reverse-dns', 'route_name' => 'network.reverse-dns', 'controller' => 'ReverseDnsController', 'meta_description' => 'Perform reverse DNS lookups to find domain names from IP addresses.', 'subcategory' => 'IP Tools'],

            // ISP Tools
            ['name' => 'What is My ISP', 'slug' => 'what-is-my-isp', 'route_name' => 'network.what-is-my-isp', 'controller' => 'WhatIsMyIspController', 'meta_description' => 'Identify your Internet Service Provider.', 'subcategory' => 'ISP Tools'],

            // Lookup Tools
            ['name' => 'DNS Lookup', 'slug' => 'dns-lookup', 'route_name' => 'network.dns-lookup', 'controller' => 'DnsLookupController', 'meta_description' => 'Perform DNS lookups and check DNS records.', 'subcategory' => 'Lookup Tools'],
            ['name' => 'WHOIS Lookup', 'slug' => 'whois-lookup', 'route_name' => 'network.whois-lookup', 'controller' => 'WhoisLookupController', 'meta_description' => 'Look up domain registration and ownership information.', 'subcategory' => 'Lookup Tools'],

            // Testing Tools
            ['name' => 'Ping Test', 'slug' => 'ping-test', 'route_name' => 'network.ping-test', 'controller' => 'PingTestController', 'meta_description' => 'Test network connectivity and latency to any server.', 'subcategory' => 'Testing Tools'],
            ['name' => 'Traceroute', 'slug' => 'traceroute', 'route_name' => 'network.traceroute', 'controller' => 'TracerouteController', 'meta_description' => 'Trace the route packets take to reach a destination.', 'subcategory' => 'Testing Tools'],
            ['name' => 'Port Checker', 'slug' => 'port-checker', 'route_name' => 'network.port-checker', 'controller' => 'PortCheckerController', 'meta_description' => 'Check if specific ports are open on a server.', 'subcategory' => 'Testing Tools'],
        ];

        // Utility Tools with Subcategories
        $utilityTools = [
            // Encoding & Decoding (CONSOLIDATED - removed duplicates)
            ['name' => 'Base64 Encoder/Decoder', 'slug' => 'base64-encoder-decoder', 'route_name' => 'utility.base64', 'controller' => 'Base64Controller', 'meta_description' => 'Encode and decode Base64 strings.', 'subcategory' => 'Encoding & Decoding'],
            ['name' => 'URL Encoder/Decoder', 'slug' => 'url-encoder-decoder', 'route_name' => 'utility.url-encoder', 'controller' => 'UrlEncoderController', 'meta_description' => 'Encode and decode URLs.', 'subcategory' => 'Encoding & Decoding'],
            ['name' => 'HTML Encoder/Decoder', 'slug' => 'html-encoder-decoder', 'route_name' => 'utility.html-encoder', 'controller' => 'HtmlEncoderController', 'meta_description' => 'Encode and decode HTML entities to prevent XSS attacks.', 'subcategory' => 'Encoding & Decoding'],
            ['name' => 'Unicode Encoder/Decoder', 'slug' => 'unicode-encoder-decoder', 'route_name' => 'utility.unicode-encoder', 'controller' => 'UnicodeEncoderController', 'meta_description' => 'Encode and decode Unicode escape sequences for JavaScript and JSON.', 'subcategory' => 'Encoding & Decoding'],
            ['name' => 'JWT Decoder', 'slug' => 'jwt-decoder', 'route_name' => 'utility.jwt-decode', 'controller' => 'EncodingController@jwtDecode', 'meta_description' => 'Decode and inspect JWT tokens. View header, payload, and signature of JSON Web Tokens.', 'subcategory' => 'Encoding & Decoding'],
            ['name' => 'ASCII Converter', 'slug' => 'ascii-converter', 'route_name' => 'utility.ascii-convert', 'controller' => 'EncodingController@asciiConvert', 'meta_description' => 'Convert between ASCII and text. Encode text to ASCII codes or decode ASCII to text.', 'subcategory' => 'Encoding & Decoding'],

            // Data Format Converters
            ['name' => 'JSON to XML Converter', 'slug' => 'json-to-xml-converter', 'route_name' => 'utility.json-to-xml', 'controller' => 'ConverterController@jsonToXml', 'meta_description' => 'Convert JSON data to XML format instantly. Free online JSON to XML converter with formatting options.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'JSON to YAML Converter', 'slug' => 'json-to-yaml-converter', 'route_name' => 'utility.json-to-yaml', 'controller' => 'ConverterController@jsonToYaml', 'meta_description' => 'Convert JSON to YAML format online. Free JSON to YAML converter for configuration files.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'JSON to CSV Converter', 'slug' => 'json-to-csv-converter', 'route_name' => 'utility.json-to-csv', 'controller' => 'ConverterController@jsonToCsv', 'meta_description' => 'Convert JSON data to CSV format easily. Flatten nested JSON and export to CSV files.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'CSV to JSON Converter', 'slug' => 'csv-to-json-converter', 'route_name' => 'utility.csv-to-json', 'controller' => 'ConverterController@csvToJson', 'meta_description' => 'Transform CSV data into JSON format with customizable options. Free online CSV to JSON converter.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'CSV to XML Converter', 'slug' => 'csv-to-xml-converter', 'route_name' => 'utility.csv-to-xml', 'controller' => 'ConverterController@csvToXml', 'meta_description' => 'Convert CSV files to XML format. Free CSV to XML converter with custom element names.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'XML to CSV Converter', 'slug' => 'xml-to-csv-converter', 'route_name' => 'utility.xml-to-csv', 'controller' => 'ConverterController@xmlToCsv', 'meta_description' => 'Convert XML data to CSV format. Free XML to CSV converter for data extraction.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'XML to JSON Converter', 'slug' => 'xml-to-json-converter', 'route_name' => 'utility.xml-to-json', 'controller' => 'ConverterController@xmlToJson', 'meta_description' => 'Convert XML data to JSON format online. Free XML to JSON converter with attribute handling.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'YAML to JSON Converter', 'slug' => 'yaml-to-json-converter', 'route_name' => 'utility.yaml-to-json', 'controller' => 'ConverterController@yamlToJson', 'meta_description' => 'Convert YAML configuration files to JSON format. Free online YAML to JSON converter tool.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'SQL to JSON Converter', 'slug' => 'sql-to-json-converter', 'route_name' => 'utility.sql-to-json', 'controller' => 'ConverterController@sqlToJson', 'meta_description' => 'Convert SQL query results to JSON format. Parse SQL INSERT statements to JSON arrays.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'JSON to SQL Converter', 'slug' => 'json-to-sql-converter', 'route_name' => 'utility.json-to-sql', 'controller' => 'ConverterController@jsonToSql', 'meta_description' => 'Convert JSON data to SQL INSERT statements. Generate SQL from JSON arrays and objects.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'TSV to CSV Converter', 'slug' => 'tsv-to-csv-converter', 'route_name' => 'utility.tsv-to-csv', 'controller' => 'ConverterController@tsvToCsv', 'meta_description' => 'Convert Tab-Separated Values (TSV) to CSV format. Free TSV to CSV converter online.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'CSV to TSV Converter', 'slug' => 'csv-to-tsv-converter', 'route_name' => 'utility.csv-to-tsv', 'controller' => 'ConverterController@csvToTsv', 'meta_description' => 'Convert CSV to Tab-Separated Values (TSV) format. Free CSV to TSV converter tool.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'Text to Binary Converter', 'slug' => 'text-to-binary-converter', 'route_name' => 'utility.text-to-binary', 'controller' => 'ConverterController@textToBinary', 'meta_description' => 'Convert text to binary code (8-bit representation). Free text to binary converter with UTF-8 support.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'Binary to Text Converter', 'slug' => 'binary-to-text-converter', 'route_name' => 'utility.binary-to-text', 'controller' => 'ConverterController@binaryToText', 'meta_description' => 'Decode binary code to readable text. Free binary to text converter with error validation.', 'subcategory' => 'Data Format Converters'],

            // Text & Code Tools
            ['name' => 'Case Converter', 'slug' => 'case-converter', 'route_name' => 'utility.case-converter', 'controller' => 'CaseConverterController', 'meta_description' => 'Convert text to different cases.', 'subcategory' => 'Text & Code Tools'],
            ['name' => 'JSON Formatter', 'slug' => 'json-formatter', 'route_name' => 'utility.json-formatter', 'controller' => 'JsonFormatterController', 'meta_description' => 'Format and validate JSON data.', 'subcategory' => 'Text & Code Tools'],
            ['name' => 'JSON Parser', 'slug' => 'json-parser', 'route_name' => 'utility.json-parser', 'controller' => 'JsonParserController', 'meta_description' => 'Parse and validate JSON data.', 'subcategory' => 'Text & Code Tools'],
            ['name' => 'Code Formatter', 'slug' => 'code-formatter', 'route_name' => 'utility.code-formatter', 'controller' => 'CodeFormatterController', 'meta_description' => 'Format and beautify code in multiple languages.', 'subcategory' => 'Text & Code Tools'],
            ['name' => 'Markdown to HTML Converter', 'slug' => 'markdown-to-html-converter', 'route_name' => 'utility.markdown-to-html', 'controller' => 'MarkdownToHtmlController', 'meta_description' => 'Convert Markdown to HTML instantly with live preview.', 'subcategory' => 'Text & Code Tools'],
            ['name' => 'HTML to Markdown Converter', 'slug' => 'html-to-markdown-converter', 'route_name' => 'utility.html-to-markdown', 'controller' => 'ConverterController@htmlToMarkdown', 'meta_description' => 'Convert HTML code to clean Markdown format instantly. Perfect for documentation and content migration.', 'subcategory' => 'Text & Code Tools'],
            ['name' => 'MD5 Generator', 'slug' => 'md5-generator', 'route_name' => 'utility.md5-generator', 'controller' => 'Md5GeneratorController', 'meta_description' => 'Generate MD5 hashes from text.', 'subcategory' => 'Text & Code Tools'],
            ['name' => 'Slug Generator', 'slug' => 'slug-generator', 'route_name' => 'utility.slug-generator', 'controller' => 'SlugGeneratorController', 'meta_description' => 'Create SEO-friendly URL slugs.', 'subcategory' => 'Text & Code Tools'],

            // Design & Media
            ['name' => 'Image Compressor', 'slug' => 'image-compressor', 'route_name' => 'utility.image-compressor', 'controller' => 'ImageCompressorController', 'meta_description' => 'Compress images without losing quality.', 'subcategory' => 'Design & Media'],
            ['name' => 'RGB/HEX Converter', 'slug' => 'rgb-hex-converter', 'route_name' => 'utility.rgb-hex-converter', 'controller' => 'RgbHexConverterController', 'meta_description' => 'Convert between RGB and HEX color formats.', 'subcategory' => 'Design & Media'],
            ['name' => 'QR Code Generator', 'slug' => 'qr-code-generator', 'route_name' => 'utility.qr-generator', 'controller' => 'QrGeneratorController', 'meta_description' => 'Create custom QR codes instantly.', 'subcategory' => 'Design & Media'],

            // Development Tools
            ['name' => 'HTML Viewer', 'slug' => 'html-viewer', 'route_name' => 'utility.html-viewer', 'controller' => 'HtmlViewerController', 'meta_description' => 'Preview HTML code in real-time.', 'subcategory' => 'Development Tools'],
            ['name' => 'CSS Minifier', 'slug' => 'css-minifier', 'route_name' => 'utility.css-minifier', 'controller' => 'CssMinifierController', 'meta_description' => 'Minify CSS code for better performance.', 'subcategory' => 'Development Tools'],
            ['name' => 'JS Minifier', 'slug' => 'js-minifier', 'route_name' => 'utility.js-minifier', 'controller' => 'JsMinifierController', 'meta_description' => 'Minify JavaScript code for better performance.', 'subcategory' => 'Development Tools'],
            ['name' => 'HTML Minifier', 'slug' => 'html-minifier', 'route_name' => 'utility.html-minifier', 'controller' => 'HtmlMinifierController', 'meta_description' => 'Minify HTML code for better performance.', 'subcategory' => 'Development Tools'],

            // Utilities
            ['name' => 'Username Checker', 'slug' => 'username-checker', 'route_name' => 'utility.username-checker', 'controller' => 'UsernameCheckerController', 'meta_description' => 'Check username availability across platforms.', 'subcategory' => 'Utilities'],
            ['name' => 'Password Generator', 'slug' => 'password-generator', 'route_name' => 'utility.password-generator', 'controller' => 'PasswordGeneratorController', 'meta_description' => 'Generate secure random passwords.', 'subcategory' => 'Utilities'],
            ['name' => 'Internet Speed Test', 'slug' => 'internet-speed-test', 'route_name' => 'utility.speed-test', 'controller' => 'InternetSpeedTestController', 'meta_description' => 'Test your internet connection speed.', 'subcategory' => 'Utilities'],
        ];

        $order = 1;
        foreach ($youtubeTools as $tool) {
            DB::table('tools')->insert(array_merge($tool, [
                'category' => 'youtube',
                'url' => '/tools/' . $tool['slug'],
                'meta_title' => $tool['name'] . ' - Free YouTube Tool | Optimizo',
                'meta_keywords' => 'youtube, ' . strtolower($tool['name']),
                'is_active' => 1,
                'priority' => '0.8',
                'change_frequency' => 'weekly',
                'order' => $order++,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        foreach ($seoTools as $tool) {
            DB::table('tools')->insert(array_merge($tool, [
                'category' => 'seo',
                'url' => '/tools/' . $tool['slug'],
                'meta_title' => $tool['name'] . ' - Free SEO Tool | Optimizo',
                'meta_keywords' => 'seo, ' . strtolower($tool['name']),
                'is_active' => 1,
                'priority' => '0.8',
                'change_frequency' => 'weekly',
                'order' => $order++,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        foreach ($networkTools as $tool) {
            DB::table('tools')->insert(array_merge($tool, [
                'category' => 'network',
                'url' => '/tools/' . $tool['slug'],
                'meta_title' => $tool['name'] . ' - Free Network Tool | Optimizo',
                'meta_keywords' => 'network, ' . strtolower($tool['name']),
                'is_active' => 1,
                'priority' => '0.8',
                'change_frequency' => 'weekly',
                'order' => $order++,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        foreach ($utilityTools as $tool) {
            DB::table('tools')->insert(array_merge($tool, [
                'category' => 'utility',
                'url' => '/tools/' . $tool['slug'],
                'meta_title' => $tool['name'] . ' - Free Utility Tool | Optimizo',
                'meta_keywords' => 'utility, ' . strtolower($tool['name']),
                'is_active' => 1,
                'priority' => '0.8',
                'change_frequency' => 'weekly',
                'order' => $order++,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        $this->command->info('Tools seeded successfully! Total tools: ' . ($order - 1));
        $this->command->info('YouTube: ' . count($youtubeTools) . ' | SEO: ' . count($seoTools) . ' | Network: ' . count($networkTools) . ' | Utility: ' . count($utilityTools));
    }
}
