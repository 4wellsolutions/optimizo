-- Update all image category tools to use image.* route prefix instead of utility.*

-- First, let's see what we're updating
SELECT id, name, slug, route_name, category_id 
FROM tools 
WHERE category_id = (SELECT id FROM categories WHERE slug = 'image');

-- Update image-converter
UPDATE tools 
SET route_name = 'image.image-converter' 
WHERE slug = 'image-converter' AND category_id = (SELECT id FROM categories WHERE slug = 'image');

-- Update jpg-to-png-converter
UPDATE tools 
SET route_name = 'image.jpg-to-png-converter' 
WHERE slug = 'jpg-to-png-converter' AND category_id = (SELECT id FROM categories WHERE slug = 'image');

-- Update png-to-jpg-converter
UPDATE tools 
SET route_name = 'image.png-to-jpg-converter' 
WHERE slug = 'png-to-jpg-converter' AND category_id = (SELECT id FROM categories WHERE slug = 'image');

-- Update jpg-to-webp-converter
UPDATE tools 
SET route_name = 'image.jpg-to-webp-converter' 
WHERE slug = 'jpg-to-webp-converter' AND category_id = (SELECT id FROM categories WHERE slug = 'image');

-- Update webp-to-jpg-converter
UPDATE tools 
SET route_name = 'image.webp-to-jpg-converter' 
WHERE slug = 'webp-to-jpg-converter' AND category_id = (SELECT id FROM categories WHERE slug = 'image');

-- Update png-to-webp-converter
UPDATE tools 
SET route_name = 'image.png-to-webp-converter' 
WHERE slug = 'png-to-webp-converter' AND category_id = (SELECT id FROM categories WHERE slug = 'image');

-- Update image-to-base64-converter
UPDATE tools 
SET route_name = 'image.image-to-base64-converter' 
WHERE slug = 'image-to-base64-converter' AND category_id = (SELECT id FROM categories WHERE slug = 'image');

-- Update base64-to-image-converter
UPDATE tools 
SET route_name = 'image.base64-to-image-converter' 
WHERE slug = 'base64-to-image-converter' AND category_id = (SELECT id FROM categories WHERE slug = 'image');

-- Update svg-to-png-converter
UPDATE tools 
SET route_name = 'image.svg-to-png-converter' 
WHERE slug = 'svg-to-png-converter' AND category_id = (SELECT id FROM categories WHERE slug = 'image');

-- Update svg-to-jpg-converter
UPDATE tools 
SET route_name = 'image.svg-to-jpg-converter' 
WHERE slug = 'svg-to-jpg-converter' AND category_id = (SELECT id FROM categories WHERE slug = 'image');

-- Update heic-to-jpg-converter
UPDATE tools 
SET route_name = 'image.heic-to-jpg-converter' 
WHERE slug = 'heic-to-jpg-converter' AND category_id = (SELECT id FROM categories WHERE slug = 'image');

-- Update ico-converter
UPDATE tools 
SET route_name = 'image.ico-converter' 
WHERE slug = 'ico-converter' AND category_id = (SELECT id FROM categories WHERE slug = 'image');

-- Update image-compressor
UPDATE tools 
SET route_name = 'image.image-compressor' 
WHERE slug = 'image-compressor' AND category_id = (SELECT id FROM categories WHERE slug = 'image');

-- Verify the updates
SELECT id, name, slug, route_name, category_id 
FROM tools 
WHERE category_id = (SELECT id FROM categories WHERE slug = 'image');
