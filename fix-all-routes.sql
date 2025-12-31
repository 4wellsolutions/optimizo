-- Fix all network tool route names
UPDATE tools SET route_name = CONCAT('network.', route_name) WHERE category = 'network' AND route_name NOT LIKE 'network.%';
UPDATE tools SET route_name = CONCAT('seo.', route_name) WHERE category = 'seo' AND route_name NOT LIKE 'seo.%';
UPDATE tools SET route_name = CONCAT('youtube.', route_name) WHERE category = 'youtube' AND route_name NOT LIKE 'youtube.%';

-- Replace all dots with hyphens in route names
UPDATE tools SET route_name = REPLACE(route_name, '.', '-');

-- Restore category prefixes
UPDATE tools SET route_name = REPLACE(route_name, 'network-', 'network.') WHERE category = 'network';
UPDATE tools SET route_name = REPLACE(route_name, 'seo-', 'seo.') WHERE category = 'seo';
UPDATE tools SET route_name = REPLACE(route_name, 'youtube-', 'youtube.') WHERE category = 'youtube';
UPDATE tools SET route_name = REPLACE(route_name, 'utility-', 'utility.') WHERE category = 'utility';
