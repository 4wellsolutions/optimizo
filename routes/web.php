<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

// Tool Controllers - Organized by Category
use App\Http\Controllers\Tools\YouTube\{
    MonetizationCheckerController,
    ThumbnailDownloaderController,
    VideoDataExtractorController,
    TagsGeneratorController,
    ChannelDataExtractorController,
    HandleCheckerController,
    VideoTagsExtractorController,
    ChannelIdFinderController,
    EarningsCalculatorController
};

use App\Http\Controllers\Tools\Seo\{
    MetaAnalyzerController,
    KeywordDensityController,
    WordCounterController,
    GoogleSerpCheckerController,
    BingSerpCheckerController,
    YahooSerpCheckerController,
    LocationController,
    OnPageSeoCheckerController,
    BrokenLinksCheckerController
};

use App\Http\Controllers\Tools\Utility\{
    ImageCompressorController,
    RgbHexConverterController,
    SlugGeneratorController,
    InternetSpeedTestController,
    Md5GeneratorController,
    CaseConverterController,
    UsernameCheckerController,
    PasswordGeneratorController,
    JsonFormatterController,
    Base64Controller,
    QrGeneratorController,
    HtmlViewerController,
    JsonParserController,
    CodeFormatterController,
    CssMinifierController,
    JsMinifierController,
    HtmlMinifierController,
    UrlEncoderController,
    HtmlEncoderController,
    UnicodeEncoderController,
    MarkdownToHtmlController,
    ConverterController,
    EncodingController,
    DecimalBinaryController,
    DecimalHexController,
    BinaryHexController,
    LoremIpsumGeneratorController,
    RandomNumberGeneratorController,
    UuidGeneratorController,
    DuplicateRemoverController,
    XmlFormatterController,
    DiffCheckerController,
    CronJobGeneratorController,
    UserAgentParserController,
    CurlBuilderController,
    DecimalOctalController,
    NumberBaseController,
    JsonXmlController,
    JsonYamlController,
    CsvXmlController,
    JsonSqlController,
    TsvCsvController,
    SentenceCaseController,
    CamelCaseController,
    PascalCaseController,
    SnakeCaseController,
    KebabCaseController,
    StudlyCaseController,
    TextReverserController,
    TextToMorseController,
    MorseToTextController,
    DocumentConverterController,
    SpreadsheetConverterController,
    TimeConverterController
};

use App\Http\Controllers\Tools\Network\{
    WhatIsMyIpController,
    WhatIsMyIspController,
    DomainToIpController,
    IpLookupController,
    DnsLookupController,
    WhoisLookupController,
    PingTestController,
    TracerouteController,
    PortCheckerController,
    ReverseDnsController,
    RedirectCheckerController
};

use App\Http\Controllers\Tools\Converters\UnitConverterController;

/*
|--------------------------------------------------------------------------
| Language Switching Route
|--------------------------------------------------------------------------
*/
Route::get('/language/{code}', [LanguageController::class, 'switch'])
    ->name('language.switch');

/*
|--------------------------------------------------------------------------
| Public Routes (with and without locale prefix)
|--------------------------------------------------------------------------
*/

