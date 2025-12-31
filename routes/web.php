<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    // Redirect admins to admin dashboard
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Tool Routes - Using Dedicated Controllers
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
    HtmlMinifierController
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
    ReverseDnsController
};
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
use App\Http\Controllers\Tools\SEO\{
    MetaAnalyzerController,
    KeywordDensityController,
    WordCounterController
};

// Utility Tools
Route::get('/tools/image-compressor', [ImageCompressorController::class, 'index'])->name('utility.image-compressor');
Route::get('/tools/rgb-hex-converter', [RgbHexConverterController::class, 'index'])->name('utility.rgb-hex-converter');
Route::get('/tools/slug-generator', [SlugGeneratorController::class, 'index'])->name('utility.slug-generator');
Route::get('/tools/internet-speed-test', [InternetSpeedTestController::class, 'index'])->name('utility.speed-test');
Route::get('/tools/md5-generator', [Md5GeneratorController::class, 'index'])->name('utility.md5-generator');
Route::get('/tools/case-converter', [CaseConverterController::class, 'index'])->name('utility.case-converter');
Route::get('/tools/username-checker', [UsernameCheckerController::class, 'index'])->name('utility.username-checker');
Route::get('/tools/password-generator', [PasswordGeneratorController::class, 'index'])->name('utility.password-generator');
Route::get('/tools/json-formatter', [JsonFormatterController::class, 'index'])->name('utility.json-formatter');
Route::get('/tools/base64-encoder-decoder', [Base64Controller::class, 'index'])->name('utility.base64');
Route::get('/tools/qr-code-generator', [QrGeneratorController::class, 'index'])->name('utility.qr-generator');
Route::get('/tools/html-viewer', [HtmlViewerController::class, 'index'])->name('utility.html-viewer');
Route::get('/tools/json-parser', [JsonParserController::class, 'index'])->name('utility.json-parser');
Route::get('/tools/code-formatter', [CodeFormatterController::class, 'index'])->name('utility.code-formatter');
Route::get('/tools/css-minifier', [CssMinifierController::class, 'index'])->name('utility.css-minifier');
Route::get('/tools/js-minifier', [JsMinifierController::class, 'index'])->name('utility.js-minifier');
Route::get('/tools/html-minifier', [HtmlMinifierController::class, 'index'])->name('utility.html-minifier');

// Network Tools
Route::get('/tools/what-is-my-ip', [WhatIsMyIpController::class, 'index'])->name('network.what-is-my-ip');
Route::get('/tools/what-is-my-isp', [WhatIsMyIspController::class, 'index'])->name('network.what-is-my-isp');
Route::get('/tools/domain-to-ip', [DomainToIpController::class, 'index'])->name('network.domain-to-ip');
Route::get('/tools/ip-lookup', [IpLookupController::class, 'index'])->name('network.ip-lookup');
Route::get('/tools/dns-lookup', [DnsLookupController::class, 'index'])->name('network.dns-lookup');
Route::get('/tools/whois-lookup', [WhoisLookupController::class, 'index'])->name('network.whois-lookup');
Route::get('/tools/ping-test', [PingTestController::class, 'index'])->name('network.ping-test');
Route::get('/tools/traceroute', [TracerouteController::class, 'index'])->name('network.traceroute');
Route::get('/tools/port-checker', [PortCheckerController::class, 'index'])->name('network.port-checker');
Route::get('/tools/reverse-dns', [ReverseDnsController::class, 'index'])->name('network.reverse-dns');

// YouTube Tools
Route::get('/tools/youtube-monetization-checker', [MonetizationCheckerController::class, 'index'])->name('youtube.monetization');
Route::get('/tools/youtube-thumbnail-downloader', [ThumbnailDownloaderController::class, 'index'])->name('youtube.thumbnail');
Route::get('/tools/youtube-video-data-extractor', [VideoDataExtractorController::class, 'index'])->name('youtube.extractor');
Route::get('/tools/youtube-tag-generator', [TagsGeneratorController::class, 'index'])->name('youtube.tags');
Route::get('/tools/youtube-channel-data-extractor', [ChannelDataExtractorController::class, 'index'])->name('youtube.channel');
Route::get('/tools/youtube-handle-checker', [HandleCheckerController::class, 'index'])->name('youtube.handle');
Route::get('/tools/youtube-video-tags-extractor', [VideoTagsExtractorController::class, 'index'])->name('youtube.video-tags');
Route::get('/tools/youtube-channel-id-finder', [ChannelIdFinderController::class, 'index'])->name('youtube.channel-id');
Route::get('/tools/youtube-earnings-calculator', [EarningsCalculatorController::class, 'index'])->name('youtube.earnings');

// SEO Tools
Route::get('/tools/meta-tag-analyzer', [MetaAnalyzerController::class, 'index'])->name('seo.meta-analyzer');
Route::get('/tools/keyword-density-checker', [KeywordDensityController::class, 'index'])->name('seo.keyword-density');
Route::get('/tools/word-counter', [WordCounterController::class, 'index'])->name('seo.word-counter');

