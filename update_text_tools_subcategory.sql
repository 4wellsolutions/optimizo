-- Update subcategory_id to 41 for all 13 text tools
UPDATE tools 
SET subcategory_id = 41
WHERE slug IN (
    'markdown-to-html-converter',
    'html-to-markdown-converter',
    'sentence-case-converter',
    'camel-case-converter',
    'pascal-case-converter',
    'snake-case-converter',
    'kebab-case-converter',
    'studly-case-converter',
    'text-reverser',
    'text-to-morse-converter',
    'morse-to-text-converter',
    'url-slug-generator',
    'case-converter',
    'duplicate-line-remover'
);

-- Verify the update
SELECT slug, name, category_id, subcategory_id 
FROM tools 
WHERE slug IN (
    'markdown-to-html-converter',
    'html-to-markdown-converter',
    'sentence-case-converter',
    'camel-case-converter',
    'pascal-case-converter',
    'snake-case-converter',
    'kebab-case-converter',
    'studly-case-converter',
    'text-reverser',
    'text-to-morse-converter',
    'morse-to-text-converter',
    'url-slug-generator',
    'case-converter',
    'duplicate-line-remover'
)
ORDER BY slug;

-- Count affected rows
SELECT COUNT(*) as updated_tools 
FROM tools 
WHERE subcategory_id = 41 
AND slug IN (
    'markdown-to-html-converter',
    'html-to-markdown-converter',
    'sentence-case-converter',
    'camel-case-converter',
    'pascal-case-converter',
    'snake-case-converter',
    'kebab-case-converter',
    'studly-case-converter',
    'text-reverser',
    'text-to-morse-converter',
    'morse-to-text-converter',
    'url-slug-generator',
    'case-converter',
    'duplicate-line-remover'
);
