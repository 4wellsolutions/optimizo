-- ============================================
-- MASTER SQL - Create All Categories and Update All Tools
-- Run this file to set up all categories at once
-- ============================================

-- ============================================
-- 1. CREATE ALL CATEGORIES (IF NOT EXISTS)
-- ============================================

-- Document Category
INSERT INTO categories (name, slug, type, description, bg_gradient_from, bg_gradient_to, text_color, is_active, created_at, updated_at)
SELECT 'Document', 'document', 'tool', 'Document conversion and manipulation tools', '#8B5CF6', '#EC4899', 'text-purple-600', 1, NOW(), NOW()
WHERE NOT EXISTS (SELECT 1 FROM categories WHERE slug = 'document');

-- Time Category
INSERT INTO categories (name, slug, type, description, bg_gradient_from, bg_gradient_to, text_color, is_active, created_at, updated_at)
SELECT 'Time', 'time', 'tool', 'Time conversion and timezone tools', '#10B981', '#3B82F6', 'text-green-600', 1, NOW(), NOW()
WHERE NOT EXISTS (SELECT 1 FROM categories WHERE slug = 'time');

-- Text Category
INSERT INTO categories (name, slug, type, description, bg_gradient_from, bg_gradient_to, text_color, is_active, created_at, updated_at)
SELECT 'Text', 'text', 'tool', 'Text manipulation and processing tools', '#F59E0B', '#EF4444', 'text-orange-600', 1, NOW(), NOW()
WHERE NOT EXISTS (SELECT 1 FROM categories WHERE slug = 'text');

-- Development Category
INSERT INTO categories (name, slug, type, description, bg_gradient_from, bg_gradient_to, text_color, is_active, created_at, updated_at)
SELECT 'Development', 'development', 'tool', 'Development and coding tools', '#6366F1', '#8B5CF6', 'text-indigo-600', 1, NOW(), NOW()
WHERE NOT EXISTS (SELECT 1 FROM categories WHERE slug = 'development');

-- Converters Category
INSERT INTO categories (name, slug, type, description, bg_gradient_from, bg_gradient_to, text_color, is_active, created_at, updated_at)
SELECT 'Converters', 'converters', 'tool', 'Unit and format conversion tools', '#14B8A6', '#06B6D4', 'text-teal-600', 1, NOW(), NOW()
WHERE NOT EXISTS (SELECT 1 FROM categories WHERE slug = 'converters');

-- Spreadsheet Category
INSERT INTO categories (name, slug, type, description, bg_gradient_from, bg_gradient_to, text_color, is_active, created_at, updated_at)
SELECT 'Spreadsheet', 'spreadsheet', 'tool', 'Spreadsheet and data conversion tools', '#059669', '#10B981', 'text-emerald-600', 1, NOW(), NOW()
WHERE NOT EXISTS (SELECT 1 FROM categories WHERE slug = 'spreadsheet');

-- ============================================
-- 2. UPDATE IMAGE TOOLS
-- ============================================
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'image'), route_name = 'image.image-converter' WHERE slug = 'image-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'image'), route_name = 'image.jpg-to-png-converter' WHERE slug = 'jpg-to-png-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'image'), route_name = 'image.png-to-jpg-converter' WHERE slug = 'png-to-jpg-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'image'), route_name = 'image.jpg-to-webp-converter' WHERE slug = 'jpg-to-webp-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'image'), route_name = 'image.webp-to-jpg-converter' WHERE slug = 'webp-to-jpg-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'image'), route_name = 'image.png-to-webp-converter' WHERE slug = 'png-to-webp-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'image'), route_name = 'image.image-to-base64-converter' WHERE slug = 'image-to-base64-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'image'), route_name = 'image.base64-to-image-converter' WHERE slug = 'base64-to-image-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'image'), route_name = 'image.svg-to-png-converter' WHERE slug = 'svg-to-png-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'image'), route_name = 'image.svg-to-jpg-converter' WHERE slug = 'svg-to-jpg-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'image'), route_name = 'image.heic-to-jpg-converter' WHERE slug = 'heic-to-jpg-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'image'), route_name = 'image.ico-converter' WHERE slug = 'ico-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'image'), route_name = 'image.image-compressor' WHERE slug = 'image-compressor';

