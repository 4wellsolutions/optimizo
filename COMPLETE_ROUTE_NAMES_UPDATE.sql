-- ============================================
-- COMPLETE ROUTE NAMES UPDATE - All 134 Tools
-- This query updates ALL tool route_name fields to match web.php
-- ============================================

-- YouTube Tools (9 tools)
UPDATE tools SET route_name = 'youtube.youtube-monetization-checker' WHERE slug = 'youtube-monetization-checker';
UPDATE tools SET route_name = 'youtube.youtube-thumbnail-downloader' WHERE slug = 'youtube-thumbnail-downloader';
UPDATE tools SET route_name = 'youtube.youtube-video-data-extractor' WHERE slug = 'youtube-video-data-extractor';
UPDATE tools SET route_name = 'youtube.youtube-tag-generator' WHERE slug = 'youtube-tag-generator';
UPDATE tools SET route_name = 'youtube.youtube-channel-data-extractor' WHERE slug = 'youtube-channel-data-extractor';
UPDATE tools SET route_name = 'youtube.youtube-handle-checker' WHERE slug = 'youtube-handle-checker';
UPDATE tools SET route_name = 'youtube.youtube-video-tags-extractor' WHERE slug = 'youtube-video-tags-extractor';
UPDATE tools SET route_name = 'youtube.youtube-channel-id-finder' WHERE slug = 'youtube-channel-id-finder';
UPDATE tools SET route_name = 'youtube.youtube-earnings-calculator' WHERE slug = 'youtube-earnings-calculator';

-- SEO Tools (8 tools)
UPDATE tools SET route_name = 'seo.meta-tag-analyzer' WHERE slug = 'meta-tag-analyzer';
UPDATE tools SET route_name = 'seo.keyword-density-checker' WHERE slug = 'keyword-density-checker';
UPDATE tools SET route_name = 'seo.google-serp-checker' WHERE slug = 'google-serp-checker';
UPDATE tools SET route_name = 'seo.bing-serp-checker' WHERE slug = 'bing-serp-checker';
UPDATE tools SET route_name = 'seo.yahoo-serp-checker' WHERE slug = 'yahoo-serp-checker';
UPDATE tools SET route_name = 'seo.on-page-seo-checker' WHERE slug = 'on-page-seo-checker';
UPDATE tools SET route_name = 'seo.broken-links-checker' WHERE slug = 'broken-links-checker';
UPDATE tools SET route_name = 'seo.slug-generator' WHERE slug = 'slug-generator';

-- Utility Tools (4 tools)
UPDATE tools SET route_name = 'utility.password-generator' WHERE slug = 'password-generator';
UPDATE tools SET route_name = 'utility.qr-code-generator' WHERE slug = 'qr-code-generator';
UPDATE tools SET route_name = 'utility.random-number-generator' WHERE slug = 'random-number-generator';
UPDATE tools SET route_name = 'utility.username-checker' WHERE slug = 'username-checker';

-- Image Tools (13 tools)
UPDATE tools SET route_name = 'image.image-converter' WHERE slug = 'image-converter';
UPDATE tools SET route_name = 'image.jpg-to-png-converter' WHERE slug = 'jpg-to-png-converter';
UPDATE tools SET route_name = 'image.png-to-jpg-converter' WHERE slug = 'png-to-jpg-converter';
UPDATE tools SET route_name = 'image.jpg-to-webp-converter' WHERE slug = 'jpg-to-webp-converter';
UPDATE tools SET route_name = 'image.webp-to-jpg-converter' WHERE slug = 'webp-to-jpg-converter';
UPDATE tools SET route_name = 'image.png-to-webp-converter' WHERE slug = 'png-to-webp-converter';
UPDATE tools SET route_name = 'image.image-to-base64-converter' WHERE slug = 'image-to-base64-converter';
UPDATE tools SET route_name = 'image.base64-to-image-converter' WHERE slug = 'base64-to-image-converter';
UPDATE tools SET route_name = 'image.svg-to-png-converter' WHERE slug = 'svg-to-png-converter';
UPDATE tools SET route_name = 'image.svg-to-jpg-converter' WHERE slug = 'svg-to-jpg-converter';
UPDATE tools SET route_name = 'image.heic-to-jpg-converter' WHERE slug = 'heic-to-jpg-converter';
UPDATE tools SET route_name = 'image.ico-converter' WHERE slug = 'ico-converter';
UPDATE tools SET route_name = 'image.image-compressor' WHERE slug = 'image-compressor';

