<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ToolsOnlySeeder extends Seeder
{
    /**
     * Seed the application's database with tools only.
     */
    public function run(): void
    {
        $this->call([
                // YouTube Tools
            YoutubeMonetizationCheckerSeeder::class,
            YoutubeChannelDataExtractorSeeder::class,
            YoutubeChannelIdFinderSeeder::class,
            YoutubeEarningsCalculatorSeeder::class,
            YoutubeVideoDataExtractorSeeder::class,
            YoutubeTagGeneratorSeeder::class,
            YoutubeVideoTagsExtractorSeeder::class,
            YoutubeThumbnailDownloaderSeeder::class,
            YoutubeHandleCheckerSeeder::class,

                // SEO Tools
            MetaTagAnalyzerSeeder::class,
            KeywordDensityCheckerSeeder::class,
            WordCounterSeeder::class,
            RedirectCheckerSeeder::class,
            GoogleSerpCheckerSeeder::class,
            BingSerpCheckerSeeder::class,
            YahooSerpCheckerSeeder::class,
            OnPageSeoCheckerSeeder::class,
            BrokenLinksCheckerSeeder::class,

                // Network Tools
            WhatIsMyIpSeeder::class,
            IpLookupSeeder::class,
            DomainToIpSeeder::class,
            ReverseDnsSeeder::class,
            WhatIsMyIspSeeder::class,
            DnsLookupSeeder::class,
            WhoisLookupSeeder::class,
            PingTestSeeder::class,
            TracerouteSeeder::class,
            PortCheckerSeeder::class,

                // Utility Tools
            Base64EncoderDecoderSeeder::class,
            UrlEncoderDecoderSeeder::class,
            HtmlEncoderDecoderSeeder::class,
            UnicodeEncoderDecoderSeeder::class,
            JwtDecoderSeeder::class,
            AsciiConverterSeeder::class,
            JsonToXmlConverterSeeder::class,
            JsonToYamlConverterSeeder::class,
            CsvToXmlConverterSeeder::class,
            JsonToSqlConverterSeeder::class,
            TsvToCsvConverterSeeder::class,
            CaseConverterSeeder::class,
            JsonFormatterSeeder::class,
            JsonParserSeeder::class,
            CodeFormatterSeeder::class,
            MarkdownToHtmlConverterSeeder::class,
            HtmlToMarkdownConverterSeeder::class,
            Md5GeneratorSeeder::class,
            SlugGeneratorSeeder::class,
            SentenceCaseConverterSeeder::class,
            CamelCaseConverterSeeder::class,
            PascalCaseConverterSeeder::class,
            SnakeCaseConverterSeeder::class,
            KebabCaseConverterSeeder::class,
            StudlyCaseConverterSeeder::class,
            TextReverserSeeder::class,
            TextToMorseConverterSeeder::class,
            MorseToTextConverterSeeder::class,
            ImageCompressorSeeder::class,
            RgbHexConverterSeeder::class,
            QrCodeGeneratorSeeder::class,
            HtmlViewerSeeder::class,
            CssMinifierSeeder::class,
            JsMinifierSeeder::class,
            HtmlMinifierSeeder::class,
            UsernameCheckerSeeder::class,
            PasswordGeneratorSeeder::class,
            InternetSpeedTestSeeder::class,
            DecimalBinaryConverterSeeder::class,
            DecimalHexConverterSeeder::class,
            BinaryHexConverterSeeder::class,
            DecimalOctalConverterSeeder::class,
            NumberBaseConverterSeeder::class,

                // New Image Tools
            ImageConverterSeeder::class,
            JpgToPngSeeder::class,
            PngToJpgSeeder::class,
            JpgToWebpSeeder::class,
            WebpToJpgSeeder::class,
            PngToWebpSeeder::class,
            ImageToBase64Seeder::class,
            Base64ToImageSeeder::class,
            SvgToPngSeeder::class,
            SvgToJpgSeeder::class,
            HeicToJpgSeeder::class,
            IcoConverterSeeder::class,

                // Document Converter Tools
            PdfToWordSeeder::class,
            WordToPdfSeeder::class,
            PdfToExcelSeeder::class,
            ExcelToPdfSeeder::class,
            PowerPointToPdfSeeder::class,
            PdfToPowerPointSeeder::class,
            PdfToJpgSeeder::class,
            JpgToPdfSeeder::class,
            PdfCompressorSeeder::class,
            PdfMergerSeeder::class,
            PdfSplitterSeeder::class,
        ]);
    }
}