-- ============================================
-- 3. UPDATE DOCUMENT TOOLS
-- ============================================
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'document'), route_name = 'document.pdf-to-word' WHERE slug = 'pdf-to-word';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'document'), route_name = 'document.word-to-pdf' WHERE slug = 'word-to-pdf';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'document'), route_name = 'document.pdf-to-excel' WHERE slug = 'pdf-to-excel';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'document'), route_name = 'document.excel-to-pdf' WHERE slug = 'excel-to-pdf';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'document'), route_name = 'document.ppt-to-pdf' WHERE slug = 'ppt-to-pdf';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'document'), route_name = 'document.pdf-to-ppt' WHERE slug = 'pdf-to-ppt';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'document'), route_name = 'document.pdf-to-jpg' WHERE slug = 'pdf-to-jpg';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'document'), route_name = 'document.jpg-to-pdf' WHERE slug = 'jpg-to-pdf';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'document'), route_name = 'document.pdf-compressor' WHERE slug = 'pdf-compressor';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'document'), route_name = 'document.pdf-merger' WHERE slug = 'pdf-merger';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'document'), route_name = 'document.pdf-splitter' WHERE slug = 'pdf-splitter';

-- ============================================
-- 4. UPDATE TIME TOOLS
-- ============================================
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'time'), route_name = 'time.time-zone-converter' WHERE slug = 'time-zone-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'time'), route_name = 'time.epoch-time-converter' WHERE slug = 'epoch-time-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'time'), route_name = 'time.unix-to-date' WHERE slug = 'unix-timestamp-to-date';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'time'), route_name = 'time.date-to-unix' WHERE slug = 'date-to-unix-timestamp';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'time'), route_name = 'time.utc-to-local' WHERE slug = 'utc-to-local-time';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'time'), route_name = 'time.local-to-utc' WHERE slug = 'local-time-to-utc';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'time'), route_name = 'time.time-converter' WHERE slug = 'time-unit-converter';

-- ============================================
-- 5. UPDATE TEXT TOOLS
-- ============================================
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'text'), route_name = 'text.word-counter' WHERE slug = 'word-counter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'text'), route_name = 'text.duplicate-remover' WHERE slug = 'duplicate-line-remover';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'text'), route_name = 'text.file-difference-checker' WHERE slug = 'file-difference-checker';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'text'), route_name = 'text.text-to-morse' WHERE slug = 'text-to-morse-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'text'), route_name = 'text.text-reverser' WHERE slug = 'text-reverser';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'text'), route_name = 'text.morse-to-text' WHERE slug = 'morse-to-text-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'text'), route_name = 'text.lorem-ipsum' WHERE slug = 'lorem-ipsum-generator';

-- ============================================
-- 6. UPDATE DEVELOPMENT TOOLS
-- ============================================
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.json-parser' WHERE slug = 'json-parser';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.xml-formatter' WHERE slug = 'xml-formatter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.html-minifier' WHERE slug = 'html-minifier';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.js-minifier' WHERE slug = 'js-minifier';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.css-minifier' WHERE slug = 'css-minifier';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.code-formatter' WHERE slug = 'code-formatter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.curl-builder' WHERE slug = 'curl-command-builder';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.cron-generator' WHERE slug = 'cron-job-generator';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.uuid-generator' WHERE slug = 'uuid-generator';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.md5-generator' WHERE slug = 'md5-generator';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.url-encoder' WHERE slug = 'url-encoder-decoder';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.unicode-encoder' WHERE slug = 'unicode-encoder-decoder';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.jwt-decode' WHERE slug = 'jwt-decoder';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.base64' WHERE slug = 'base64-encoder-decoder';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.html-encoder' WHERE slug = 'html-encoder-decoder';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.json-yaml' WHERE slug = 'json-to-yaml-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.json-xml' WHERE slug = 'json-to-xml-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.json-sql' WHERE slug = 'json-to-sql-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.markdown-to-html' WHERE slug = 'markdown-to-html-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.html-to-markdown' WHERE slug = 'html-to-markdown-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.html-viewer' WHERE slug = 'html-viewer';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'development'), route_name = 'development.json-formatter' WHERE slug = 'json-formatter';