-- Document Tools (11 tools)
UPDATE tools SET route_name = 'document.pdf-to-word' WHERE slug = 'pdf-to-word';
UPDATE tools SET route_name = 'document.word-to-pdf' WHERE slug = 'word-to-pdf';
UPDATE tools SET route_name = 'document.pdf-to-excel' WHERE slug = 'pdf-to-excel';
UPDATE tools SET route_name = 'document.excel-to-pdf' WHERE slug = 'excel-to-pdf';
UPDATE tools SET route_name = 'document.ppt-to-pdf' WHERE slug = 'ppt-to-pdf';
UPDATE tools SET route_name = 'document.pdf-to-ppt' WHERE slug = 'pdf-to-ppt';
UPDATE tools SET route_name = 'document.pdf-to-jpg' WHERE slug = 'pdf-to-jpg';
UPDATE tools SET route_name = 'document.jpg-to-pdf' WHERE slug = 'jpg-to-pdf';
UPDATE tools SET route_name = 'document.pdf-compressor' WHERE slug = 'pdf-compressor';
UPDATE tools SET route_name = 'document.pdf-merger' WHERE slug = 'pdf-merger';
UPDATE tools SET route_name = 'document.pdf-splitter' WHERE slug = 'pdf-splitter';

-- Network Tools (12 tools)
UPDATE tools SET route_name = 'network.what-is-my-ip' WHERE slug = 'what-is-my-ip';
UPDATE tools SET route_name = 'network.what-is-my-isp' WHERE slug = 'what-is-my-isp';
UPDATE tools SET route_name = 'network.domain-to-ip' WHERE slug = 'domain-to-ip';
UPDATE tools SET route_name = 'network.ip-lookup' WHERE slug = 'ip-lookup';
UPDATE tools SET route_name = 'network.dns-lookup' WHERE slug = 'dns-lookup';
UPDATE tools SET route_name = 'network.whois-lookup' WHERE slug = 'whois-lookup';
UPDATE tools SET route_name = 'network.ping-test' WHERE slug = 'ping-test';
UPDATE tools SET route_name = 'network.traceroute' WHERE slug = 'traceroute';
UPDATE tools SET route_name = 'network.port-checker' WHERE slug = 'port-checker';
UPDATE tools SET route_name = 'network.reverse-dns-lookup' WHERE slug = 'reverse-dns-lookup';
UPDATE tools SET route_name = 'network.internet-speed-test' WHERE slug = 'internet-speed-test';
UPDATE tools SET route_name = 'network.user-agent-parser' WHERE slug = 'user-agent-parser';

-- Time Tools (7 tools)
UPDATE tools SET route_name = 'time.time-zone-converter' WHERE slug = 'time-zone-converter';
UPDATE tools SET route_name = 'time.epoch-time-converter' WHERE slug = 'epoch-time-converter';
UPDATE tools SET route_name = 'time.unix-timestamp-to-date' WHERE slug = 'unix-timestamp-to-date';
UPDATE tools SET route_name = 'time.date-to-unix-timestamp' WHERE slug = 'date-to-unix-timestamp';
UPDATE tools SET route_name = 'time.utc-to-local-time' WHERE slug = 'utc-to-local-time';
UPDATE tools SET route_name = 'time.local-time-to-utc' WHERE slug = 'local-time-to-utc';
UPDATE tools SET route_name = 'time.time-unit-converter' WHERE slug = 'time-unit-converter';

