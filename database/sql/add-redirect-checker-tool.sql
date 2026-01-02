-- SQL to insert the Redirect & HTTP Status Checker tool into the database
-- Run this in your MySQL/MariaDB database

INSERT INTO tools (name, slug, category, description, meta_title, meta_description, is_active, created_at, updated_at)
VALUES (
    'Redirect & HTTP Status Checker',
    'redirect-checker',
    'network',
    'Check HTTP status codes, analyze redirect chains, detect 301/302 redirects, find broken redirects and redirect loops',
    'Redirect Checker & HTTP Status Code Tool - Free Online',
    'Free redirect checker tool to analyze HTTP status codes, trace redirect chains, detect 301/302 redirects, find broken redirects and redirect loops. Essential for SEO and website debugging.',
    1,
    NOW(),
    NOW()
);