-- ============================================
-- 7. UPDATE CONVERTER TOOLS
-- ============================================
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.frequency-converter' WHERE slug = 'frequency-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.molar-mass-converter' WHERE slug = 'molar-mass-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.density-converter' WHERE slug = 'density-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.torque-converter' WHERE slug = 'torque-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.cooking-converter' WHERE slug = 'cooking-unit-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.data-transfer-converter' WHERE slug = 'data-transfer-rate-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.fuel-converter' WHERE slug = 'fuel-consumption-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.angle-converter' WHERE slug = 'angle-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.force-converter' WHERE slug = 'force-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.power-converter' WHERE slug = 'power-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.pressure-converter' WHERE slug = 'pressure-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.energy-converter' WHERE slug = 'energy-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.storage-converter' WHERE slug = 'digital-storage-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.speed-converter' WHERE slug = 'speed-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.area-converter' WHERE slug = 'area-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.volume-converter' WHERE slug = 'volume-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.temperature-converter' WHERE slug = 'temperature-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.weight-converter' WHERE slug = 'weight-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.length-converter' WHERE slug = 'length-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.number-base' WHERE slug = 'number-base-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.decimal-octal' WHERE slug = 'decimal-octal-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.decimal-hex' WHERE slug = 'decimal-hex-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.decimal-binary' WHERE slug = 'decimal-binary-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.binary-hex' WHERE slug = 'binary-hex-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.ascii-convert' WHERE slug = 'ascii-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.rgb-hex-converter' WHERE slug = 'rgb-hex-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.studly-case' WHERE slug = 'studly-case-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.snake-case' WHERE slug = 'snake-case-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.sentence-case' WHERE slug = 'sentence-case-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.pascal-case' WHERE slug = 'pascal-case-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.kebab-case' WHERE slug = 'kebab-case-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.camel-case' WHERE slug = 'camel-case-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'converters'), route_name = 'converters.case-converter' WHERE slug = 'case-converter';

-- ============================================
-- 8. UPDATE SPREADSHEET TOOLS
-- ============================================
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.csv-to-sql' WHERE slug = 'csv-to-sql';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.google-sheets-to-excel' WHERE slug = 'google-sheets-to-excel';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.xlsx-to-xls' WHERE slug = 'xlsx-to-xls';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.xls-to-xlsx' WHERE slug = 'xls-to-xlsx';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.csv-to-excel' WHERE slug = 'csv-to-excel';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.excel-to-csv' WHERE slug = 'excel-to-csv';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.tsv-csv' WHERE slug = 'tsv-to-csv-converter';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.csv-xml' WHERE slug = 'csv-to-xml-converter';

-- ============================================
-- 9. UPDATE NETWORK TOOLS (Add User Agent Parser)
-- ============================================
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'network'), route_name = 'network.user-agent-parser' WHERE slug = 'user-agent-parser';

-- ============================================
-- VERIFICATION QUERIES
-- ============================================
SELECT 'Categories Created:' as info;
SELECT id, name, slug FROM categories WHERE slug IN ('document', 'time', 'text', 'development', 'converters', 'spreadsheet') ORDER BY name;

SELECT '' as info;
SELECT 'Tool Counts by Category:' as info;
SELECT c.name as category, COUNT(t.id) as tool_count
FROM categories c
LEFT JOIN tools t ON c.id = t.category_id
WHERE c.slug IN ('image', 'document', 'time', 'text', 'development', 'converters', 'spreadsheet')
GROUP BY c.id, c.name
ORDER BY c.name;
