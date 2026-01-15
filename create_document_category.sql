-- ============================================
-- Create Document Category and Update Tools
-- ============================================

-- Step 1: Create the Document category
INSERT INTO categories (name, slug, type, description, bg_gradient_from, bg_gradient_to, text_color, is_active, created_at, updated_at)
VALUES (
    'Document',
    'document',
    'tool',
    'Document conversion and manipulation tools',
    '#8B5CF6',
    '#EC4899',
    'text-purple-600',
    1,
    NOW(),
    NOW()
);

-- Get the new category ID (you'll need to note this after running the insert)
-- Or use this to find it:
SELECT id, name, slug FROM categories WHERE slug = 'document';

-- Step 2: Update all document tools to use the new category
-- Replace 'DOCUMENT_CATEGORY_ID' with the actual ID from the query above

-- Update PDF to Word
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'document'),
    route_name = 'document.pdf-to-word'
WHERE slug = 'pdf-to-word';

-- Update Word to PDF
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'document'),
    route_name = 'document.word-to-pdf'
WHERE slug = 'word-to-pdf';

-- Update PDF to Excel
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'document'),
    route_name = 'document.pdf-to-excel'
WHERE slug = 'pdf-to-excel';

-- Update Excel to PDF
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'document'),
    route_name = 'document.excel-to-pdf'
WHERE slug = 'excel-to-pdf';

-- Update PowerPoint to PDF
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'document'),
    route_name = 'document.ppt-to-pdf'
WHERE slug = 'ppt-to-pdf';

-- Update PDF to PowerPoint
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'document'),
    route_name = 'document.pdf-to-ppt'
WHERE slug = 'pdf-to-ppt';

-- Update PDF to JPG
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'document'),
    route_name = 'document.pdf-to-jpg'
WHERE slug = 'pdf-to-jpg';

-- Update JPG to PDF
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'document'),
    route_name = 'document.jpg-to-pdf'
WHERE slug = 'jpg-to-pdf';

-- Update PDF Compressor
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'document'),
    route_name = 'document.pdf-compressor'
WHERE slug = 'pdf-compressor';

-- Update PDF Merger
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'document'),
    route_name = 'document.pdf-merger'
WHERE slug = 'pdf-merger';

-- Update PDF Splitter
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'document'),
    route_name = 'document.pdf-splitter'
WHERE slug = 'pdf-splitter';

-- Step 3: Verify the updates
SELECT id, name, slug, route_name, category_id 
FROM tools 
WHERE category_id = (SELECT id FROM categories WHERE slug = 'document')
ORDER BY name;

-- Step 4: Check category tool count
SELECT c.name, c.slug, COUNT(t.id) as tool_count
FROM categories c
LEFT JOIN tools t ON c.id = t.category_id
WHERE c.slug = 'document'
GROUP BY c.id, c.name, c.slug;