// POST routes for tool functionality
Route::post('/tools/password-generator/generate', [PasswordGeneratorController::class, 'generate'])->name('utility.password-generator.generate');
Route::post('/tools/youtube-thumbnail/download', [ThumbnailDownloaderController::class, 'download'])->name('youtube.thumbnail.download');
Route::post('/tools/youtube-extractor/extract', [VideoDataExtractorController::class, 'extract'])->name('youtube.extractor.extract');
Route::post('/tools/meta-analyzer/analyze', [MetaAnalyzerController::class, 'analyze'])->name('seo.meta-analyzer.analyze');
Route::post('/tools/youtube-channel/extract', [ChannelDataExtractorController::class, 'extract'])->name('youtube.channel.extract');
Route::post('/tools/youtube-monetization/check', [MonetizationCheckerController::class, 'check'])->name('youtube.monetization.check');
Route::post('/tools/youtube-handle/check', [HandleCheckerController::class, 'check'])->name('youtube.handle.check');
Route::post('/tools/code-formatter/format', [CodeFormatterController::class, 'format'])->name('utility.code-formatter.format');
Route::post('/tools/css-minifier/process', [CssMinifierController::class, 'process'])->name('utility.css-minifier.process');
Route::post('/tools/js-minifier/process', [JsMinifierController::class, 'process'])->name('utility.js-minifier.process');
Route::post('/tools/html-minifier/process', [HtmlMinifierController::class, 'process'])->name('utility.html-minifier.process');
Route::post('/tools/youtube-video-tags/extract', [VideoTagsExtractorController::class, 'extract'])->name('youtube.video-tags.extract');
Route::post('/tools/youtube-channel-id/find', [ChannelIdFinderController::class, 'find'])->name('youtube.channel-id.find');
Route::post('/tools/youtube-earnings/calculate', [EarningsCalculatorController::class, 'calculate'])->name('youtube.earnings.calculate');
Route::post('/tools/ip-lookup/lookup', [IpLookupController::class, 'lookup'])->name('network.ip-lookup.lookup');
Route::post('/tools/dns-lookup/lookup', [DnsLookupController::class, 'lookup'])->name('network.dns-lookup.lookup');
Route::post('/tools/whois-lookup/lookup', [WhoisLookupController::class, 'lookup'])->name('network.whois-lookup.lookup');
Route::post('/tools/ping-test/ping', [PingTestController::class, 'ping'])->name('network.ping-test.ping');
Route::post('/tools/traceroute/trace', [TracerouteController::class, 'trace'])->name('network.traceroute.trace');
Route::post('/tools/port-checker/check', [PortCheckerController::class, 'check'])->name('network.port-checker.check');
Route::post('/tools/reverse-dns/lookup', [ReverseDnsController::class, 'lookup'])->name('network.reverse-dns.lookup');
Route::post('/tools/domain-to-ip/lookup', [DomainToIpController::class, 'lookup'])->name('network.domain-to-ip.lookup');



// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Tools Management
    Route::get('/tools', [App\Http\Controllers\Admin\AdminToolController::class, 'index'])->name('tools.index');
    Route::get('/tools/{tool}/edit', [App\Http\Controllers\Admin\AdminToolController::class, 'edit'])->name('tools.edit');
    Route::put('/tools/{tool}', [App\Http\Controllers\Admin\AdminToolController::class, 'update'])->name('tools.update');
    Route::post('/sitemap/generate', [App\Http\Controllers\Admin\AdminToolController::class, 'generateSitemap'])->name('sitemap.generate');

    // Posts
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::post('posts/{post}/publish', [App\Http\Controllers\Admin\PostController::class, 'publish'])->name('posts.publish');

    // Categories & Tags (AJAX endpoints)
    Route::get('categories/list', [App\Http\Controllers\Admin\PostController::class, 'categoriesList'])->name('categories.list');
    Route::post('categories', [App\Http\Controllers\Admin\PostController::class, 'storeCategory'])->name('categories.store');
    Route::get('tags/list', [App\Http\Controllers\Admin\PostController::class, 'tagsList'])->name('tags.list');
    Route::post('tags', [App\Http\Controllers\Admin\PostController::class, 'storeTag'])->name('tags.store');

    // Media
    Route::resource('media', App\Http\Controllers\Admin\MediaController::class);
    Route::post('media/upload', [App\Http\Controllers\Admin\MediaController::class, 'upload'])->name('media.upload');

    // Redirects
    Route::resource('redirects', App\Http\Controllers\Admin\RedirectController::class);
    Route::post('redirects/import', [App\Http\Controllers\Admin\RedirectController::class, 'import'])->name('redirects.import');

    // Settings
    Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
});

// Static Pages
use App\Http\Controllers\PageController;
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/sponsors', [PageController::class, 'sponsors'])->name('sponsors');

require __DIR__ . '/auth.php';

