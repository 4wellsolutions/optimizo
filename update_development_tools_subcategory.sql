-- Update subcategory_id to 42 (or appropriate ID) for all 13 development tools
-- Replace 42 with the actual subcategory_id for "Development Tools" in your database

UPDATE tools 
SET subcategory_id = 42
WHERE slug IN (
    'rgb-hex-converter',
    'json-formatter',
    'base64-encoder-decoder',
    'html-viewer',
    'json-parser',
    'code-formatter',
    'css-minifier',
    'js-minifier',
    'html-minifier',
    'xml-formatter',
    'file-difference-checker',
    'cron-job-generator',
    'curl-command-builder'
);

-- Verify the update
SELECT slug, name, category_id, subcategory_id 
FROM tools 
WHERE slug IN (
    'rgb-hex-converter',
    'json-formatter',
    'base64-encoder-decoder',
    'html-viewer',
    'json-parser',
    'code-formatter',
    'css-minifier',
    'js-minifier',
    'html-minifier',
    'xml-formatter',
    'file-difference-checker',
    'cron-job-generator',
    'curl-command-builder'
)
ORDER BY slug;

-- Count affected rows
SELECT COUNT(*) as updated_tools 
FROM tools 
WHERE subcategory_id = 42 
AND slug IN (
    'rgb-hex-converter',
    'json-formatter',
    'base64-encoder-decoder',
    'html-viewer',
    'json-parser',
    'code-formatter',
    'css-minifier',
    'js-minifier',
    'html-minifier',
    'xml-formatter',
    'file-difference-checker',
    'cron-job-generator',
    'curl-command-builder'
);
