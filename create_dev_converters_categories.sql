-- ============================================
-- Create Development & Converters Categories
-- ============================================

-- Create Development Category (if not exists)
INSERT INTO categories (name, slug, type, description, bg_gradient_from, bg_gradient_to, text_color, is_active, created_at, updated_at)
SELECT 'Development', 'development', 'tool', 'Development and coding tools', '#6366F1', '#8B5CF6', 'text-indigo-600', 1, NOW(), NOW()
WHERE NOT EXISTS (SELECT 1 FROM categories WHERE slug = 'development');

-- Create Converters Category (if not exists)
INSERT INTO categories (name, slug, type, description, bg_gradient_from, bg_gradient_to, text_color, is_active, created_at, updated_at)
SELECT 'Converters', 'converters', 'tool', 'Unit and format conversion tools', '#14B8A6', '#06B6D4', 'text-teal-600', 1, NOW(), NOW()
WHERE NOT EXISTS (SELECT 1 FROM categories WHERE slug = 'converters');

-- ============================================
-- Update Development Tools
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
-- Update Converter Tools
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

-- Verify
SELECT 'Development Tools:' as category;
SELECT name, slug, route_name FROM tools WHERE category_id = (SELECT id FROM categories WHERE slug = 'development') ORDER BY name;

SELECT 'Converter Tools:' as category;
SELECT name, slug, route_name FROM tools WHERE category_id = (SELECT id FROM categories WHERE slug = 'converters') ORDER BY name;