-- Text Tools (7 tools)
UPDATE tools SET route_name = 'text.word-counter' WHERE slug = 'word-counter';
UPDATE tools SET route_name = 'text.duplicate-line-remover' WHERE slug = 'duplicate-line-remover';
UPDATE tools SET route_name = 'text.diff-checker' WHERE slug = 'diff-checker';
UPDATE tools SET route_name = 'text.text-to-morse-converter' WHERE slug = 'text-to-morse-converter';
UPDATE tools SET route_name = 'text.text-reverser' WHERE slug = 'text-reverser';
UPDATE tools SET route_name = 'text.morse-to-text-converter' WHERE slug = 'morse-to-text-converter';
UPDATE tools SET route_name = 'text.lorem-ipsum-generator' WHERE slug = 'lorem-ipsum-generator';

-- Development Tools (22 tools)
UPDATE tools SET route_name = 'development.json-parser' WHERE slug = 'json-parser';
UPDATE tools SET route_name = 'development.json-formatter' WHERE slug = 'json-formatter';
UPDATE tools SET route_name = 'development.xml-formatter' WHERE slug = 'xml-formatter';
UPDATE tools SET route_name = 'development.html-minifier' WHERE slug = 'html-minifier';
UPDATE tools SET route_name = 'development.html-viewer' WHERE slug = 'html-viewer';
UPDATE tools SET route_name = 'development.html-encoder-decoder' WHERE slug = 'html-encoder-decoder';
UPDATE tools SET route_name = 'development.js-minifier' WHERE slug = 'js-minifier';
UPDATE tools SET route_name = 'development.css-minifier' WHERE slug = 'css-minifier';
UPDATE tools SET route_name = 'development.code-formatter' WHERE slug = 'code-formatter';
UPDATE tools SET route_name = 'development.curl-command-builder' WHERE slug = 'curl-command-builder';
UPDATE tools SET route_name = 'development.cron-job-generator' WHERE slug = 'cron-job-generator';
UPDATE tools SET route_name = 'development.uuid-generator' WHERE slug = 'uuid-generator';
UPDATE tools SET route_name = 'development.md5-generator' WHERE slug = 'md5-generator';
UPDATE tools SET route_name = 'development.url-encoder-decoder' WHERE slug = 'url-encoder-decoder';
UPDATE tools SET route_name = 'development.unicode-encoder-decoder' WHERE slug = 'unicode-encoder-decoder';
UPDATE tools SET route_name = 'development.jwt-decoder' WHERE slug = 'jwt-decoder';
UPDATE tools SET route_name = 'development.base64-encoder-decoder' WHERE slug = 'base64-encoder-decoder';
UPDATE tools SET route_name = 'development.json-to-yaml-converter' WHERE slug = 'json-to-yaml-converter';
UPDATE tools SET route_name = 'development.json-to-xml-converter' WHERE slug = 'json-to-xml-converter';
UPDATE tools SET route_name = 'development.json-to-sql-converter' WHERE slug = 'json-to-sql-converter';
UPDATE tools SET route_name = 'development.markdown-to-html-converter' WHERE slug = 'markdown-to-html-converter';
UPDATE tools SET route_name = 'development.html-to-markdown-converter' WHERE slug = 'html-to-markdown-converter';

