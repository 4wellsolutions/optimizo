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

            // Technical SEO
            ['name' => 'Redirect & HTTP Status Checker', 'slug' => 'redirect-checker', 'route_name' => 'network.redirect-checker', 'controller' => 'RedirectCheckerController', 'meta_description' => 'Check redirects and HTTP status codes. Analyze redirect chains and detect loops.', 'subcategory' => 'Technical SEO'],
            ['name' => 'Google SERP Checker', 'slug' => 'google-serp-checker', 'route_name' => 'seo.google-serp-checker', 'controller' => 'GoogleSerpCheckerController', 'meta_description' => 'Simulate Google search results for any location and device to check your rankings.', 'subcategory' => 'Technical SEO'],
            ['name' => 'Bing SERP Checker', 'slug' => 'bing-serp-checker', 'route_name' => 'seo.bing-serp-checker', 'controller' => 'BingSerpCheckerController', 'meta_description' => 'Use our free Bing SERP checker to track your Bing ranking and position. Detailed Bing SERP analysis for desktop and mobile from any location.', 'subcategory' => 'Technical SEO'],
            ['name' => 'Yahoo SERP Checker', 'slug' => 'yahoo-serp-checker', 'route_name' => 'seo.yahoo-serp-checker', 'controller' => 'YahooSerpCheckerController', 'meta_description' => 'Use our free Yahoo SERP checker to track your Yahoo ranking and position. Detailed Yahoo SERP analysis for desktop and mobile.', 'subcategory' => 'Technical SEO'],
            ['name' => 'On-Page SEO Checker', 'slug' => 'on-page-seo-checker', 'route_name' => 'seo.on-page-seo-checker', 'controller' => 'OnPageSeoCheckerController', 'meta_description' => 'Comprehensive On-Page SEO audit tool. Analyze topic intent, content quality, and technical SEO factors.', 'subcategory' => 'Analysis Tools'],
            ['name' => 'Broken Links Checker', 'slug' => 'broken-links-checker', 'route_name' => 'seo.broken-links-checker', 'controller' => 'BrokenLinksCheckerController', 'meta_description' => 'Scan your webpage for dead links (404 errors) to improve user experience and SEO rankings. Free online broken link checker tool.', 'subcategory' => 'Technical SEO'],
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

            // Data Format Converters (Bidirectional)
            ['name' => 'JSON to XML Converter', 'slug' => 'json-to-xml-converter', 'route_name' => 'utility.json-xml', 'controller' => 'JsonXmlController', 'meta_description' => 'Convert JSON to XML and vice versa. Free bidirectional JSON-XML converter with formatting options.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'JSON to YAML Converter', 'slug' => 'json-to-yaml-converter', 'route_name' => 'utility.json-yaml', 'controller' => 'JsonYamlController', 'meta_description' => 'Convert JSON to YAML and vice versa. Free bidirectional JSON-YAML converter for configuration files.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'CSV to XML Converter', 'slug' => 'csv-to-xml-converter', 'route_name' => 'utility.csv-xml', 'controller' => 'CsvXmlController', 'meta_description' => 'Convert CSV to XML and vice versa. Free bidirectional CSV-XML converter with custom element names.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'JSON to SQL Converter', 'slug' => 'json-to-sql-converter', 'route_name' => 'utility.json-sql', 'controller' => 'JsonSqlController', 'meta_description' => 'Convert JSON to SQL INSERT statements and vice versa. Free bidirectional JSON-SQL converter.', 'subcategory' => 'Data Format Converters'],
            ['name' => 'TSV to CSV Converter', 'slug' => 'tsv-to-csv-converter', 'route_name' => 'utility.tsv-csv', 'controller' => 'TsvCsvController', 'meta_description' => 'Convert TSV to CSV and vice versa. Free bidirectional TSV-CSV converter online.', 'subcategory' => 'Data Format Converters'],

            // Text & Code Tools
            ['name' => 'Case Converter', 'slug' => 'case-converter', 'route_name' => 'utility.case-converter', 'controller' => 'CaseConverterController', 'meta_description' => 'Convert text to different cases.', 'subcategory' => 'Text & Code Tools'],
            ['name' => 'JSON Formatter', 'slug' => 'json-formatter', 'route_name' => 'utility.json-formatter', 'controller' => 'JsonFormatterController', 'meta_description' => 'Format and validate JSON data.', 'subcategory' => 'Text & Code Tools'],
            ['name' => 'JSON Parser', 'slug' => 'json-parser', 'route_name' => 'utility.json-parser', 'controller' => 'JsonParserController', 'meta_description' => 'Parse and validate JSON data.', 'subcategory' => 'Text & Code Tools'],
            ['name' => 'Code Formatter', 'slug' => 'code-formatter', 'route_name' => 'utility.code-formatter', 'controller' => 'CodeFormatterController', 'meta_description' => 'Format and beautify code in multiple languages.', 'subcategory' => 'Text & Code Tools'],
            ['name' => 'Markdown to HTML Converter', 'slug' => 'markdown-to-html-converter', 'route_name' => 'utility.markdown-to-html', 'controller' => 'MarkdownToHtmlController', 'meta_description' => 'Convert Markdown to HTML instantly with live preview.', 'subcategory' => 'Text & Code Tools'],
            ['name' => 'HTML to Markdown Converter', 'slug' => 'html-to-markdown-converter', 'route_name' => 'utility.html-to-markdown', 'controller' => 'ConverterController@htmlToMarkdown', 'meta_description' => 'Convert HTML code to clean Markdown format instantly. Perfect for documentation and content migration.', 'subcategory' => 'Text & Code Tools'],
            ['name' => 'MD5 Generator', 'slug' => 'md5-generator', 'route_name' => 'utility.md5-generator', 'controller' => 'Md5GeneratorController', 'meta_description' => 'Generate MD5 hashes from text.', 'subcategory' => 'Text & Code Tools'],
            ['name' => 'Slug Generator', 'slug' => 'slug-generator', 'route_name' => 'utility.slug-generator', 'controller' => 'SlugGeneratorController', 'meta_description' => 'Create SEO-friendly URL slugs.', 'subcategory' => 'Text & Code Tools'],

            // Text & String Converters
            ['name' => 'Sentence Case Converter', 'slug' => 'sentence-case-converter', 'route_name' => 'utility.sentence-case', 'controller' => 'SentenceCaseController', 'meta_description' => 'Convert text to sentence case. Capitalize the first letter of each sentence automatically.', 'subcategory' => 'Text & String Converters'],
            ['name' => 'Camel Case Converter', 'slug' => 'camel-case-converter', 'route_name' => 'utility.camel-case', 'controller' => 'CamelCaseController', 'meta_description' => 'Convert text to camelCase format. Perfect for JavaScript and programming variable names.', 'subcategory' => 'Text & String Converters'],
            ['name' => 'Pascal Case Converter', 'slug' => 'pascal-case-converter', 'route_name' => 'utility.pascal-case', 'controller' => 'PascalCaseController', 'meta_description' => 'Convert text to PascalCase format. Ideal for class names and type definitions.', 'subcategory' => 'Text & String Converters'],
            ['name' => 'Snake Case Converter', 'slug' => 'snake-case-converter', 'route_name' => 'utility.snake-case', 'controller' => 'SnakeCaseController', 'meta_description' => 'Convert text to snake_case format. Common in Python, Ruby, and database naming.', 'subcategory' => 'Text & String Converters'],
            ['name' => 'Kebab Case Converter', 'slug' => 'kebab-case-converter', 'route_name' => 'utility.kebab-case', 'controller' => 'KebabCaseController', 'meta_description' => 'Convert text to kebab-case format. Popular for URLs and CSS class names.', 'subcategory' => 'Text & String Converters'],
            ['name' => 'Studly Case Converter', 'slug' => 'studly-case-converter', 'route_name' => 'utility.studly-case', 'controller' => 'StudlyCaseController', 'meta_description' => 'Convert text to StUdLy CaSe format. Create random capitalization patterns.', 'subcategory' => 'Text & String Converters'],
            ['name' => 'Text Reverser', 'slug' => 'text-reverser', 'route_name' => 'utility.text-reverser', 'controller' => 'TextReverserController', 'meta_description' => 'Reverse text strings character by character. Flip text backwards instantly.', 'subcategory' => 'Text & String Converters'],
            ['name' => 'Text to Morse Code', 'slug' => 'text-to-morse-converter', 'route_name' => 'utility.text-to-morse', 'controller' => 'TextToMorseController', 'meta_description' => 'Convert text to Morse code. Encode messages using international Morse code.', 'subcategory' => 'Text & String Converters'],
            ['name' => 'Morse Code to Text', 'slug' => 'morse-to-text-converter', 'route_name' => 'utility.morse-to-text', 'controller' => 'MorseToTextController', 'meta_description' => 'Convert Morse code to text. Decode Morse code messages instantly.', 'subcategory' => 'Text & String Converters'],

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

            // Number System Converters
            ['name' => 'Decimal to Binary Converter', 'slug' => 'decimal-binary-converter', 'route_name' => 'utility.decimal-binary', 'controller' => 'DecimalBinaryController', 'meta_description' => 'Convert decimal numbers to binary and vice versa. Free bidirectional decimal-binary converter.', 'subcategory' => 'Number System Converters'],
            ['name' => 'Decimal to Hexadecimal Converter', 'slug' => 'decimal-hex-converter', 'route_name' => 'utility.decimal-hex', 'controller' => 'DecimalHexController', 'meta_description' => 'Convert decimal numbers to hexadecimal and vice versa. Free bidirectional decimal-hex converter.', 'subcategory' => 'Number System Converters'],
            ['name' => 'Binary to Hexadecimal Converter', 'slug' => 'binary-hex-converter', 'route_name' => 'utility.binary-hex', 'controller' => 'BinaryHexController', 'meta_description' => 'Convert binary numbers to hexadecimal and vice versa. Free bidirectional binary-hex converter.', 'subcategory' => 'Number System Converters'],
            ['name' => 'Decimal to Octal Converter', 'slug' => 'decimal-octal-converter', 'route_name' => 'utility.decimal-octal', 'controller' => 'DecimalOctalController', 'meta_description' => 'Convert decimal numbers to octal and vice versa. Free bidirectional decimal-octal converter.', 'subcategory' => 'Number System Converters'],
            ['name' => 'Number Base Converter', 'slug' => 'number-base-converter', 'route_name' => 'utility.number-base', 'controller' => 'NumberBaseController', 'meta_description' => 'Convert numbers between any bases (2-36). Universal number base converter supporting binary, octal, decimal, hexadecimal, and more.', 'subcategory' => 'Number System Converters'],
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
