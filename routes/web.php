<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
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
    SpreadsheetConverterController
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

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Category Pages
Route::prefix('')->name('category.')->group(function () {
    Route::get('/youtube-tools', [CategoryController::class, 'youtube'])->name('youtube');
    Route::get('/seo-tools', [CategoryController::class, 'seo'])->name('seo');
    Route::get('/utility-tools', [CategoryController::class, 'utility'])->name('utility');
    Route::get('/network-tools', [CategoryController::class, 'network'])->name('network');
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

/*
|--------------------------------------------------------------------------
| Tool Routes - YouTube
|--------------------------------------------------------------------------
*/

Route::prefix('tools')->name('youtube.')->group(function () {
    // GET Routes
    Route::get('/youtube-monetization-checker', [MonetizationCheckerController::class, 'index'])->name('monetization');
    Route::get('/youtube-thumbnail-downloader', [ThumbnailDownloaderController::class, 'index'])->name('thumbnail');
    Route::get('/youtube-video-data-extractor', [VideoDataExtractorController::class, 'index'])->name('extractor');
    Route::get('/youtube-tag-generator', [TagsGeneratorController::class, 'index'])->name('tags');
    Route::get('/youtube-channel-data-extractor', [ChannelDataExtractorController::class, 'index'])->name('channel');
    Route::get('/youtube-handle-checker', [HandleCheckerController::class, 'index'])->name('handle');
    Route::get('/youtube-video-tags-extractor', [VideoTagsExtractorController::class, 'index'])->name('video-tags');
    Route::get('/youtube-channel-id-finder', [ChannelIdFinderController::class, 'index'])->name('channel-id');
    Route::get('/youtube-earnings-calculator', [EarningsCalculatorController::class, 'index'])->name('earnings');

    // POST Routes
    Route::post('/youtube-monetization/check', [MonetizationCheckerController::class, 'check'])->name('monetization.check');
    Route::post('/youtube-thumbnail/download', [ThumbnailDownloaderController::class, 'download'])->name('thumbnail.download');
    Route::post('/youtube-extractor/extract', [VideoDataExtractorController::class, 'extract'])->name('extractor.extract');
    Route::post('/youtube-channel/extract', [ChannelDataExtractorController::class, 'extract'])->name('channel.extract');
    Route::post('/youtube-handle/check', [HandleCheckerController::class, 'check'])->name('handle.check');
    Route::post('/youtube-video-tags/extract', [VideoTagsExtractorController::class, 'extract'])->name('video-tags.extract');
    Route::post('/youtube-channel-id/find', [ChannelIdFinderController::class, 'find'])->name('channel-id.find');
    Route::post('/youtube-earnings/calculate', [EarningsCalculatorController::class, 'calculate'])->name('earnings.calculate');
});

/*
|--------------------------------------------------------------------------
| Tool Routes - SEO
|--------------------------------------------------------------------------
*/

Route::prefix('tools')->name('seo.')->group(function () {
    // GET Routes
    Route::get('/meta-tag-analyzer', [MetaAnalyzerController::class, 'index'])->name('meta-analyzer');
    Route::get('/keyword-density-checker', [KeywordDensityController::class, 'index'])->name('keyword-density');
    Route::get('/word-counter', [WordCounterController::class, 'index'])->name('word-counter');

    // POST Routes
    Route::post('/meta-analyzer/analyze', [MetaAnalyzerController::class, 'analyze'])->name('meta-analyzer.analyze');

    // Google SERP Checker
    Route::get('/google-serp-checker', [GoogleSerpCheckerController::class, 'index'])->name('google-serp-checker');
    Route::get('/locations', [LocationController::class, 'search'])->name('locations.search');
    Route::get('/bing-serp-checker', [BingSerpCheckerController::class, 'index'])->name('bing-serp-checker');
    Route::get('/yahoo-serp-checker', [YahooSerpCheckerController::class, 'index'])->name('yahoo-serp-checker');

    // On-Page SEO Checker
    Route::get('/on-page-seo-checker', [OnPageSeoCheckerController::class, 'index'])->name('on-page-seo-checker');
    Route::post('/on-page-seo-checker/init', [OnPageSeoCheckerController::class, 'init'])->name('on-page.init');
    Route::post('/on-page-seo-checker/analyze-step', [OnPageSeoCheckerController::class, 'analyzeStep'])->name('on-page.analyze-step');
    Route::get('/on-page-seo-checker/export', [OnPageSeoCheckerController::class, 'exportPdf'])->name('on-page.export');

    // Broken Links Checker
    Route::get('/broken-links-checker', [BrokenLinksCheckerController::class, 'index'])->name('broken-links-checker');
    Route::post('/broken-links-checker/extract', [BrokenLinksCheckerController::class, 'extract'])->name('broken-links.extract');
    Route::post('/broken-links-checker/status', [BrokenLinksCheckerController::class, 'checkStatus'])->name('broken-links.status');
    Route::get('/broken-links-checker/export', [BrokenLinksCheckerController::class, 'export'])->name('broken-links.export');
});

/*
|--------------------------------------------------------------------------
| Tool Routes - Utility
|--------------------------------------------------------------------------
*/

Route::prefix('tools')->name('utility.')->group(function () {
    // GET Routes
    Route::get('/image-compressor', [ImageCompressorController::class, 'index'])->name('image-compressor');
    Route::get('/rgb-hex-converter', [RgbHexConverterController::class, 'index'])->name('rgb-hex-converter');
    Route::get('/slug-generator', [SlugGeneratorController::class, 'index'])->name('slug-generator');
    Route::get('/internet-speed-test', [InternetSpeedTestController::class, 'index'])->name('speed-test');
    Route::get('/md5-generator', [Md5GeneratorController::class, 'index'])->name('md5-generator');
    Route::get('/case-converter', [CaseConverterController::class, 'index'])->name('case-converter');
    Route::get('/username-checker', [UsernameCheckerController::class, 'index'])->name('username-checker');
    Route::get('/password-generator', [PasswordGeneratorController::class, 'index'])->name('password-generator');
    Route::get('/json-formatter', [JsonFormatterController::class, 'index'])->name('json-formatter');
    Route::get('/base64-encoder-decoder', [Base64Controller::class, 'index'])->name('base64');
    Route::get('/qr-code-generator', [QrGeneratorController::class, 'index'])->name('qr-generator');
    Route::get('/html-viewer', [HtmlViewerController::class, 'index'])->name('html-viewer');
    Route::get('/json-parser', [JsonParserController::class, 'index'])->name('json-parser');
    Route::get('/code-formatter', [CodeFormatterController::class, 'index'])->name('code-formatter');
    Route::get('/css-minifier', [CssMinifierController::class, 'index'])->name('css-minifier');
    Route::get('/js-minifier', [JsMinifierController::class, 'index'])->name('js-minifier');
    Route::get('/html-minifier', [HtmlMinifierController::class, 'index'])->name('html-minifier');
    Route::get('/url-encoder-decoder', [UrlEncoderController::class, 'index'])->name('url-encoder');
    Route::get('/html-encoder-decoder', [HtmlEncoderController::class, 'index'])->name('html-encoder');
    Route::get('/unicode-encoder-decoder', [UnicodeEncoderController::class, 'index'])->name('unicode-encoder');
    Route::get('/markdown-to-html-converter', [MarkdownToHtmlController::class, 'index'])->name('markdown-to-html');
    Route::get('/html-to-markdown-converter', [ConverterController::class, 'htmlToMarkdown'])->name('html-to-markdown');
    Route::get('/csv-to-json-converter', [ConverterController::class, 'csvToJson'])->name('csv-to-json');
    Route::get('/json-to-csv-converter', [ConverterController::class, 'jsonToCsv'])->name('json-to-csv');
    Route::get('/xml-to-json-converter', [ConverterController::class, 'xmlToJson'])->name('xml-to-json');
    Route::get('/yaml-to-json-converter', [ConverterController::class, 'yamlToJson'])->name('yaml-to-json');
    Route::get('/text-to-binary-converter', [ConverterController::class, 'textToBinary'])->name('text-to-binary');
    Route::get('/binary-to-text-converter', [ConverterController::class, 'binaryToText'])->name('binary-to-text');

    // Encoding/Decoding Tools (JWT and ASCII only - others are combined above)
    Route::get('/jwt-decoder', [EncodingController::class, 'jwtDecode'])->name('jwt-decode');
    Route::get('/ascii-converter', [EncodingController::class, 'asciiConvert'])->name('ascii-convert');

    // Number System Converters
    Route::get('/decimal-binary-converter', [DecimalBinaryController::class, 'index'])->name('decimal-binary');
    Route::get('/decimal-hex-converter', [DecimalHexController::class, 'index'])->name('decimal-hex');
    Route::get('/binary-hex-converter', [BinaryHexController::class, 'index'])->name('binary-hex');
    Route::get('/decimal-octal-converter', [DecimalOctalController::class, 'index'])->name('decimal-octal');
    Route::get('/number-base-converter', [NumberBaseController::class, 'index'])->name('number-base');

    // Data Format Converters (Bidirectional)
    Route::get('/json-to-xml-converter', [JsonXmlController::class, 'index'])->name('json-xml');
    Route::get('/json-to-yaml-converter', [JsonYamlController::class, 'index'])->name('json-yaml');
    Route::get('/csv-to-xml-converter', [CsvXmlController::class, 'index'])->name('csv-xml');
    Route::get('/json-to-sql-converter', [JsonSqlController::class, 'index'])->name('json-sql');
    Route::get('/tsv-to-csv-converter', [TsvCsvController::class, 'index'])->name('tsv-csv');

    // Text & String Converters
    Route::get('/sentence-case-converter', [SentenceCaseController::class, 'index'])->name('sentence-case');
    Route::get('/camel-case-converter', [CamelCaseController::class, 'index'])->name('camel-case');
    Route::get('/pascal-case-converter', [PascalCaseController::class, 'index'])->name('pascal-case');
    Route::get('/snake-case-converter', [SnakeCaseController::class, 'index'])->name('snake-case');
    Route::get('/kebab-case-converter', [KebabCaseController::class, 'index'])->name('kebab-case');
    Route::get('/studly-case-converter', [StudlyCaseController::class, 'index'])->name('studly-case');
    Route::get('/text-reverser', [TextReverserController::class, 'index'])->name('text-reverser');
    Route::get('/text-to-morse-converter', [TextToMorseController::class, 'index'])->name('text-to-morse');
    Route::get('/morse-to-text-converter', [MorseToTextController::class, 'index'])->name('morse-to-text');
    Route::get('/morse-to-text-converter', [MorseToTextController::class, 'index'])->name('morse-to-text');

    // Document Converters (11 Tools)
    Route::get('/pdf-to-word', [DocumentConverterController::class, 'indexPdfToWord'])->name('pdf-to-word');
    Route::post('/pdf-to-word', [DocumentConverterController::class, 'processPdfToWord'])->name('pdf-to-word.process');

    Route::get('/word-to-pdf', [DocumentConverterController::class, 'indexWordToPdf'])->name('word-to-pdf');
    Route::post('/word-to-pdf', [DocumentConverterController::class, 'processWordToPdf'])->name('word-to-pdf.process');

    Route::get('/pdf-to-excel', [DocumentConverterController::class, 'indexPdfToExcel'])->name('pdf-to-excel');
    Route::post('/pdf-to-excel', [DocumentConverterController::class, 'processPdfToExcel'])->name('pdf-to-excel.process');

    Route::get('/excel-to-pdf', [DocumentConverterController::class, 'indexExcelToPdf'])->name('excel-to-pdf');
    Route::post('/excel-to-pdf', [DocumentConverterController::class, 'processExcelToPdf'])->name('excel-to-pdf.process');

    Route::get('/pdf-to-jpg', [DocumentConverterController::class, 'indexPdfToJpg'])->name('pdf-to-jpg');
    Route::post('/pdf-to-jpg', [DocumentConverterController::class, 'processPdfToJpg'])->name('pdf-to-jpg.process');

    Route::get('/jpg-to-pdf', [DocumentConverterController::class, 'indexJpgToPdf'])->name('jpg-to-pdf');
    Route::post('/jpg-to-pdf', [DocumentConverterController::class, 'processJpgToPdf'])->name('jpg-to-pdf.process');

    Route::get('/powerpoint-to-pdf', [DocumentConverterController::class, 'indexPptToPdf'])->name('powerpoint-to-pdf');
    Route::post('/powerpoint-to-pdf', [DocumentConverterController::class, 'processPptToPdf'])->name('powerpoint-to-pdf.process');

    Route::get('/pdf-to-powerpoint', [DocumentConverterController::class, 'indexPdfToPpt'])->name('pdf-to-ppt');
    Route::post('/pdf-to-powerpoint', [DocumentConverterController::class, 'processPdfToPpt'])->name('pdf-to-ppt.process');

    Route::get('/pdf-compressor', [DocumentConverterController::class, 'indexPdfCompressor'])->name('pdf-compressor');
    Route::get('/pdf-merger', [DocumentConverterController::class, 'indexPdfMerger'])->name('pdf-merger');
    Route::get('/pdf-splitter', [DocumentConverterController::class, 'indexPdfSplitter'])->name('pdf-splitter');

    // Spreadsheet & Data Converters
    Route::get('/excel-to-csv', [SpreadsheetConverterController::class, 'index'])->defaults('tool', 'excel-to-csv')->name('excel-to-csv');
    Route::post('/excel-to-csv', [SpreadsheetConverterController::class, 'convert'])->defaults('tool', 'excel-to-csv')->name('excel-to-csv.convert');

    Route::get('/csv-to-excel', [SpreadsheetConverterController::class, 'index'])->defaults('tool', 'csv-to-excel')->name('csv-to-excel');
    Route::post('/csv-to-excel', [SpreadsheetConverterController::class, 'convert'])->defaults('tool', 'csv-to-excel')->name('csv-to-excel.convert');

    Route::get('/xls-to-xlsx', [SpreadsheetConverterController::class, 'index'])->defaults('tool', 'xls-to-xlsx')->name('xls-to-xlsx');
    Route::post('/xls-to-xlsx', [SpreadsheetConverterController::class, 'convert'])->defaults('tool', 'xls-to-xlsx')->name('xls-to-xlsx.convert');

    Route::get('/xlsx-to-xls', [SpreadsheetConverterController::class, 'index'])->defaults('tool', 'xlsx-to-xls')->name('xlsx-to-xls');
    Route::post('/xlsx-to-xls', [SpreadsheetConverterController::class, 'convert'])->defaults('tool', 'xlsx-to-xls')->name('xlsx-to-xls.convert');

    Route::get('/google-sheets-to-excel', [SpreadsheetConverterController::class, 'index'])->defaults('tool', 'google-sheets-to-excel')->name('google-sheets-to-excel');
    Route::post('/google-sheets-to-excel', [SpreadsheetConverterController::class, 'convert'])->defaults('tool', 'google-sheets-to-excel')->name('google-sheets-to-excel.convert');

    Route::get('/csv-to-sql', [SpreadsheetConverterController::class, 'index'])->defaults('tool', 'csv-to-sql')->name('csv-to-sql');
    Route::post('/csv-to-sql', [SpreadsheetConverterController::class, 'convert'])->defaults('tool', 'csv-to-sql')->name('csv-to-sql.convert');


    // POST Routes
    Route::post('/password-generator/generate', [PasswordGeneratorController::class, 'generate'])->name('password-generator.generate');
    Route::post('/code-formatter/format', [CodeFormatterController::class, 'format'])->name('code-formatter.format');
    Route::post('/css-minifier/process', [CssMinifierController::class, 'process'])->name('css-minifier.process');
    Route::post('/js-minifier/process', [JsMinifierController::class, 'process'])->name('js-minifier.process');
    Route::post('/html-minifier/process', [HtmlMinifierController::class, 'process'])->name('html-minifier.process');
    Route::post('/markdown-to-html/convert', [MarkdownToHtmlController::class, 'convert'])->name('markdown-to-html.convert');

    // Image Converters (New)
    Route::get('/image-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'imageConverter'])->name('image-converter');
    Route::get('/jpg-to-png-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'jpgToPng'])->name('jpg-to-png');
    Route::get('/png-to-jpg-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'pngToJpg'])->name('png-to-jpg');
    Route::get('/jpg-to-webp-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'jpgToWebp'])->name('jpg-to-webp');
    Route::get('/webp-to-jpg-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'webpToJpg'])->name('webp-to-jpg');
    Route::get('/png-to-webp-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'pngToWebp'])->name('png-to-webp');
    Route::get('/image-to-base64-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'imageToBase64'])->name('image-to-base64');
    Route::get('/base64-to-image-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'base64ToImage'])->name('base64-to-image');
    Route::get('/svg-to-png-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'svgToPng'])->name('svg-to-png');
    Route::get('/svg-to-jpg-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'svgToJpg'])->name('svg-to-jpg');
    Route::get('/heic-to-jpg-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'heicToJpg'])->name('heic-to-jpg');
    Route::get('/ico-converter', [App\Http\Controllers\Tools\Utility\ImageToolsController::class, 'icoConverter'])->name('ico-converter');
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
    Route::get('/reverse-dns', [ReverseDnsController::class, 'index'])->name('reverse-dns');
    Route::get('/redirect-checker', [RedirectCheckerController::class, 'index'])->name('redirect-checker');


    // POST Routes
    Route::post('/ip-lookup/lookup', [IpLookupController::class, 'lookup'])->name('ip-lookup.lookup');
    Route::post('/dns-lookup/lookup', [DnsLookupController::class, 'lookup'])->name('dns-lookup.lookup');
    Route::post('/whois-lookup/lookup', [WhoisLookupController::class, 'lookup'])->name('whois-lookup.lookup');
    Route::post('/ping-test/ping', [PingTestController::class, 'ping'])->name('ping-test.ping');
    Route::post('/traceroute/trace', [TracerouteController::class, 'trace'])->name('traceroute.trace');
    Route::post('/port-checker/check', [PortCheckerController::class, 'check'])->name('port-checker.check');
    Route::post('/reverse-dns/lookup', [ReverseDnsController::class, 'lookup'])->name('reverse-dns.lookup');
    Route::post('/domain-to-ip/lookup', [DomainToIpController::class, 'lookup'])->name('domain-to-ip.lookup');
    Route::post('/redirect-checker/check', [RedirectCheckerController::class, 'check'])->name('redirect-checker.check');
    Route::post('/redirect-checker/canonical', [RedirectCheckerController::class, 'checkCanonical'])->name('redirect-checker.canonical');
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
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Tools Management
    Route::prefix('tools')->name('tools.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\AdminToolController::class, 'index'])->name('index');
        Route::post('/sync', [App\Http\Controllers\Admin\AdminToolController::class, 'sync'])->name('sync');
        Route::post('/build', [App\Http\Controllers\Admin\AdminToolController::class, 'build'])->name('build');
        Route::get('/{tool}/edit', [App\Http\Controllers\Admin\AdminToolController::class, 'edit'])->name('edit');
        Route::put('/{tool}', [App\Http\Controllers\Admin\AdminToolController::class, 'update'])->name('update');
    });

    // Sitemap Management
    Route::get('/sitemap', [App\Http\Controllers\Admin\AdminSitemapController::class, 'index'])->name('sitemap.index');
    Route::post('/sitemap/generate', [App\Http\Controllers\Admin\AdminSitemapController::class, 'generate'])->name('sitemap.generate');

    // Posts Management
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::post('posts/{post}/publish', [App\Http\Controllers\Admin\PostController::class, 'publish'])->name('posts.publish');

    // Categories & Tags (AJAX Endpoints)
    // Categories Management
    Route::get('categories/list', [App\Http\Controllers\Admin\CategoryController::class, 'list'])->name('categories.list');
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

    Route::prefix('tags')->name('tags.')->group(function () {
        Route::get('/list', [App\Http\Controllers\Admin\PostController::class, 'tagsList'])->name('list');
        Route::post('/', [App\Http\Controllers\Admin\PostController::class, 'storeTag'])->name('store');
    });

    // Media Management
    Route::get('media/list', [App\Http\Controllers\Admin\MediaController::class, 'list'])->name('media.list');
    Route::resource('media', App\Http\Controllers\Admin\MediaController::class);
    Route::post('media/upload', [App\Http\Controllers\Admin\MediaController::class, 'upload'])->name('media.upload');

    // Blog Import
    Route::get('import', [App\Http\Controllers\Admin\BlogImportController::class, 'index'])->name('import.index');
    Route::post('import', [App\Http\Controllers\Admin\BlogImportController::class, 'process'])->name('import.process');



    // YouTube Tools
    Route::prefix('youtube')->name('youtube.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('index');
        Route::post('/', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('update');
        Route::post('/generate-sitemap', [App\Http\Controllers\Admin\SettingController::class, 'generateSitemap'])->name('generate-sitemap');
    });

    // Redirects Management
    Route::resource('redirects', App\Http\Controllers\Admin\RedirectController::class);
    Route::post('redirects/import', [App\Http\Controllers\Admin\RedirectController::class, 'import'])->name('redirects.import');

    // Settings
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('index');
        Route::post('/', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('update');
        Route::post('/generate-sitemap', [App\Http\Controllers\Admin\SettingController::class, 'generateSitemap'])->name('generate-sitemap');

        // Cache System
        Route::get('/cache', [App\Http\Controllers\Admin\SettingController::class, 'cache'])->name('cache');
        Route::post('/cache/clear', [App\Http\Controllers\Admin\SettingController::class, 'clearCache'])->name('cache.clear');
    });
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
