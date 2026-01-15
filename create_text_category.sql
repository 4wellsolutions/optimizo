-- ============================================
-- Create Text Category and Update Tools
-- ============================================

-- Step 1: Create the Text category
INSERT INTO categories (name, slug, type, description, bg_gradient_from, bg_gradient_to, text_color, is_active, created_at, updated_at)
VALUES (
    'Text',
    'text',
    'tool',
    'Text manipulation and processing tools',
    '#F59E0B',
    '#EF4444',
    'text-orange-600',
    1,
    NOW(),
    NOW()
);

-- Step 2: Update all text tools to use the new category and route names

-- Update Word Counter
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'text'),
    route_name = 'text.word-counter'
WHERE slug = 'word-counter';

-- Update Duplicate Line Remover
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'text'),
    route_name = 'text.duplicate-remover'
WHERE slug = 'duplicate-line-remover';

-- Update File Difference Checker
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'text'),
    route_name = 'text.file-difference-checker'
WHERE slug = 'file-difference-checker';

-- Update Text to Morse Code
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'text'),
    route_name = 'text.text-to-morse'
WHERE slug = 'text-to-morse-converter';

-- Update Text Reverser
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'text'),
    route_name = 'text.text-reverser'
WHERE slug = 'text-reverser';

-- Update Morse Code to Text
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'text'),
    route_name = 'text.morse-to-text'
WHERE slug = 'morse-to-text-converter';

-- Update Lorem Ipsum Generator
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'text'),
    route_name = 'text.lorem-ipsum'
WHERE slug = 'lorem-ipsum-generator';

-- Step 3: Verify the updates
SELECT id, name, slug, route_name, category_id 
FROM tools 
WHERE category_id = (SELECT id FROM categories WHERE slug = 'text')
ORDER BY name;
