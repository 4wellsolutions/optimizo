<?php

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name($n('home'));

// Category Index Routes
Route::get('youtube-tools', [App\Http\Controllers\CategoryController::class, 'youtube'])->name($n('category.youtube'));
Route::get('seo-tools', [App\Http\Controllers\CategoryController::class, 'seo'])->name($n('category.seo'));
Route::get('utility-tools', [App\Http\Controllers\CategoryController::class, 'utility'])->name($n('category.utility'));
Route::get('network-tools', [App\Http\Controllers\CategoryController::class, 'network'])->name($n('category.network'));
Route::get('image-tools', [App\Http\Controllers\CategoryController::class, 'image'])->name($n('category.image'));
Route::get('document-tools', [App\Http\Controllers\CategoryController::class, 'document'])->name($n('category.document'));
Route::get('time-tools', [App\Http\Controllers\CategoryController::class, 'time'])->name($n('category.time'));
Route::get('text-tools', [App\Http\Controllers\CategoryController::class, 'text'])->name($n('category.text'));
Route::get('development-tools', [App\Http\Controllers\CategoryController::class, 'development'])->name($n('category.development'));
Route::get('converters-tools', [App\Http\Controllers\CategoryController::class, 'converters'])->name($n('category.converters'));
Route::get('spreadsheet-tools', [App\Http\Controllers\CategoryController::class, 'spreadsheet'])->name($n('category.spreadsheet'));

// Auxiliary Routes
Route::get('lang-switch/{code}', [App\Http\Controllers\LanguageController::class, 'switch'])->name($n('lang.switch'));
Route::get('about-us', [App\Http\Controllers\PageController::class, 'about'])->name($n('about'));
Route::get('contact-us', [App\Http\Controllers\PageController::class, 'contact'])->name($n('contact'));
Route::post('contact-us', [App\Http\Controllers\PageController::class, 'contactSubmit'])->name($n('contact.submit'));
Route::get('privacy-policy', [App\Http\Controllers\PageController::class, 'privacy'])->name($n('privacy'));
Route::get('terms-of-use', [App\Http\Controllers\PageController::class, 'terms'])->name($n('terms'));
Route::get('sponsors', [App\Http\Controllers\PageController::class, 'sponsors'])->name($n('sponsors'));

