-- Fix all route_name values in tools table to match actual routes in web.php

-- YouTube Tools
UPDATE tools SET route_name = 'youtube.monetization' WHERE slug = 'youtube-monetization-checker';
UPDATE tools SET route_name = 'youtube.thumbnail' WHERE slug = 'youtube-thumbnail-downloader';
UPDATE tools SET route_name = 'youtube.extractor' WHERE slug = 'youtube-video-data-extractor';
UPDATE tools SET route_name = 'youtube.tags' WHERE slug = 'youtube-tag-generator';
UPDATE tools SET route_name = 'youtube.channel' WHERE slug = 'youtube-channel-data-extractor';
UPDATE tools SET route_name = 'youtube.handle' WHERE slug = 'youtube-handle-checker';
UPDATE tools SET route_name = 'youtube.video-tags' WHERE slug = 'youtube-video-tags-extractor';
UPDATE tools SET route_name = 'youtube.channel-id' WHERE slug = 'youtube-channel-id-finder';
UPDATE tools SET route_name = 'youtube.earnings' WHERE slug = 'youtube-earnings-calculator';

-- SEO Tools  
UPDATE tools SET route_name = 'seo.meta-analyzer' WHERE slug = 'seo-meta-analyzer';
UPDATE tools SET route_name = 'seo.keyword-density' WHERE slug = 'seo-keyword-density';
UPDATE tools SET route_name = 'seo.word-counter' WHERE slug = 'seo-word-counter';

-- Utility Tools
UPDATE tools SET route_name = 'utility.image-compressor' WHERE slug = 'utility-image-compressor';
UPDATE tools SET route_name = 'utility.rgb-hex-converter' WHERE slug = 'utility-rgb-hex-converter';
UPDATE tools SET route_name = 'utility.slug-generator' WHERE slug = 'utility-slug-generator';
UPDATE tools SET route_name = 'utility.speed-test' WHERE slug = 'utility-internet-speed-test';
UPDATE tools SET route_name = 'utility.md5-generator' WHERE slug = 'utility-md5-generator';
UPDATE tools SET route_name = 'utility.case-converter' WHERE slug = 'utility-case-converter';
UPDATE tools SET route_name = 'utility.username-checker' WHERE slug = 'utility-username-checker';
UPDATE tools SET route_name = 'utility.password-generator' WHERE slug = 'utility-password-generator';
UPDATE tools SET route_name = 'utility.json-formatter' WHERE slug = 'utility-json-formatter';
UPDATE tools SET route_name = 'utility.base64' WHERE slug = 'utility-base64-encoder-decoder';
UPDATE tools SET route_name = 'utility.qr-generator' WHERE slug = 'utility-qr-generator';
UPDATE tools SET route_name = 'utility.html-viewer' WHERE slug = 'utility-html-viewer';
UPDATE tools SET route_name = 'utility.json-parser' WHERE slug = 'utility-json-parser';
UPDATE tools SET route_name = 'utility.code-formatter' WHERE slug = 'utility-code-formatter';
UPDATE tools SET route_name = 'utility.css-minifier' WHERE slug = 'utility-css-minifier';
UPDATE tools SET route_name = 'utility.js-minifier' WHERE slug = 'utility-js-minifier';
UPDATE tools SET route_name = 'utility.html-minifier' WHERE slug = 'utility-html-minifier';
UPDATE tools SET route_name = 'utility.url-encoder' WHERE slug = 'utility-url-encoder-decoder';

-- Network Tools
UPDATE tools SET route_name = 'network.what-is-my-ip' WHERE slug = 'network-what-is-my-ip';
UPDATE tools SET route_name = 'network.what-is-my-isp' WHERE slug = 'network-what-is-my-isp';
UPDATE tools SET route_name = 'network.domain-to-ip' WHERE slug = 'network-domain-to-ip';
UPDATE tools SET route_name = 'network.ip-lookup' WHERE slug = 'network-ip-lookup';
UPDATE tools SET route_name = 'network.dns-lookup' WHERE slug = 'network-dns-lookup';
UPDATE tools SET route_name = 'network.whois-lookup' WHERE slug = 'network-whois-lookup';
UPDATE tools SET route_name = 'network.ping-test' WHERE slug = 'network-ping-test';
UPDATE tools SET route_name = 'network.traceroute' WHERE slug = 'network-traceroute';
UPDATE tools SET route_name = 'network.port-checker' WHERE slug = 'network-port-checker';
UPDATE tools SET route_name = 'network.reverse-dns' WHERE slug = 'network-reverse-dns';