// Define routes in a closure to register them both with and without locale
$definePublicRoutes = function () {
    // Homepage
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Category Pages
    Route::prefix('')->name('category.')->group(function () {
        Route::get('/youtube-tools', [CategoryController::class, 'youtube'])->name('youtube');
        Route::get('/seo-tools', [CategoryController::class, 'seo'])->name('seo');
        Route::get('/utility-tools', [CategoryController::class, 'utility'])->name('utility');
        Route::get('/network-tools', [CategoryController::class, 'network'])->name('network');
        Route::get('/image-tools', [CategoryController::class, 'image'])->name('image');
        Route::get('/document-tools', [CategoryController::class, 'document'])->name('document');
        Route::get('/time-tools', [CategoryController::class, 'time'])->name('time');
        Route::get('/text-tools', [CategoryController::class, 'text'])->name('text');
        Route::get('/development-tools', [CategoryController::class, 'development'])->name('development');
        Route::get('/converters-tools', [CategoryController::class, 'converters'])->name('converters');
        Route::get('/spreadsheet-tools', [CategoryController::class, 'spreadsheet'])->name('spreadsheet');
    });

    // Static Pages
    Route::controller(PageController::class)->group(function () {
        Route::get('/about', 'about')->name('about');
        Route::get('/contact', 'contact')->name('contact');
        Route::post('/contact', 'contactSubmit')->name('contact.submit');
        Route::get('/sponsors', 'sponsors')->name('sponsors');
        Route::get('/terms', 'terms')->name('terms');
        Route::get('/privacy', 'privacy')->name('privacy');
    });

    // Sitemap Routes
    Route::controller(App\Http\Controllers\SitemapController::class)->group(function () {
        Route::get('/sitemap.xml', 'index')->name('sitemap.index');
        Route::get('/sitemap-categories.xml', 'categories')->name('sitemap.categories');
        Route::get('/sitemap-{category}.xml', 'category')->name('sitemap.category');
    });

    /*
    |--------------------------------------------------------------------------
    | Tool Routes - YouTube
    |--------------------------------------------------------------------------
    */

    Route::prefix('tools')->name('youtube.')->group(function () {
        // GET Routes
        Route::get('/youtube-monetization-checker', [MonetizationCheckerController::class, 'index'])->name('youtube-monetization-checker');
        Route::get('/youtube-thumbnail-downloader', [ThumbnailDownloaderController::class, 'index'])->name('youtube-thumbnail-downloader');
        Route::get('/youtube-video-data-extractor', [VideoDataExtractorController::class, 'index'])->name('youtube-video-data-extractor');
        Route::get('/youtube-tag-generator', [TagsGeneratorController::class, 'index'])->name('youtube-tag-generator');
        Route::get('/youtube-channel-data-extractor', [ChannelDataExtractorController::class, 'index'])->name('youtube-channel-data-extractor');
        Route::get('/youtube-handle-checker', [HandleCheckerController::class, 'index'])->name('youtube-handle-checker');
        Route::get('/youtube-video-tags-extractor', [VideoTagsExtractorController::class, 'index'])->name('youtube-video-tags-extractor');
        Route::get('/youtube-channel-id-finder', [ChannelIdFinderController::class, 'index'])->name('youtube-channel-id-finder');
        Route::get('/youtube-earnings-calculator', [EarningsCalculatorController::class, 'index'])->name('youtube-earnings-calculator');

        // POST Routes
        Route::post('/youtube-monetization/check', [MonetizationCheckerController::class, 'check'])->name('youtube-monetization-checker.check');
        Route::post('/youtube-thumbnail/download', [ThumbnailDownloaderController::class, 'download'])->name('youtube-thumbnail-downloader.download');
        Route::post('/youtube-extractor/extract', [VideoDataExtractorController::class, 'extract'])->name('youtube-video-data-extractor.extract');
        Route::post('/youtube-channel/extract', [ChannelDataExtractorController::class, 'extract'])->name('youtube-channel-data-extractor.extract');
        Route::post('/youtube-handle/check', [HandleCheckerController::class, 'check'])->name('youtube-handle-checker.check');
        Route::post('/youtube-video-tags/extract', [VideoTagsExtractorController::class, 'extract'])->name('youtube-video-tags-extractor.extract');
        Route::post('/youtube-channel-id/find', [ChannelIdFinderController::class, 'find'])->name('youtube-channel-id-finder.find');
        Route::post('/youtube-earnings/calculate', [EarningsCalculatorController::class, 'calculate'])->name('youtube-earnings-calculator.calculate');
    });

    /*
    |--------------------------------------------------------------------------
    | Tool Routes - SEO
    |--------------------------------------------------------------------------
    */

    Route::prefix('tools')->name('seo.')->group(function () {
        // GET Routes
        Route::get('/meta-tag-analyzer', [MetaAnalyzerController::class, 'index'])->name('meta-tag-analyzer');
        Route::get('/keyword-density-checker', [KeywordDensityController::class, 'index'])->name('keyword-density-checker');

        // POST Routes
        Route::post('/meta-analyzer/analyze', [MetaAnalyzerController::class, 'analyze'])->name('meta-tag-analyzer.analyze');

        // Google SERP Checker
        Route::get('/google-serp-checker', [GoogleSerpCheckerController::class, 'index'])->name('google-serp-checker');
        Route::get('/locations', [LocationController::class, 'search'])->name('locations.search');
        Route::get('/bing-serp-checker', [BingSerpCheckerController::class, 'index'])->name('bing-serp-checker');
        Route::get('/yahoo-serp-checker', [YahooSerpCheckerController::class, 'index'])->name('yahoo-serp-checker');
        Route::get('/slug-generator', [SlugGeneratorController::class, 'index'])->name('slug-generator');

        // On-Page SEO Checker
        Route::get('/on-page-seo-checker', [OnPageSeoCheckerController::class, 'index'])->name('on-page-seo-checker');
        Route::post('/on-page-seo-checker/init', [OnPageSeoCheckerController::class, 'init'])->name('on-page-seo-checker.init');
        Route::post('/on-page-seo-checker/analyze-step', [OnPageSeoCheckerController::class, 'analyzeStep'])->name('on-page-seo-checker.analyze-step');
        Route::get('/on-page-seo-checker/export', [OnPageSeoCheckerController::class, 'exportPdf'])->name('on-page-seo-checker.export');

        // Broken Links Checker
        Route::get('/broken-links-checker', [BrokenLinksCheckerController::class, 'index'])->name('broken-links-checker');
        Route::post('/broken-links-checker/extract', [BrokenLinksCheckerController::class, 'extract'])->name('broken-links-checker.extract');
        Route::post('/broken-links-checker/status', [BrokenLinksCheckerController::class, 'checkStatus'])->name('broken-links-checker.status');
        Route::get('/broken-links-checker/export', [BrokenLinksCheckerController::class, 'export'])->name('broken-links-checker.export');

        // Redirect Checker
        Route::get('/redirect-checker', [RedirectCheckerController::class, 'index'])->name('redirect-checker');
        Route::post('/redirect-checker/check', [RedirectCheckerController::class, 'check'])->name('redirect-checker.check');
        Route::post('/redirect-checker/canonical', [RedirectCheckerController::class, 'checkCanonical'])->name('redirect-checker.canonical');
    });

    /*
    |--------------------------------------------------------------------------
    | Tool Routes - Utility
    |--------------------------------------------------------------------------
    */

    Route::prefix('tools')->name('utility.')->group(function () {
        // Utility Tools (4 tools only)
        Route::get('/password-generator', [PasswordGeneratorController::class, 'index'])->name('password-generator');
        Route::get('/qr-code-generator', [QrGeneratorController::class, 'index'])->name('qr-code-generator');
        Route::get('/random-number-generator', [RandomNumberGeneratorController::class, 'index'])->name('random-number-generator');
        Route::get('/username-checker', [UsernameCheckerController::class, 'index'])->name('username-checker');

        // POST Routes
        Route::post('/password-generator/generate', [PasswordGeneratorController::class, 'generate'])->name('password-generator.generate');
    });

    /*
    |--------------------------------------------------------------------------
    | Tool Routes - Image
    |--------------------------------------------------------------------------
    */

    Route::prefix('tools')->name('image.')->group(function () {
        // Image Converters
        Route::get('/image-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'imageConverter'])->name('image-converter');
        Route::get('/jpg-to-png-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'jpgToPng'])->name('jpg-to-png-converter');
        Route::get('/png-to-jpg-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'pngToJpg'])->name('png-to-jpg-converter');
        Route::get('/jpg-to-webp-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'jpgToWebp'])->name('jpg-to-webp-converter');
        Route::get('/webp-to-jpg-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'webpToJpg'])->name('webp-to-jpg-converter');
        Route::get('/png-to-webp-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'pngToWebp'])->name('png-to-webp-converter');
        Route::get('/image-to-base64-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'imageToBase64'])->name('image-to-base64-converter');
        Route::get('/base64-to-image-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'base64ToImage'])->name('base64-to-image-converter');
        Route::get('/svg-to-png-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'svgToPng'])->name('svg-to-png-converter');
        Route::get('/svg-to-jpg-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'svgToJpg'])->name('svg-to-jpg-converter');
        Route::get('/heic-to-jpg-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'heicToJpg'])->name('heic-to-jpg-converter');
        Route::get('/ico-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'icoConverter'])->name('ico-converter');
        Route::get('/image-compressor', [ImageCompressorController::class, 'index'])->name('image-compressor');
    });

    /*
    |--------------------------------------------------------------------------
    | Tool Routes - Document
    |--------------------------------------------------------------------------
    */

    Route::prefix('tools')->name('document.')->group(function () {
        // PDF to Word
        Route::get('/pdf-to-word', [DocumentConverterController::class, 'indexPdfToWord'])->name('pdf-to-word');
        Route::post('/pdf-to-word', [DocumentConverterController::class, 'processPdfToWord'])->name('pdf-to-word.process');

        // Word to PDF
        Route::get('/word-to-pdf', [DocumentConverterController::class, 'indexWordToPdf'])->name('word-to-pdf');
        Route::post('/word-to-pdf', [DocumentConverterController::class, 'processWordToPdf'])->name('word-to-pdf.process');

        // PDF to Excel
        Route::get('/pdf-to-excel', [DocumentConverterController::class, 'indexPdfToExcel'])->name('pdf-to-excel');
        Route::post('/pdf-to-excel', [DocumentConverterController::class, 'processPdfToExcel'])->name('pdf-to-excel.process');

        // Excel to PDF
        Route::get('/excel-to-pdf', [DocumentConverterController::class, 'indexExcelToPdf'])->name('excel-to-pdf');
        Route::post('/excel-to-pdf', [DocumentConverterController::class, 'processExcelToPdf'])->name('excel-to-pdf.process');
        Route::get('/excel-to-pdf/download/{filename}', [DocumentConverterController::class, 'downloadExcelToPdf'])->name('excel-to-pdf.download');

        // PDF to JPG
        Route::get('/pdf-to-jpg', [DocumentConverterController::class, 'indexPdfToJpg'])->name('pdf-to-jpg');
        Route::post('/pdf-to-jpg', [DocumentConverterController::class, 'processPdfToJpg'])->name('pdf-to-jpg.process');

        // JPG to PDF
        Route::get('/jpg-to-pdf', [DocumentConverterController::class, 'indexJpgToPdf'])->name('jpg-to-pdf');
        Route::post('/jpg-to-pdf', [DocumentConverterController::class, 'processJpgToPdf'])->name('jpg-to-pdf.process');
        Route::get('/jpg-to-pdf/download/{filename}', [DocumentConverterController::class, 'downloadJpgToPdf'])->name('jpg-to-pdf.download');

        // PowerPoint to PDF
        Route::get('/ppt-to-pdf', [DocumentConverterController::class, 'indexPptToPdf'])->name('ppt-to-pdf');
        Route::post('/ppt-to-pdf', [DocumentConverterController::class, 'processPptToPdf'])->name('ppt-to-pdf.process');

        // PDF to PowerPoint
        Route::get('/pdf-to-ppt', [DocumentConverterController::class, 'indexPdfToPpt'])->name('pdf-to-ppt');
        Route::post('/pdf-to-ppt', [DocumentConverterController::class, 'processPdfToPpt'])->name('pdf-to-ppt.process');

        // PDF Tools
        Route::get('/pdf-compressor', [DocumentConverterController::class, 'indexPdfCompressor'])->name('pdf-compressor');
        Route::post('/pdf-compressor', [DocumentConverterController::class, 'processPdfCompressor'])->name('pdf-compressor.process');

        Route::get('/pdf-merger', [DocumentConverterController::class, 'indexPdfMerger'])->name('pdf-merger');
        Route::post('/pdf-merger', [DocumentConverterController::class, 'processPdfMerger'])->name('pdf-merger.process');

        Route::get('/pdf-splitter', [DocumentConverterController::class, 'indexPdfSplitter'])->name('pdf-splitter');
        Route::post('/pdf-splitter', [DocumentConverterController::class, 'processPdfSplitter'])->name('pdf-splitter.process');
    });


    /*
    |--------------------------------------------------------------------------
    | Tool Routes - Network
    |--------------------------------------------------------------------------
    */

    Route::prefix('tools')->name('network.')->group(function () {
        // GET Routes
        Route::get('/what-is-my-ip', [WhatIsMyIpController::class, 'index'])->name('what-is-my-ip');
        Route::get('/what-is-my-isp', [WhatIsMyIspController::class, 'index'])->name('what-is-my-isp');
        Route::get('/domain-to-ip', [DomainToIpController::class, 'index'])->name('domain-to-ip');
        Route::get('/ip-lookup', [IpLookupController::class, 'index'])->name('ip-lookup');
        Route::get('/dns-lookup', [DnsLookupController::class, 'index'])->name('dns-lookup');
        Route::get('/whois-lookup', [WhoisLookupController::class, 'index'])->name('whois-lookup');
        Route::get('/ping-test', [PingTestController::class, 'index'])->name('ping-test');
        Route::get('/traceroute', [TracerouteController::class, 'index'])->name('traceroute');
        Route::get('/port-checker', [PortCheckerController::class, 'index'])->name('port-checker');
        Route::get('/reverse-dns-lookup', [ReverseDnsController::class, 'index'])->name('reverse-dns-lookup');
        Route::get('/internet-speed-test', [InternetSpeedTestController::class, 'index'])->name('internet-speed-test');
        Route::get('/user-agent-parser', [UserAgentParserController::class, 'index'])->name('user-agent-parser');


        // POST Routes
        Route::post('/ip-lookup/lookup', [IpLookupController::class, 'lookup'])->name('ip-lookup.lookup');
        Route::post('/dns-lookup/lookup', [DnsLookupController::class, 'lookup'])->name('dns-lookup.lookup');
        Route::post('/whois-lookup/lookup', [WhoisLookupController::class, 'lookup'])->name('whois-lookup.lookup');
        Route::post('/ping-test/ping', [PingTestController::class, 'ping'])->name('ping-test.ping');
        Route::post('/traceroute/trace', [TracerouteController::class, 'trace'])->name('traceroute.trace');
        Route::post('/port-checker/check', [PortCheckerController::class, 'check'])->name('port-checker.check');
        Route::post('/reverse-dns-lookup/lookup', [ReverseDnsController::class, 'lookup'])->name('reverse-dns-lookup.lookup');
        Route::post('/domain-to-ip/lookup', [DomainToIpController::class, 'lookup'])->name('domain-to-ip.lookup');
    });

    /*
    |--------------------------------------------------------------------------
    | Tool Routes - Time
    |--------------------------------------------------------------------------
    */

    Route::prefix('tools')->name('time.')->group(function () {
        // Time Zone Converter
        Route::get('/time-zone-converter', [App\Http\Controllers\Tools\Utility\TimeConverterController::class, 'timeZoneConverter'])->name('time-zone-converter');

        // Epoch Time Converter
        Route::get('/epoch-time-converter', [App\Http\Controllers\Tools\Utility\TimeConverterController::class, 'epochTimeConverter'])->name('epoch-time-converter');

        // Unix Timestamp Converters
        Route::get('/unix-timestamp-to-date', [App\Http\Controllers\Tools\Utility\TimeConverterController::class, 'unixToDate'])->name('unix-timestamp-to-date');
        Route::get('/date-to-unix-timestamp', [App\Http\Controllers\Tools\Utility\TimeConverterController::class, 'dateToUnix'])->name('date-to-unix-timestamp');

        // UTC Converters
        Route::get('/utc-to-local-time', [App\Http\Controllers\Tools\Utility\TimeConverterController::class, 'utcToLocal'])->name('utc-to-local-time');
        Route::get('/local-time-to-utc', [App\Http\Controllers\Tools\Utility\TimeConverterController::class, 'localToUtc'])->name('local-time-to-utc');

        // Time Unit Converter
        Route::get('/time-unit-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'time'])->name('time-unit-converter');
    });

    /*
    |--------------------------------------------------------------------------
    | Tool Routes - Text
    |--------------------------------------------------------------------------
    */

    Route::prefix('tools')->name('text.')->group(function () {
        // Word Counter
        Route::get('/word-counter', [App\Http\Controllers\Tools\Seo\WordCounterController::class, 'index'])->name('word-counter');

        // Duplicate Line Remover
        Route::get('/duplicate-line-remover', [App\Http\Controllers\Tools\Utility\DuplicateRemoverController::class, 'index'])->name('duplicate-line-remover');

        // File Difference Checker
        Route::get('/file-difference-checker', [App\Http\Controllers\Tools\Utility\DiffCheckerController::class, 'index'])->name('file-difference-checker');

        // Text to Morse Code
        Route::get('/text-to-morse-converter', [App\Http\Controllers\Tools\Utility\TextToMorseController::class, 'index'])->name('text-to-morse-converter');

        // Text Reverser
        Route::get('/text-reverser', [App\Http\Controllers\Tools\Utility\TextReverserController::class, 'index'])->name('text-reverser');

        // Morse Code to Text
        Route::get('/morse-to-text-converter', [App\Http\Controllers\Tools\Utility\MorseToTextController::class, 'index'])->name('morse-to-text-converter');

        // Lorem Ipsum Generator
        Route::get('/lorem-ipsum-generator', [App\Http\Controllers\Tools\Utility\LoremIpsumGeneratorController::class, 'index'])->name('lorem-ipsum-generator');
    });

    /*
    |--------------------------------------------------------------------------
    | Tool Routes - Development
    |--------------------------------------------------------------------------
    */

    Route::prefix('tools')->name('development.')->group(function () {
        // JSON Tools
        Route::get('/json-parser', [App\Http\Controllers\Tools\Utility\JsonParserController::class, 'index'])->name('json-parser');
        Route::get('/json-formatter', [App\Http\Controllers\Tools\Utility\JsonFormatterController::class, 'index'])->name('json-formatter');

        // XML Tools
        Route::get('/xml-formatter', [App\Http\Controllers\Tools\Utility\XmlFormatterController::class, 'index'])->name('xml-formatter');

        // HTML Tools
        Route::get('/html-minifier', [App\Http\Controllers\Tools\Utility\HtmlMinifierController::class, 'index'])->name('html-minifier');
        Route::post('/html-minifier/process', [App\Http\Controllers\Tools\Utility\HtmlMinifierController::class, 'process'])->name('html-minifier.process');
        Route::get('/html-viewer', [App\Http\Controllers\Tools\Utility\HtmlViewerController::class, 'index'])->name('html-viewer');
        Route::get('/html-encoder-decoder', [App\Http\Controllers\Tools\Utility\HtmlEncoderController::class, 'index'])->name('html-encoder-decoder');

        // JavaScript & CSS Tools
        Route::get('/js-minifier', [App\Http\Controllers\Tools\Utility\JsMinifierController::class, 'index'])->name('js-minifier');
        Route::post('/js-minifier/process', [App\Http\Controllers\Tools\Utility\JsMinifierController::class, 'process'])->name('js-minifier.process');
        Route::get('/css-minifier', [App\Http\Controllers\Tools\Utility\CssMinifierController::class, 'index'])->name('css-minifier');
        Route::post('/css-minifier/process', [App\Http\Controllers\Tools\Utility\CssMinifierController::class, 'process'])->name('css-minifier.process');

        // Code Formatter
        Route::get('/code-formatter', [App\Http\Controllers\Tools\Utility\CodeFormatterController::class, 'index'])->name('code-formatter');
        Route::post('/code-formatter/format', [App\Http\Controllers\Tools\Utility\CodeFormatterController::class, 'format'])->name('code-formatter.format');

        // Curl & Cron
        Route::get('/curl-command-builder', [App\Http\Controllers\Tools\Utility\CurlBuilderController::class, 'index'])->name('curl-command-builder');
        Route::get('/cron-job-generator', [App\Http\Controllers\Tools\Utility\CronJobGeneratorController::class, 'index'])->name('cron-job-generator');

        // Generators
        Route::get('/uuid-generator', [App\Http\Controllers\Tools\Utility\UuidGeneratorController::class, 'index'])->name('uuid-generator');
        Route::get('/md5-generator', [App\Http\Controllers\Tools\Utility\Md5GeneratorController::class, 'index'])->name('md5-generator');

        // Encoders/Decoders
        Route::get('/url-encoder-decoder', [App\Http\Controllers\Tools\Utility\UrlEncoderController::class, 'index'])->name('url-encoder-decoder');
        Route::get('/unicode-encoder-decoder', [App\Http\Controllers\Tools\Utility\UnicodeEncoderController::class, 'index'])->name('unicode-encoder-decoder');
        Route::get('/jwt-decoder', [App\Http\Controllers\Tools\Utility\EncodingController::class, 'jwtDecode'])->name('jwt-decoder');
        Route::get('/base64-encoder-decoder', [App\Http\Controllers\Tools\Utility\Base64Controller::class, 'index'])->name('base64-encoder-decoder');

        // Converters
        Route::get('/json-to-yaml-converter', [App\Http\Controllers\Tools\Utility\JsonYamlController::class, 'index'])->name('json-to-yaml-converter');
        Route::get('/json-to-xml-converter', [App\Http\Controllers\Tools\Utility\JsonXmlController::class, 'index'])->name('json-to-xml-converter');
        Route::get('/json-to-sql-converter', [App\Http\Controllers\Tools\Utility\JsonSqlController::class, 'index'])->name('json-to-sql-converter');
        Route::get('/markdown-to-html-converter', [App\Http\Controllers\Tools\Utility\MarkdownToHtmlController::class, 'index'])->name('markdown-to-html-converter');
        Route::post('/markdown-to-html/convert', [App\Http\Controllers\Tools\Utility\MarkdownToHtmlController::class, 'convert'])->name('markdown-to-html-converter.convert');
        Route::get('/html-to-markdown-converter', [App\Http\Controllers\Tools\Utility\ConverterController::class, 'htmlToMarkdown'])->name('html-to-markdown-converter');
    });

    /*
    |--------------------------------------------------------------------------
    | Tool Routes - Converters
    |--------------------------------------------------------------------------
    */

    Route::prefix('tools')->name('converters.')->group(function () {
        // Unit Converters
        Route::get('/frequency-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'frequency'])->name('frequency-converter');
        Route::get('/molar-mass-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'molarMass'])->name('molar-mass-converter');
        Route::get('/density-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'density'])->name('density-converter');
        Route::get('/torque-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'torque'])->name('torque-converter');
        Route::get('/cooking-unit-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'cooking'])->name('cooking-unit-converter');
        Route::get('/data-transfer-rate-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'dataTransfer'])->name('data-transfer-rate-converter');
        Route::get('/fuel-consumption-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'fuel'])->name('fuel-consumption-converter');
        Route::get('/angle-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'angle'])->name('angle-converter');
        Route::get('/force-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'force'])->name('force-converter');
        Route::get('/power-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'power'])->name('power-converter');
        Route::get('/pressure-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'pressure'])->name('pressure-converter');
        Route::get('/energy-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'energy'])->name('energy-converter');
        Route::get('/digital-storage-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'storage'])->name('digital-storage-converter');
        Route::get('/speed-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'speed'])->name('speed-converter');
        Route::get('/area-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'area'])->name('area-converter');
        Route::get('/volume-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'volume'])->name('volume-converter');
        Route::get('/temperature-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'temperature'])->name('temperature-converter');
        Route::get('/weight-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'weight'])->name('weight-converter');
        Route::get('/length-converter', [App\Http\Controllers\Tools\Converters\UnitConverterController::class, 'length'])->name('length-converter');

        // Number System Converters
        Route::get('/number-base-converter', [App\Http\Controllers\Tools\Utility\NumberBaseController::class, 'index'])->name('number-base-converter');
        Route::get('/decimal-octal-converter', [App\Http\Controllers\Tools\Utility\DecimalOctalController::class, 'index'])->name('decimal-octal-converter');
        Route::get('/decimal-hex-converter', [App\Http\Controllers\Tools\Utility\DecimalHexController::class, 'index'])->name('decimal-hex-converter');
        Route::get('/decimal-binary-converter', [App\Http\Controllers\Tools\Utility\DecimalBinaryController::class, 'index'])->name('decimal-binary-converter');
        Route::get('/binary-hex-converter', [App\Http\Controllers\Tools\Utility\BinaryHexController::class, 'index'])->name('binary-hex-converter');
        Route::get('/ascii-converter', [App\Http\Controllers\Tools\Utility\EncodingController::class, 'asciiConvert'])->name('ascii-converter');

        // Color Converter
        Route::get('/rgb-hex-converter', [App\Http\Controllers\Tools\Utility\RgbHexConverterController::class, 'index'])->name('rgb-hex-converter');

        // Case Converters
        Route::get('/studly-case-converter', [App\Http\Controllers\Tools\Utility\StudlyCaseController::class, 'index'])->name('studly-case-converter');
        Route::get('/snake-case-converter', [App\Http\Controllers\Tools\Utility\SnakeCaseController::class, 'index'])->name('snake-case-converter');
        Route::get('/sentence-case-converter', [App\Http\Controllers\Tools\Utility\SentenceCaseController::class, 'index'])->name('sentence-case-converter');
        Route::get('/pascal-case-converter', [App\Http\Controllers\Tools\Utility\PascalCaseController::class, 'index'])->name('pascal-case-converter');
        Route::get('/kebab-case-converter', [App\Http\Controllers\Tools\Utility\KebabCaseController::class, 'index'])->name('kebab-case-converter');
        Route::get('/camel-case-converter', [App\Http\Controllers\Tools\Utility\CamelCaseController::class, 'index'])->name('camel-case-converter');
        Route::get('/case-converter', [App\Http\Controllers\Tools\Utility\CaseConverterController::class, 'index'])->name('case-converter');
    });

    /*
    |--------------------------------------------------------------------------
    | Tool Routes - Spreadsheet
    |--------------------------------------------------------------------------
    */

    Route::prefix('tools')->name('spreadsheet.')->group(function () {
        // CSV to SQL
        Route::get('/csv-to-sql', [App\Http\Controllers\Tools\Utility\SpreadsheetConverterController::class, 'index'])->defaults('tool', 'csv-to-sql')->name('csv-to-sql');
        Route::post('/csv-to-sql', [App\Http\Controllers\Tools\Utility\SpreadsheetConverterController::class, 'convert'])->defaults('tool', 'csv-to-sql')->name('csv-to-sql.convert');

        // Google Sheets to Excel
        Route::get('/google-sheets-to-excel', [App\Http\Controllers\Tools\Utility\SpreadsheetConverterController::class, 'index'])->defaults('tool', 'google-sheets-to-excel')->name('google-sheets-to-excel');
        Route::post('/google-sheets-to-excel', [App\Http\Controllers\Tools\Utility\SpreadsheetConverterController::class, 'convert'])->defaults('tool', 'google-sheets-to-excel')->name('google-sheets-to-excel.convert');

        // XLSX to XLS
        Route::get('/xlsx-to-xls', [App\Http\Controllers\Tools\Utility\SpreadsheetConverterController::class, 'index'])->defaults('tool', 'xlsx-to-xls')->name('xlsx-to-xls');
        Route::post('/xlsx-to-xls', [App\Http\Controllers\Tools\Utility\SpreadsheetConverterController::class, 'convert'])->defaults('tool', 'xlsx-to-xls')->name('xlsx-to-xls.convert');

        // XLS to XLSX
        Route::get('/xls-to-xlsx', [App\Http\Controllers\Tools\Utility\SpreadsheetConverterController::class, 'index'])->defaults('tool', 'xls-to-xlsx')->name('xls-to-xlsx');
        Route::post('/xls-to-xlsx', [App\Http\Controllers\Tools\Utility\SpreadsheetConverterController::class, 'convert'])->defaults('tool', 'xls-to-xlsx')->name('xls-to-xlsx.convert');

        // CSV to Excel
        Route::get('/csv-to-excel', [App\Http\Controllers\Tools\Utility\SpreadsheetConverterController::class, 'index'])->defaults('tool', 'csv-to-excel')->name('csv-to-excel');
        Route::post('/csv-to-excel', [App\Http\Controllers\Tools\Utility\SpreadsheetConverterController::class, 'convert'])->defaults('tool', 'csv-to-excel')->name('csv-to-excel.convert');

        // Excel to CSV
        Route::get('/excel-to-csv', [App\Http\Controllers\Tools\Utility\SpreadsheetConverterController::class, 'index'])->defaults('tool', 'excel-to-csv')->name('excel-to-csv');
        Route::post('/excel-to-csv', [App\Http\Controllers\Tools\Utility\SpreadsheetConverterController::class, 'convert'])->defaults('tool', 'excel-to-csv')->name('excel-to-csv.convert');

        // TSV to CSV
        Route::get('/tsv-to-csv-converter', [App\Http\Controllers\Tools\Utility\TsvCsvController::class, 'index'])->name('tsv-to-csv-converter');
        Route::post('/tsv-to-csv-converter', [App\Http\Controllers\Tools\Utility\TsvCsvController::class, 'convert'])->name('tsv-to-csv-converter.convert');

        // CSV to XML
        Route::get('/csv-to-xml-converter', [App\Http\Controllers\Tools\Utility\CsvXmlController::class, 'index'])->name('csv-to-xml-converter');
    });


    /*
    |--------------------------------------------------------------------------
    | Authenticated Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth')->group(function () {
        // Profile Management
        Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::patch('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
        });
    });

    // Dashboard (with admin redirect)
    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user && $user->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    // Static Pages
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::get('/sponsors', [PageController::class, 'sponsors'])->name('sponsors');
    Route::get('/terms', [PageController::class, 'terms'])->name('terms');
    Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
    Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
};

// Register routes without locale prefix (default English)
Route::middleware('setlocale')->group($definePublicRoutes);

// Register routes with locale prefix (for other languages)
Route::prefix('{locale}')
    ->where(['locale' => '[a-z]{2}'])
    ->middleware('setlocale')
    ->group($definePublicRoutes);

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
