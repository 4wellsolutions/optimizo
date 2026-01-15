-- ============================================
-- Create Spreadsheet Category and Update Tools
-- ============================================

-- Create Spreadsheet Category (if not exists)
INSERT INTO categories (name, slug, type, description, bg_gradient_from, bg_gradient_to, text_color, is_active, created_at, updated_at)
SELECT 'Spreadsheet', 'spreadsheet', 'tool', 'Spreadsheet and data conversion tools', '#059669', '#10B981', 'text-emerald-600', 1, NOW(), NOW()
WHERE NOT EXISTS (SELECT 1 FROM categories WHERE slug = 'spreadsheet');

-- Update Spreadsheet Tools
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.csv-to-sql' WHERE slug = 'csv-to-sql';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.google-sheets-to-excel' WHERE slug = 'google-sheets-to-excel';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.xlsx-to-xls' WHERE slug = 'xlsx-to-xls';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.xls-to-xlsx' WHERE slug = 'xls-to-xlsx';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.csv-to-excel' WHERE slug = 'csv-to-excel';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.excel-to-csv' WHERE slug = 'excel-to-csv';
UPDATE tools SET category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet'), route_name = 'spreadsheet.tsv-csv' WHERE slug = 'tsv-to-csv-converter';

-- Verify
SELECT name, slug, route_name FROM tools WHERE category_id = (SELECT id FROM categories WHERE slug = 'spreadsheet') ORDER BY name;
