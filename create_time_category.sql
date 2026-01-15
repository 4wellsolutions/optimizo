-- ============================================
-- Create Time Category and Update Tools
-- ============================================

-- Step 1: Create the Time category
INSERT INTO categories (name, slug, type, description, bg_gradient_from, bg_gradient_to, text_color, is_active, created_at, updated_at)
VALUES (
    'Time',
    'time',
    'tool',
    'Time conversion and timezone tools',
    '#10B981',
    '#3B82F6',
    'text-green-600',
    1,
    NOW(),
    NOW()
);

-- Step 2: Update all time tools to use the new category and route names

-- Update Time Zone Converter
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'time'),
    route_name = 'time.time-zone-converter'
WHERE slug = 'time-zone-converter';

-- Update Epoch Time Converter
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'time'),
    route_name = 'time.epoch-time-converter'
WHERE slug = 'epoch-time-converter';

-- Update Unix Timestamp to Date
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'time'),
    route_name = 'time.unix-to-date'
WHERE slug = 'unix-timestamp-to-date';

-- Update Date to Unix Timestamp
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'time'),
    route_name = 'time.date-to-unix'
WHERE slug = 'date-to-unix-timestamp';

-- Update UTC to Local Time
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'time'),
    route_name = 'time.utc-to-local'
WHERE slug = 'utc-to-local-time';

-- Update Local Time to UTC
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'time'),
    route_name = 'time.local-to-utc'
WHERE slug = 'local-time-to-utc';

-- Update Time Unit Converter
UPDATE tools 
SET category_id = (SELECT id FROM categories WHERE slug = 'time'),
    route_name = 'time.time-converter'
WHERE slug = 'time-unit-converter';

-- Step 3: Verify the updates
SELECT id, name, slug, route_name, category_id 
FROM tools 
WHERE category_id = (SELECT id FROM categories WHERE slug = 'time')
ORDER BY name;
