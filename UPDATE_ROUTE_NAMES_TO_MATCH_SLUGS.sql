-- ============================================
-- CORRECTED: Route names now match slugs exactly
-- Format: category.slug (e.g., youtube.youtube-channel-data-extractor)
-- ============================================

-- Update Image Tools - Route names match slugs
UPDATE tools SET route_name = CONCAT('image.', slug) WHERE slug IN (
    'image-converter', 'jpg-to-png-converter', 'png-to-jpg-converter',
    'jpg-to-webp-converter', 'webp-to-jpg-converter', 'png-to-webp-converter',
    'image-to-base64-converter', 'base64-to-image-converter', 'svg-to-png-converter',
    'svg-to-jpg-converter', 'heic-to-jpg-converter', 'ico-converter', 'image-compressor'
);

-- Update Document Tools - Route names match slugs
UPDATE tools SET route_name = CONCAT('document.', slug) WHERE slug IN (
    'pdf-to-word', 'word-to-pdf', 'pdf-to-excel', 'excel-to-pdf',
    'ppt-to-pdf', 'pdf-to-ppt', 'pdf-to-jpg', 'jpg-to-pdf',
    'pdf-compressor', 'pdf-merger', 'pdf-splitter'
);

-- Update Time Tools - Route names match slugs
UPDATE tools SET route_name = CONCAT('time.', slug) WHERE slug IN (
    'time-zone-converter', 'epoch-time-converter', 'unix-timestamp-to-date',
    'date-to-unix-timestamp', 'utc-to-local-time', 'local-time-to-utc', 'time-unit-converter'
);

-- Update Text Tools - Route names match slugs
UPDATE tools SET route_name = CONCAT('text.', slug) WHERE slug IN (
    'word-counter', 'duplicate-line-remover', 'file-difference-checker',
    'text-to-morse-converter', 'text-reverser', 'morse-to-text-converter', 'lorem-ipsum-generator'
);

-- Update Development Tools - Route names match slugs
UPDATE tools SET route_name = CONCAT('development.', slug) WHERE slug IN (
    'json-parser', 'xml-formatter', 'html-minifier', 'js-minifier', 'css-minifier',
    'code-formatter', 'curl-command-builder', 'cron-job-generator', 'uuid-generator',
    'md5-generator', 'url-encoder-decoder', 'unicode-encoder-decoder', 'jwt-decoder',
    'base64-encoder-decoder', 'html-encoder-decoder', 'json-to-yaml-converter',
    'json-to-xml-converter', 'json-to-sql-converter', 'markdown-to-html-converter',
    'html-to-markdown-converter', 'html-viewer', 'json-formatter'
);

-- Update Converter Tools - Route names match slugs
UPDATE tools SET route_name = CONCAT('converters.', slug) WHERE slug IN (
    'frequency-converter', 'molar-mass-converter', 'density-converter', 'torque-converter',
    'cooking-unit-converter', 'data-transfer-rate-converter', 'fuel-consumption-converter',
    'angle-converter', 'force-converter', 'power-converter', 'pressure-converter',
    'energy-converter', 'digital-storage-converter', 'speed-converter', 'area-converter',
    'volume-converter', 'temperature-converter', 'weight-converter', 'length-converter',
    'number-base-converter', 'decimal-octal-converter', 'decimal-hex-converter',
    'decimal-binary-converter', 'binary-hex-converter', 'ascii-converter',
    'rgb-hex-converter', 'studly-case-converter', 'snake-case-converter',
    'sentence-case-converter', 'pascal-case-converter', 'kebab-case-converter',
    'camel-case-converter', 'case-converter'
);

-- Update Spreadsheet Tools - Route names match slugs
UPDATE tools SET route_name = CONCAT('spreadsheet.', slug) WHERE slug IN (
    'csv-to-sql', 'google-sheets-to-excel', 'xlsx-to-xls', 'xls-to-xlsx',
    'csv-to-excel', 'excel-to-csv', 'tsv-to-csv-converter', 'csv-to-xml-converter'
);

-- Update Network Tools - Route names match slugs (including User Agent Parser)
UPDATE tools SET route_name = CONCAT('network.', slug) WHERE slug = 'user-agent-parser';

-- Verification
SELECT slug, route_name FROM tools WHERE slug IN (
    'youtube-channel-data-extractor', 'unix-timestamp-to-date', 'json-parser'
) ORDER BY slug;