-- Converters Tools (33 tools)
UPDATE tools SET route_name = 'converters.frequency-converter' WHERE slug = 'frequency-converter';
UPDATE tools SET route_name = 'converters.molar-mass-converter' WHERE slug = 'molar-mass-converter';
UPDATE tools SET route_name = 'converters.density-converter' WHERE slug = 'density-converter';
UPDATE tools SET route_name = 'converters.torque-converter' WHERE slug = 'torque-converter';
UPDATE tools SET route_name = 'converters.cooking-unit-converter' WHERE slug = 'cooking-unit-converter';
UPDATE tools SET route_name = 'converters.data-transfer-rate-converter' WHERE slug = 'data-transfer-rate-converter';
UPDATE tools SET route_name = 'converters.fuel-consumption-converter' WHERE slug = 'fuel-consumption-converter';
UPDATE tools SET route_name = 'converters.angle-converter' WHERE slug = 'angle-converter';
UPDATE tools SET route_name = 'converters.force-converter' WHERE slug = 'force-converter';
UPDATE tools SET route_name = 'converters.power-converter' WHERE slug = 'power-converter';
UPDATE tools SET route_name = 'converters.pressure-converter' WHERE slug = 'pressure-converter';
UPDATE tools SET route_name = 'converters.energy-converter' WHERE slug = 'energy-converter';
UPDATE tools SET route_name = 'converters.digital-storage-converter' WHERE slug = 'digital-storage-converter';
UPDATE tools SET route_name = 'converters.speed-converter' WHERE slug = 'speed-converter';
UPDATE tools SET route_name = 'converters.area-converter' WHERE slug = 'area-converter';
UPDATE tools SET route_name = 'converters.volume-converter' WHERE slug = 'volume-converter';
UPDATE tools SET route_name = 'converters.temperature-converter' WHERE slug = 'temperature-converter';
UPDATE tools SET route_name = 'converters.weight-converter' WHERE slug = 'weight-converter';
UPDATE tools SET route_name = 'converters.length-converter' WHERE slug = 'length-converter';
UPDATE tools SET route_name = 'converters.number-base-converter' WHERE slug = 'number-base-converter';
UPDATE tools SET route_name = 'converters.decimal-octal-converter' WHERE slug = 'decimal-octal-converter';
UPDATE tools SET route_name = 'converters.decimal-hex-converter' WHERE slug = 'decimal-hex-converter';
UPDATE tools SET route_name = 'converters.decimal-binary-converter' WHERE slug = 'decimal-binary-converter';
UPDATE tools SET route_name = 'converters.binary-hex-converter' WHERE slug = 'binary-hex-converter';
UPDATE tools SET route_name = 'converters.ascii-converter' WHERE slug = 'ascii-converter';
UPDATE tools SET route_name = 'converters.rgb-hex-converter' WHERE slug = 'rgb-hex-converter';
UPDATE tools SET route_name = 'converters.studly-case-converter' WHERE slug = 'studly-case-converter';
UPDATE tools SET route_name = 'converters.snake-case-converter' WHERE slug = 'snake-case-converter';
UPDATE tools SET route_name = 'converters.sentence-case-converter' WHERE slug = 'sentence-case-converter';
UPDATE tools SET route_name = 'converters.pascal-case-converter' WHERE slug = 'pascal-case-converter';
UPDATE tools SET route_name = 'converters.kebab-case-converter' WHERE slug = 'kebab-case-converter';
UPDATE tools SET route_name = 'converters.camel-case-converter' WHERE slug = 'camel-case-converter';
UPDATE tools SET route_name = 'converters.case-converter' WHERE slug = 'case-converter';

-- Spreadsheet Tools (8 tools)
UPDATE tools SET route_name = 'spreadsheet.csv-to-sql' WHERE slug = 'csv-to-sql';
UPDATE tools SET route_name = 'spreadsheet.google-sheets-to-excel' WHERE slug = 'google-sheets-to-excel';
UPDATE tools SET route_name = 'spreadsheet.xlsx-to-xls' WHERE slug = 'xlsx-to-xls';
UPDATE tools SET route_name = 'spreadsheet.xls-to-xlsx' WHERE slug = 'xls-to-xlsx';
UPDATE tools SET route_name = 'spreadsheet.csv-to-excel' WHERE slug = 'csv-to-excel';
UPDATE tools SET route_name = 'spreadsheet.excel-to-csv' WHERE slug = 'excel-to-csv';
UPDATE tools SET route_name = 'spreadsheet.tsv-to-csv-converter' WHERE slug = 'tsv-to-csv-converter';
UPDATE tools SET route_name = 'spreadsheet.csv-to-xml-converter' WHERE slug = 'csv-to-xml-converter';

-- Verification Query
SELECT 
    SUBSTRING_INDEX(route_name, '.', 1) as category,
    COUNT(*) as tool_count
FROM tools
GROUP BY SUBSTRING_INDEX(route_name, '.', 1)
ORDER BY category;