// Sitemap Routes
Route::get('sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name($n('sitemap.index'));
Route::get('sitemap_{locale}.xml', [App\Http\Controllers\SitemapController::class, 'language'])->name($n('sitemap.language'));

// Youtube Tools
Route::prefix('tools')->group(function () use ($n) {
    Route::get('youtube-monetization-checker', [YoutubeMonetizationCheckerController::class, 'index'])->name($n('youtube.youtube-monetization-checker'));
    Route::post('youtube-monetization-checker', [YoutubeMonetizationCheckerController::class, 'process']);
    Route::get('youtube-thumbnail-downloader', [YoutubeThumbnailDownloaderController::class, 'index'])->name($n('youtube.youtube-thumbnail-downloader'));
    Route::get('youtube-video-data-extractor', [YoutubeVideoDataExtractorController::class, 'index'])->name($n('youtube.youtube-video-data-extractor'));
    Route::get('youtube-tag-generator', [YoutubeTagGeneratorController::class, 'index'])->name($n('youtube.youtube-tag-generator'));
    Route::post('youtube-tag-generator', [YoutubeTagGeneratorController::class, 'process']);
    Route::get('youtube-channel-data-extractor', [YoutubeChannelDataExtractorController::class, 'index'])->name($n('youtube.youtube-channel-data-extractor'));
    Route::get('youtube-handle-checker', [YoutubeHandleCheckerController::class, 'index'])->name($n('youtube.youtube-handle-checker'));
    Route::post('youtube-handle-checker', [YoutubeHandleCheckerController::class, 'process']);
    Route::get('youtube-video-tags-extractor', [YoutubeVideoTagsExtractorController::class, 'index'])->name($n('youtube.youtube-video-tags-extractor'));
    Route::get('youtube-channel-id-finder', [YoutubeChannelIdFinderController::class, 'index'])->name($n('youtube.youtube-channel-id-finder'));
    Route::get('youtube-earnings-calculator', [YoutubeEarningsCalculatorController::class, 'index'])->name($n('youtube.youtube-earnings-calculator'));
});

// Seo Tools
Route::prefix('tools')->group(function () use ($n) {
    Route::get('slug-generator', [SlugGeneratorController::class, 'index'])->name($n('seo.slug-generator'));
    Route::post('slug-generator', [SlugGeneratorController::class, 'process']);
    Route::get('meta-tag-analyzer', [MetaTagAnalyzerController::class, 'index'])->name($n('seo.meta-tag-analyzer'));
    Route::post('meta-tag-analyzer', [MetaTagAnalyzerController::class, 'process']);
    Route::get('keyword-density-checker', [KeywordDensityCheckerController::class, 'index'])->name($n('seo.keyword-density-checker'));
    Route::post('keyword-density-checker', [KeywordDensityCheckerController::class, 'process']);
    Route::get('redirect-checker', [RedirectCheckerController::class, 'index'])->name($n('seo.redirect-checker'));
    Route::post('redirect-checker', [RedirectCheckerController::class, 'process']);
    Route::get('bing-serp-checker', [BingSerpCheckerController::class, 'index'])->name($n('seo.bing-serp-checker'));
    Route::post('bing-serp-checker', [BingSerpCheckerController::class, 'process']);
    Route::get('broken-links-checker', [BrokenLinksCheckerController::class, 'index'])->name($n('seo.broken-links-checker'));
    Route::post('broken-links-checker', [BrokenLinksCheckerController::class, 'process']);
    Route::get('google-serp-checker', [GoogleSerpCheckerController::class, 'index'])->name($n('seo.google-serp-checker'));
    Route::post('google-serp-checker', [GoogleSerpCheckerController::class, 'process']);
    Route::get('on-page-seo-checker', [OnPageSeoCheckerController::class, 'index'])->name($n('seo.on-page-seo-checker'));
    Route::post('on-page-seo-checker', [OnPageSeoCheckerController::class, 'process']);
    Route::get('yahoo-serp-checker', [YahooSerpCheckerController::class, 'index'])->name($n('seo.yahoo-serp-checker'));
    Route::post('yahoo-serp-checker', [YahooSerpCheckerController::class, 'process']);
});

// Document Tools
Route::prefix('tools')->group(function () use ($n) {
    Route::get('pdf-to-word', [PdfToWordController::class, 'index'])->name($n('document.pdf-to-word'));
    Route::get('word-to-pdf', [WordToPdfController::class, 'index'])->name($n('document.word-to-pdf'));
    Route::get('pdf-to-excel', [PdfToExcelController::class, 'index'])->name($n('document.pdf-to-excel'));
    Route::get('excel-to-pdf', [ExcelToPdfController::class, 'index'])->name($n('document.excel-to-pdf'));
    Route::get('ppt-to-pdf', [PptToPdfController::class, 'index'])->name($n('document.ppt-to-pdf'));
    Route::get('pdf-to-ppt', [PdfToPptController::class, 'index'])->name($n('document.pdf-to-ppt'));
    Route::get('pdf-to-jpg', [PdfToJpgController::class, 'index'])->name($n('document.pdf-to-jpg'));
    Route::get('jpg-to-pdf', [JpgToPdfController::class, 'index'])->name($n('document.jpg-to-pdf'));
    Route::get('pdf-compressor', [PdfCompressorController::class, 'index'])->name($n('document.pdf-compressor'));
    Route::post('pdf-compressor', [PdfCompressorController::class, 'process']);
    Route::get('pdf-merger', [PdfMergerController::class, 'index'])->name($n('document.pdf-merger'));
    Route::post('pdf-merger', [PdfMergerController::class, 'process']);
    Route::get('pdf-splitter', [PdfSplitterController::class, 'index'])->name($n('document.pdf-splitter'));
    Route::post('pdf-splitter', [PdfSplitterController::class, 'process']);
});

// Image Tools
Route::prefix('tools')->group(function () use ($n) {
    Route::get('image-converter', [ImageConverterController::class, 'index'])->name($n('image.image-converter'));
    Route::post('image-converter', [ImageConverterController::class, 'process']);
    Route::get('jpg-to-png-converter', [JpgToPngConverterController::class, 'index'])->name($n('image.jpg-to-png-converter'));
    Route::post('jpg-to-png-converter', [JpgToPngConverterController::class, 'process']);
    Route::get('png-to-jpg-converter', [PngToJpgConverterController::class, 'index'])->name($n('image.png-to-jpg-converter'));
    Route::post('png-to-jpg-converter', [PngToJpgConverterController::class, 'process']);
    Route::get('jpg-to-webp-converter', [JpgToWebpConverterController::class, 'index'])->name($n('image.jpg-to-webp-converter'));
    Route::post('jpg-to-webp-converter', [JpgToWebpConverterController::class, 'process']);
    Route::get('webp-to-jpg-converter', [WebpToJpgConverterController::class, 'index'])->name($n('image.webp-to-jpg-converter'));
    Route::post('webp-to-jpg-converter', [WebpToJpgConverterController::class, 'process']);
    Route::get('heic-to-jpg-converter', [HeicToJpgConverterController::class, 'index'])->name($n('image.heic-to-jpg-converter'));
    Route::post('heic-to-jpg-converter', [HeicToJpgConverterController::class, 'process']);
    Route::get('image-to-base64-converter', [ImageToBase64ConverterController::class, 'index'])->name($n('image.image-to-base64-converter'));
    Route::post('image-to-base64-converter', [ImageToBase64ConverterController::class, 'process']);
    Route::get('base64-to-image-converter', [Base64ToImageConverterController::class, 'index'])->name($n('image.base64-to-image-converter'));
    Route::post('base64-to-image-converter', [Base64ToImageConverterController::class, 'process']);
    Route::get('png-to-webp-converter', [PngToWebpConverterController::class, 'index'])->name($n('image.png-to-webp-converter'));
    Route::post('png-to-webp-converter', [PngToWebpConverterController::class, 'process']);
    Route::get('svg-to-png-converter', [SvgToPngConverterController::class, 'index'])->name($n('image.svg-to-png-converter'));
    Route::post('svg-to-png-converter', [SvgToPngConverterController::class, 'process']);
    Route::get('svg-to-jpg-converter', [SvgToJpgConverterController::class, 'index'])->name($n('image.svg-to-jpg-converter'));
    Route::post('svg-to-jpg-converter', [SvgToJpgConverterController::class, 'process']);
    Route::get('ico-converter', [IcoConverterController::class, 'index'])->name($n('image.ico-converter'));
    Route::post('ico-converter', [IcoConverterController::class, 'process']);
    Route::get('image-compressor', [ImageCompressorController::class, 'index'])->name($n('image.image-compressor'));
    Route::post('image-compressor', [ImageCompressorController::class, 'process']);
});

// Time Tools
Route::prefix('tools')->group(function () use ($n) {
    Route::get('time-zone-converter', [TimeZoneConverterController::class, 'index'])->name($n('time.time-zone-converter'));
    Route::post('time-zone-converter', [TimeZoneConverterController::class, 'process']);
    Route::get('epoch-time-converter', [EpochTimeConverterController::class, 'index'])->name($n('time.epoch-time-converter'));
    Route::post('epoch-time-converter', [EpochTimeConverterController::class, 'process']);
    Route::get('time-unit-converter', [TimeUnitConverterController::class, 'index'])->name($n('time.time-unit-converter'));
    Route::post('time-unit-converter', [TimeUnitConverterController::class, 'process']);
    Route::get('unix-timestamp-to-date', [UnixTimestampToDateController::class, 'index'])->name($n('time.unix-timestamp-to-date'));
    Route::get('date-to-unix-timestamp', [DateToUnixTimestampController::class, 'index'])->name($n('time.date-to-unix-timestamp'));
    Route::get('utc-to-local-time', [UtcToLocalTimeController::class, 'index'])->name($n('time.utc-to-local-time'));
    Route::get('local-time-to-utc', [LocalTimeToUtcController::class, 'index'])->name($n('time.local-time-to-utc'));
});

// Text Tools
Route::prefix('tools')->group(function () use ($n) {
    Route::get('morse-to-text-converter', [MorseToTextConverterController::class, 'index'])->name($n('text.morse-to-text-converter'));
    Route::post('morse-to-text-converter', [MorseToTextConverterController::class, 'process']);
    Route::get('text-reverser', [TextReverserController::class, 'index'])->name($n('text.text-reverser'));
    Route::get('text-to-morse-converter', [TextToMorseConverterController::class, 'index'])->name($n('text.text-to-morse-converter'));
    Route::post('text-to-morse-converter', [TextToMorseConverterController::class, 'process']);
    Route::get('lorem-ipsum-generator', [LoremIpsumGeneratorController::class, 'index'])->name($n('text.lorem-ipsum-generator'));
    Route::post('lorem-ipsum-generator', [LoremIpsumGeneratorController::class, 'process']);
    Route::get('duplicate-line-remover', [DuplicateLineRemoverController::class, 'index'])->name($n('text.duplicate-line-remover'));
    Route::get('file-difference-checker', [FileDifferenceCheckerController::class, 'index'])->name($n('text.file-difference-checker'));
    Route::post('file-difference-checker', [FileDifferenceCheckerController::class, 'process']);
    Route::get('word-counter', [WordCounterController::class, 'index'])->name($n('text.word-counter'));
});

// Utility Tools
Route::prefix('tools')->group(function () use ($n) {
    Route::get('qr-code-generator', [QrCodeGeneratorController::class, 'index'])->name($n('utility.qr-code-generator'));
    Route::post('qr-code-generator', [QrCodeGeneratorController::class, 'process']);
    Route::get('username-checker', [UsernameCheckerController::class, 'index'])->name($n('utility.username-checker'));
    Route::post('username-checker', [UsernameCheckerController::class, 'process']);
    Route::get('password-generator', [PasswordGeneratorController::class, 'index'])->name($n('utility.password-generator'));
    Route::post('password-generator', [PasswordGeneratorController::class, 'process']);
    Route::get('random-number-generator', [RandomNumberGeneratorController::class, 'index'])->name($n('utility.random-number-generator'));
    Route::post('random-number-generator', [RandomNumberGeneratorController::class, 'process']);
});

// Spreadsheet Tools
Route::prefix('tools')->group(function () use ($n) {
    Route::get('csv-to-xml-converter', [CsvToXmlConverterController::class, 'index'])->name($n('spreadsheet.csv-to-xml-converter'));
    Route::post('csv-to-xml-converter', [CsvToXmlConverterController::class, 'process']);
    Route::get('tsv-to-csv-converter', [TsvToCsvConverterController::class, 'index'])->name($n('spreadsheet.tsv-to-csv-converter'));
    Route::post('tsv-to-csv-converter', [TsvToCsvConverterController::class, 'process']);
    Route::get('excel-to-csv', [ExcelToCsvController::class, 'index'])->name($n('spreadsheet.excel-to-csv'));
    Route::get('csv-to-excel', [CsvToExcelController::class, 'index'])->name($n('spreadsheet.csv-to-excel'));
    Route::get('xls-to-xlsx', [XlsToXlsxController::class, 'index'])->name($n('spreadsheet.xls-to-xlsx'));
    Route::get('xlsx-to-xls', [XlsxToXlsController::class, 'index'])->name($n('spreadsheet.xlsx-to-xls'));
    Route::get('google-sheets-to-excel', [GoogleSheetsToExcelController::class, 'index'])->name($n('spreadsheet.google-sheets-to-excel'));
    Route::get('csv-to-sql', [CsvToSqlController::class, 'index'])->name($n('spreadsheet.csv-to-sql'));
    Route::get('csv-to-json', [CsvToJsonController::class, 'index'])->name($n('spreadsheet.csv-to-json'));
    Route::get('csv-to-tsv', [CsvToTsvController::class, 'index'])->name($n('spreadsheet.csv-to-tsv'));
});

// Development Tools
Route::prefix('tools')->group(function () use ($n) {
    Route::get('uuid-generator', [UuidGeneratorController::class, 'index'])->name($n('development.uuid-generator'));
    Route::post('uuid-generator', [UuidGeneratorController::class, 'process']);
    Route::get('md5-generator', [Md5GeneratorController::class, 'index'])->name($n('development.md5-generator'));
    Route::post('md5-generator', [Md5GeneratorController::class, 'process']);
    Route::get('json-formatter', [JsonFormatterController::class, 'index'])->name($n('development.json-formatter'));
    Route::get('base64-encoder-decoder', [Base64EncoderDecoderController::class, 'index'])->name($n('development.base64-encoder-decoder'));
    Route::post('base64-encoder-decoder', [Base64EncoderDecoderController::class, 'process']);
    Route::get('html-viewer', [HtmlViewerController::class, 'index'])->name($n('development.html-viewer'));
    Route::get('json-parser', [JsonParserController::class, 'index'])->name($n('development.json-parser'));
    Route::post('json-parser', [JsonParserController::class, 'process']);
    Route::get('code-formatter', [CodeFormatterController::class, 'index'])->name($n('development.code-formatter'));
    Route::get('css-minifier', [CssMinifierController::class, 'index'])->name($n('development.css-minifier'));
    Route::get('js-minifier', [JsMinifierController::class, 'index'])->name($n('development.js-minifier'));
    Route::get('html-minifier', [HtmlMinifierController::class, 'index'])->name($n('development.html-minifier'));
    Route::get('html-encoder-decoder', [HtmlEncoderDecoderController::class, 'index'])->name($n('development.html-encoder-decoder'));
    Route::post('html-encoder-decoder', [HtmlEncoderDecoderController::class, 'process']);
    Route::get('html-to-markdown-converter', [HtmlToMarkdownConverterController::class, 'index'])->name($n('development.html-to-markdown-converter'));
    Route::post('html-to-markdown-converter', [HtmlToMarkdownConverterController::class, 'process']);
    Route::get('json-to-sql-converter', [JsonToSqlConverterController::class, 'index'])->name($n('development.json-to-sql-converter'));
    Route::post('json-to-sql-converter', [JsonToSqlConverterController::class, 'process']);
    Route::get('json-to-xml-converter', [JsonToXmlConverterController::class, 'index'])->name($n('development.json-to-xml-converter'));
    Route::post('json-to-xml-converter', [JsonToXmlConverterController::class, 'process']);
    Route::get('json-to-yaml-converter', [JsonToYamlConverterController::class, 'index'])->name($n('development.json-to-yaml-converter'));
    Route::post('json-to-yaml-converter', [JsonToYamlConverterController::class, 'process']);
    Route::get('jwt-decoder', [JwtDecoderController::class, 'index'])->name($n('development.jwt-decoder'));
    Route::post('jwt-decoder', [JwtDecoderController::class, 'process']);
    Route::get('markdown-to-html-converter', [MarkdownToHtmlConverterController::class, 'index'])->name($n('development.markdown-to-html-converter'));
    Route::post('markdown-to-html-converter', [MarkdownToHtmlConverterController::class, 'process']);
    Route::get('unicode-encoder-decoder', [UnicodeEncoderDecoderController::class, 'index'])->name($n('development.unicode-encoder-decoder'));
    Route::post('unicode-encoder-decoder', [UnicodeEncoderDecoderController::class, 'process']);
    Route::get('url-encoder-decoder', [UrlEncoderDecoderController::class, 'index'])->name($n('development.url-encoder-decoder'));
    Route::post('url-encoder-decoder', [UrlEncoderDecoderController::class, 'process']);
    Route::get('xml-formatter', [XmlFormatterController::class, 'index'])->name($n('development.xml-formatter'));
    Route::get('cron-job-generator', [CronJobGeneratorController::class, 'index'])->name($n('development.cron-job-generator'));
    Route::post('cron-job-generator', [CronJobGeneratorController::class, 'process']);
    Route::get('curl-command-builder', [CurlCommandBuilderController::class, 'index'])->name($n('development.curl-command-builder'));
    Route::get('json-to-csv-converter', [JsonToCsvConverterController::class, 'index'])->name($n('development.json-to-csv-converter'));
    Route::post('json-to-csv-converter', [JsonToCsvConverterController::class, 'process']);
    Route::get('sql-to-json', [SqlToJsonController::class, 'index'])->name($n('development.sql-to-json'));
    Route::get('xml-to-csv', [XmlToCsvController::class, 'index'])->name($n('development.xml-to-csv'));
    Route::get('xml-to-json', [XmlToJsonController::class, 'index'])->name($n('development.xml-to-json'));
    Route::get('yaml-to-json', [YamlToJsonController::class, 'index'])->name($n('development.yaml-to-json'));
    Route::get('sql-to-json-converter', [SqlToJsonConverterController::class, 'index'])->name($n('development.sql-to-json-converter'));
    Route::post('sql-to-json-converter', [SqlToJsonConverterController::class, 'process']);
});

// Converters Tools
Route::prefix('tools')->group(function () use ($n) {
    Route::get('rgb-hex-converter', [RgbHexConverterController::class, 'index'])->name($n('converters.rgb-hex-converter'));
    Route::post('rgb-hex-converter', [RgbHexConverterController::class, 'process']);
    Route::get('case-converter', [CaseConverterController::class, 'index'])->name($n('converters.case-converter'));
    Route::post('case-converter', [CaseConverterController::class, 'process']);
    Route::get('ascii-converter', [AsciiConverterController::class, 'index'])->name($n('converters.ascii-converter'));
    Route::post('ascii-converter', [AsciiConverterController::class, 'process']);
    Route::get('binary-hex-converter', [BinaryHexConverterController::class, 'index'])->name($n('converters.binary-hex-converter'));
    Route::post('binary-hex-converter', [BinaryHexConverterController::class, 'process']);
    Route::get('camel-case-converter', [CamelCaseConverterController::class, 'index'])->name($n('converters.camel-case-converter'));
    Route::post('camel-case-converter', [CamelCaseConverterController::class, 'process']);
    Route::get('decimal-binary-converter', [DecimalBinaryConverterController::class, 'index'])->name($n('converters.decimal-binary-converter'));
    Route::post('decimal-binary-converter', [DecimalBinaryConverterController::class, 'process']);
    Route::get('decimal-hex-converter', [DecimalHexConverterController::class, 'index'])->name($n('converters.decimal-hex-converter'));
    Route::post('decimal-hex-converter', [DecimalHexConverterController::class, 'process']);
    Route::get('decimal-octal-converter', [DecimalOctalConverterController::class, 'index'])->name($n('converters.decimal-octal-converter'));
    Route::post('decimal-octal-converter', [DecimalOctalConverterController::class, 'process']);
    Route::get('kebab-case-converter', [KebabCaseConverterController::class, 'index'])->name($n('converters.kebab-case-converter'));
    Route::post('kebab-case-converter', [KebabCaseConverterController::class, 'process']);
    Route::get('number-base-converter', [NumberBaseConverterController::class, 'index'])->name($n('converters.number-base-converter'));
    Route::post('number-base-converter', [NumberBaseConverterController::class, 'process']);
    Route::get('pascal-case-converter', [PascalCaseConverterController::class, 'index'])->name($n('converters.pascal-case-converter'));
    Route::post('pascal-case-converter', [PascalCaseConverterController::class, 'process']);
    Route::get('sentence-case-converter', [SentenceCaseConverterController::class, 'index'])->name($n('converters.sentence-case-converter'));
    Route::post('sentence-case-converter', [SentenceCaseConverterController::class, 'process']);
    Route::get('snake-case-converter', [SnakeCaseConverterController::class, 'index'])->name($n('converters.snake-case-converter'));
    Route::post('snake-case-converter', [SnakeCaseConverterController::class, 'process']);
    Route::get('studly-case-converter', [StudlyCaseConverterController::class, 'index'])->name($n('converters.studly-case-converter'));
    Route::post('studly-case-converter', [StudlyCaseConverterController::class, 'process']);
    Route::get('length-converter', [LengthConverterController::class, 'index'])->name($n('converters.length-converter'));
    Route::post('length-converter', [LengthConverterController::class, 'process']);
    Route::get('weight-converter', [WeightConverterController::class, 'index'])->name($n('converters.weight-converter'));
    Route::post('weight-converter', [WeightConverterController::class, 'process']);
    Route::get('temperature-converter', [TemperatureConverterController::class, 'index'])->name($n('converters.temperature-converter'));
    Route::post('temperature-converter', [TemperatureConverterController::class, 'process']);
    Route::get('volume-converter', [VolumeConverterController::class, 'index'])->name($n('converters.volume-converter'));
    Route::post('volume-converter', [VolumeConverterController::class, 'process']);
    Route::get('area-converter', [AreaConverterController::class, 'index'])->name($n('converters.area-converter'));
    Route::post('area-converter', [AreaConverterController::class, 'process']);
    Route::get('speed-converter', [SpeedConverterController::class, 'index'])->name($n('converters.speed-converter'));
    Route::post('speed-converter', [SpeedConverterController::class, 'process']);
    Route::get('digital-storage-converter', [DigitalStorageConverterController::class, 'index'])->name($n('converters.digital-storage-converter'));
    Route::post('digital-storage-converter', [DigitalStorageConverterController::class, 'process']);
    Route::get('energy-converter', [EnergyConverterController::class, 'index'])->name($n('converters.energy-converter'));
    Route::post('energy-converter', [EnergyConverterController::class, 'process']);
    Route::get('pressure-converter', [PressureConverterController::class, 'index'])->name($n('converters.pressure-converter'));
    Route::post('pressure-converter', [PressureConverterController::class, 'process']);
    Route::get('power-converter', [PowerConverterController::class, 'index'])->name($n('converters.power-converter'));
    Route::post('power-converter', [PowerConverterController::class, 'process']);
    Route::get('force-converter', [ForceConverterController::class, 'index'])->name($n('converters.force-converter'));
    Route::post('force-converter', [ForceConverterController::class, 'process']);
    Route::get('angle-converter', [AngleConverterController::class, 'index'])->name($n('converters.angle-converter'));
    Route::post('angle-converter', [AngleConverterController::class, 'process']);
    Route::get('fuel-consumption-converter', [FuelConsumptionConverterController::class, 'index'])->name($n('converters.fuel-consumption-converter'));
    Route::post('fuel-consumption-converter', [FuelConsumptionConverterController::class, 'process']);
    Route::get('data-transfer-rate-converter', [DataTransferRateConverterController::class, 'index'])->name($n('converters.data-transfer-rate-converter'));
    Route::post('data-transfer-rate-converter', [DataTransferRateConverterController::class, 'process']);
    Route::get('cooking-unit-converter', [CookingUnitConverterController::class, 'index'])->name($n('converters.cooking-unit-converter'));
    Route::post('cooking-unit-converter', [CookingUnitConverterController::class, 'process']);
    Route::get('torque-converter', [TorqueConverterController::class, 'index'])->name($n('converters.torque-converter'));
    Route::post('torque-converter', [TorqueConverterController::class, 'process']);
    Route::get('density-converter', [DensityConverterController::class, 'index'])->name($n('converters.density-converter'));
    Route::post('density-converter', [DensityConverterController::class, 'process']);
    Route::get('molar-mass-converter', [MolarMassConverterController::class, 'index'])->name($n('converters.molar-mass-converter'));
    Route::post('molar-mass-converter', [MolarMassConverterController::class, 'process']);
    Route::get('frequency-converter', [FrequencyConverterController::class, 'index'])->name($n('converters.frequency-converter'));
    Route::post('frequency-converter', [FrequencyConverterController::class, 'process']);
    Route::get('binary-to-text', [BinaryToTextController::class, 'index'])->name($n('converters.binary-to-text'));
    Route::get('text-to-binary', [TextToBinaryController::class, 'index'])->name($n('converters.text-to-binary'));
});

// Network Tools
Route::prefix('tools')->group(function () use ($n) {
    Route::get('user-agent-parser', [UserAgentParserController::class, 'index'])->name($n('network.user-agent-parser'));
    Route::post('user-agent-parser', [UserAgentParserController::class, 'process']);
    Route::get('what-is-my-ip', [WhatIsMyIpController::class, 'index'])->name($n('network.what-is-my-ip'));
    Route::get('what-is-my-isp', [WhatIsMyIspController::class, 'index'])->name($n('network.what-is-my-isp'));
    Route::get('domain-to-ip', [DomainToIpController::class, 'index'])->name($n('network.domain-to-ip'));
    Route::get('ip-lookup', [IpLookupController::class, 'index'])->name($n('network.ip-lookup'));
    Route::get('dns-lookup', [DnsLookupController::class, 'index'])->name($n('network.dns-lookup'));
    Route::get('whois-lookup', [WhoisLookupController::class, 'index'])->name($n('network.whois-lookup'));
    Route::get('ping-test', [PingTestController::class, 'index'])->name($n('network.ping-test'));
    Route::get('traceroute', [TracerouteController::class, 'index'])->name($n('network.traceroute'));
    Route::get('port-checker', [PortCheckerController::class, 'index'])->name($n('network.port-checker'));
    Route::post('port-checker', [PortCheckerController::class, 'process']);
    Route::get('reverse-dns-lookup', [ReverseDnsLookupController::class, 'index'])->name($n('network.reverse-dns-lookup'));
    Route::get('internet-speed-test', [InternetSpeedTestController::class, 'index'])->name($n('network.internet-speed-test'));
});


