<?php

return array (
  'rgb-hex-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'RGB to HEX Color Converter',
      'subtitle' => 'Convert colors between RGB and HEX formats instantly with our free online color converter tool.',
      'title' => 'RGB to HEX Color ÐšÐ¾Ð½Ð²ÐµÑ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒer',
      'description' => 'ÐšÐ¾Ð½Ð²ÐµÑ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ colors between RGB and HEX formats ÐœÐ³Ð½Ð¾Ð²ÐµÐ½Ð½Ñ‹Ð¹ly with live preview.',
    ),
    'editor' => 
    array (
      'rgb_to_hex' => 'RGB to HEX',
      'label_red' => 'Red (0-255)',
      'label_green' => 'Green (0-255)',
      'label_blue' => 'Blue (0-255)',
      'label_hex' => 'HEX Color',
      'hex_to_rgb' => 'HEX to RGB',
      'label_hex_input' => 'HEX Color',
      'label_rgb_output' => 'RGB Color',
      'ph_hex' => '#FF0000',
    ),
    'js' => 
    array (
      'invalid_hex' => 'Invalid HEX',
    ),
    'content' => 
    array (
      'p1' => 'Convert colors between RGB and HEX formats instantly with our free online color converter tool. Perfect for web designers, developers, graphic artists, and anyone working with digital colors. Get accurate conversions with live color preview, supporting both RGB to HEX and HEX to RGB conversions. Essential for CSS styling, design systems, and cross-platform color consistency.',
      'formats_title' => 'Understanding Color Formats',
      'formats' => 
      array (
        'rgb' => 
        array (
          'title' => 'ðŸŽ¨ RGB (Red, Green, Blue)',
          'format' => 'Format',
          'format_val' => 'rgb(255, 0, 0)',
          'range' => 'Range',
          'range_val' => '0-255 for each channel',
          'used_in' => 'Used in',
          'used_in_val' => 'Image editing, programming, digital displays',
        ),
        'hex' => 
        array (
          'title' => '#ï¸âƒ£ HEX (Hexadecimal)',
          'format' => 'Format',
          'format_val' => '#FF0000',
          'range' => 'Range',
          'range_val' => '00-FF for each channel',
          'used_in' => 'Used in',
          'used_in_val' => 'Web development, CSS, HTML, design tools',
        ),
      ),
      'why_title' => 'Why Convert Between RGB and HEX?',
      'why_list' => 
      array (
        'web' => 
        array (
          'title' => 'Web Development',
          'desc' => 'CSS supports both formats - convert for compatibility',
        ),
        'tools' => 
        array (
          'title' => 'Design Tools',
          'desc' => 'Different software uses different formats (Photoshop vs Figma)',
        ),
        'matching' => 
        array (
          'title' => 'Color Matching',
          'desc' => 'Ensure consistent colors across platforms and tools',
        ),
        'docs' => 
        array (
          'title' => 'Documentation',
          'desc' => 'Communicate colors clearly in style guides',
        ),
        'programming' => 
        array (
          'title' => 'Programming',
          'desc' => 'Convert between formats for different libraries and frameworks',
        ),
        'brand' => 
        array (
          'title' => 'Brand Guidelines',
          'desc' => 'Maintain brand color consistency across mediums',
        ),
      ),
      'how_work_title' => 'How Color Conversion Works',
      'how_work_t1' => 'RGB to HEX',
      'how_work_p1' => 'Each RGB value (0-255) is converted to hexadecimal (00-FF). For example, RGB(255, 0, 0) becomes #FF0000. The conversion formula: HEX = (R Ã— 65536) + (G Ã— 256) + B, then converted to base-16.',
      'how_work_t2' => 'HEX to RGB',
      'how_work_p2' => 'Each pair of hexadecimal digits is converted to decimal (0-255). For example, #FF0000 becomes RGB(255, 0, 0). The first two digits are Red, middle two are Green, last two are Blue.',
      'uses_title' => 'Common Use Cases',
      'uses' => 
      array (
        'web' => 
        array (
          'title' => 'Web Development',
          'desc' => 'Convert design mockup colors (RGB) to CSS-ready HEX codes for websites',
        ),
        'graphic' => 
        array (
          'title' => 'Graphic Design',
          'desc' => 'Match colors between Adobe Photoshop (RGB) and web design tools (HEX)',
        ),
        'brand' => 
        array (
          'title' => 'Brand Guidelines',
          'desc' => 'Document brand colors in both formats for print (RGB) and web (HEX)',
        ),
      ),
      'practices_title' => 'Color Format Best Practices',
      'practices_list' => 
      array (
        0 => 'Use HEX for CSS and HTML - it\'s more compact and widely supported',
        1 => 'Use RGB when you need alpha transparency (RGBA format)',
        2 => 'Always include the # symbol with HEX codes in CSS',
        3 => 'Document both formats in design systems for flexibility',
        4 => 'Use uppercase for HEX codes for consistency (#FF0000 not #ff0000)',
        5 => 'Test colors on different displays for accurate representation',
      ),
      'pro_tip_title' => 'ðŸ’¡ Pro Tip',
      'pro_tip_desc' => 'HEX shorthand: Colors like #FF0000 can be shortened to #F00 when each pair of digits is identical. Our tool automatically handles both 3-digit and 6-digit HEX codes for maximum compatibility.',
      'faq_title' => 'Frequently Asked Questions',
      'faq' => 
      array (
        'q1' => 'What\'s the difference between RGB and HEX?',
        'a1' => 'RGB uses decimal numbers (0-255) for each color channel, while HEX uses hexadecimal (00-FF). They represent the same colors, just in different number systems. HEX is more compact and commonly used in web development.',
        'q2' => 'Can I use RGB in CSS?',
        'a2' => 'Yes! CSS supports both rgb(255, 0, 0) and #FF0000. RGB is useful when you need transparency with rgba(255, 0, 0, 0.5). HEX is more compact for opaque colors.',
        'q3' => 'What does the # symbol mean in HEX codes?',
        'a3' => 'The # symbol indicates that the following characters are a hexadecimal color code. It\'s required in CSS and HTML to distinguish color codes from other values.',
        'q4' => 'Are 3-digit and 6-digit HEX codes the same?',
        'a4' => '3-digit HEX codes (#F00) are shorthand for 6-digit codes where each digit is doubled (#FF0000). They work identically but 3-digit codes only work when each pair of digits is the same.',
      ),
    ),
  ),
  'json-formatter' => 
  array (
    'meta' => 
    array (
      'title' => 'JSON Formatter',
      'description' => 'Format, validate, and minify your JSON data with our free online tool',
      'h1' => 'JSON Formatter',
      'subtitle' => 'Format, validate, and minify your JSON data',
    ),
    'editor' => 
    array (
      'title' => 'Format Your JSON Data',
      'label_input' => 'Enter JSON Data',
      'ph_input' => '{"name": "John Doe", "age": 30, "city": "New York"}',
      'help_text' => 'Paste your JSON data to format, beautify, or minify it',
      'btn_format' => 'Format & Beautify',
      'btn_minify' => 'Minify JSON',
      'label_results' => 'Formatted JSON',
      'btn_copy' => 'Copy JSON',
    ),
    'js' => 
    array (
      'error_empty_format' => 'Please enter JSON data to format',
      'error_empty_minify' => 'Please enter JSON data to minify',
      'error_invalid' => 'Invalid JSON: ',
      'success_copy' => 'Copied!',
      'error_copy' => 'Failed to copy. Please copy manually.',
    ),
    'content' => 
    array (
      'why_title' => 'Why Use Our JSON Formatter?',
      'why_desc' => 'JSON (JavaScript Object Notation) is the most popular data interchange format used in web development, APIs, and configuration files. Our free online JSON formatter helps developers, data analysts, and IT professionals quickly format, beautify, validate, and minify JSON data. Whether you\'re debugging API responses, cleaning up configuration files, or preparing JSON for production, our tool provides instant results with syntax highlighting and error detection. Perfect for developers working with REST APIs, NoSQL databases, and modern web applications.',
      'features' => 
      array (
        'instant' => 
        array (
          'title' => 'Instant Formatting',
          'desc' => 'Format and beautify JSON data in milliseconds with proper indentation and syntax highlighting',
        ),
        'error' => 
        array (
          'title' => 'Error Detection',
          'desc' => 'Automatically detect and highlight JSON syntax errors with helpful error messages',
        ),
        'privacy' => 
        array (
          'title' => '100% Private',
          'desc' => 'All processing happens in your browser - your JSON data never leaves your computer',
        ),
      ),
      'how_title' => 'How to Format JSON in 3 Easy Steps',
      'how_steps' => 
      array (
        1 => 
        array (
          'title' => 'Paste JSON Data',
          'desc' => 'Copy and paste your JSON data into the text area above',
        ),
        2 => 
        array (
          'title' => 'Choose Action',
          'desc' => 'Click "Format & Beautify" to format or "Minify" to compress your JSON',
        ),
        3 => 
        array (
          'title' => 'Copy Result',
          'desc' => 'Click the copy button to copy the formatted JSON to your clipboard',
        ),
      ),
      'uses_title' => 'Common JSON Formatting Use Cases',
      'uses' => 
      array (
        'api' => 
        array (
          'title' => 'API Response Debugging',
          'desc' => 'Format messy API responses to easily read and debug JSON data from REST APIs, GraphQL, and web services.',
        ),
        'config' => 
        array (
          'title' => 'Configuration Files',
          'desc' => 'Clean up and validate JSON configuration files for applications, package.json, tsconfig.json, and more.',
        ),
        'db' => 
        array (
          'title' => 'Database Data',
          'desc' => 'Format JSON data from NoSQL databases like MongoDB, CouchDB, and Firebase for better readability.',
        ),
        'export' => 
        array (
          'title' => 'Data Export/Import',
          'desc' => 'Prepare JSON data for export or validate imported JSON data to ensure proper structure and syntax.',
        ),
      ),
      'tips_title' => 'JSON Best Practices & Tips',
      'tips' => 
      array (
        'validate' => 
        array (
          'title' => 'âœ“ Always Validate JSON',
          'desc' => 'Use a JSON validator to catch syntax errors before deploying to production. Invalid JSON can break your application.',
        ),
        'indent' => 
        array (
          'title' => 'âœ“ Use Proper Indentation',
          'desc' => 'Format JSON with 2 or 4 space indentation for better readability during development and debugging.',
        ),
        'minify' => 
        array (
          'title' => 'âœ“ Minify for Production',
          'desc' => 'Minify JSON data before deploying to production to reduce file size and improve load times.',
        ),
        'naming' => 
        array (
          'title' => 'âœ“ Use Consistent Naming',
          'desc' => 'Follow camelCase or snake_case naming conventions consistently throughout your JSON structure.',
        ),
      ),
      'faq_title' => 'â“ Frequently Asked Questions',
      'faq' => 
      array (
        'q1' => 'Is my JSON data safe?',
        'a1' => 'Yes, absolutely. Our JSON formatter runs entirely in your web browser using JavaScript. Your data is never sent to our servers or stored anywhere.',
        'q2' => 'Why is Minifying JSON important?',
        'a2' => 'Minifying removes unnecessary whitespace and line breaks, significantly reducing the file size. This is crucial for improving API performance and reducing bandwidth usage in production environments.',
        'q3' => 'Can I validate incomplete JSON?',
        'a3' => 'The tool requires valid JSON structure to format or minify. However, it provides detailed error messages to help you locate and fix issues in your JSON data.',
        'q4' => 'Does it support large JSON files?',
        'a4' => 'Yes, the tool is optimized to handle large JSON datasets efficiently, though extremely large files might depend on your browser\'s memory limits.',
      ),
    ),
  ),
  'base64-encoder-decoder' => 
  array (
    'meta' => 
    array (
      'title' => 'Base64 ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒr & Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒr',
      'description' => 'ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ and Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Base64 data ÐœÐ³Ð½Ð¾Ð²ÐµÐ½Ð½Ñ‹Ð¹ly with our Ð‘ÐµÑÐ¿Ð»Ð°Ñ‚Ð½Ð¾ online tool',
      'h1' => 'Base64 ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒr & Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒr',
      'subtitle' => 'ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ and Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Base64 data ÐœÐ³Ð½Ð¾Ð²ÐµÐ½Ð½Ñ‹Ð¹ly',
    ),
    'editor' => 
    array (
      'tab_encode' => 'ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ to Base64',
      'tab_decode' => 'Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ from Base64',
      'label_encode' => 'Enter Text to ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ',
      'desc_encode' => 'Enter any text to ÐšÐ¾Ð½Ð²ÐµÑ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ it to Base64 format',
      'ph_encode' => 'Enter your text here...',
      'btn_encode' => 'ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ to Base64',
      'label_decode' => 'Enter Base64 to Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ',
      'desc_decode' => 'Enter Base64 ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒd text to Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ it back to plain text',
      'ph_decode' => 'Enter Base64 ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒd string...',
      'btn_decode' => 'Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ from Base64',
      'result_title' => 'Result',
      'btn_copy' => 'Copy Result',
    ),
    'js' => 
    array (
      'error_empty_encode' => 'Please enter text to ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ',
      'error_encoding' => 'Error encoding text: ',
      'error_empty_decode' => 'Please enter Base64 string to Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ',
      'error_invalid' => 'Invalid Base64 string. Please check your input.',
      'copied' => 'Copied!',
    ),
    'content' => 
    array (
      'what_title' => 'What is Base64 Encoding?',
      'what_desc' => 'Base64 is a Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹-to-text encoding scheme that represents Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹ data in an ASCII string format. It\'s commonly used to ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ data that needs to be stored or transferred over media designed to handle text. Our Ð‘ÐµÑÐ¿Ð»Ð°Ñ‚Ð½Ð¾ Base64 ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒr and Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒr tool allows developers, data analysts, and IT professionals to Ð‘Ñ‹ÑÑ‚Ñ€Ñ‹Ð¹ly ÐšÐ¾Ð½Ð²ÐµÑ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ text to Base64 or Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Base64 strings back to readable text. Perfect for API development, data transmission, email attachments, embedding images in HTML/CSS, and handling Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹ data in JSON.',
      'features' => 
      array (
        'secure' => 
        array (
          'title' => 'Ð‘ÐµÐ·Ð¾Ð¿Ð°ÑÐ½Ñ‹Ð¹ Encoding',
          'desc' => 'All processing happens in your browser - your data never leaves your computer',
        ),
        'instant' => 
        array (
          'title' => 'ÐœÐ³Ð½Ð¾Ð²ÐµÐ½Ð½Ñ‹Ð¹ Conversion',
          'desc' => 'ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ or Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Base64 data in milliseconds with client-side processing',
        ),
        'easy' => 
        array (
          'title' => 'Ð›ÐµÐ³ÐºÐ¾ to Use',
          'desc' => 'ÐŸÑ€Ð¾ÑÑ‚Ð¾Ð¹ tabbed interface for encoding and decoding with one-click copy',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Use Base64 ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒr/Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒr',
        'encode' => 
        array (
          'title' => 'Encoding Text',
          'step1' => 'Click the "ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ to Base64" tab',
          'step2' => 'Paste or type your text in the input area',
          'step3' => 'Click "ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ to Base64" button',
          'step4' => 'Copy the Base64 ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒd result',
        ),
        'decode' => 
        array (
          'title' => 'Decoding Base64',
          'step1' => 'Click the "Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ from Base64" tab',
          'step2' => 'Paste your Base64 string in the input area',
          'step3' => 'Click "Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ from Base64" button',
          'step4' => 'Copy the Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒd plain text result',
        ),
      ),
      'uses' => 
      array (
        'title' => 'Common Base64 Use Cases',
        'api' => 
        array (
          'title' => 'API Authentication',
          'desc' => 'ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ credentials for Basic Authentication in HTTP headers and API requests.',
        ),
        'data_uri' => 
        array (
          'title' => 'Data URIs',
          'desc' => 'Embed images, fonts, and files directly in HTML, CSS, or JSON using Base64 data URIs.',
        ),
        'email' => 
        array (
          'title' => 'Email Attachments',
          'desc' => 'ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹ attachments in MIME email messages for safe transmission.',
        ),
        'storage' => 
        array (
          'title' => 'Data Storage',
          'desc' => 'Store Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹ data in text-based formats like JSON, XML, or databases.',
        ),
      ),
      'bottom' => 
      array (
        'h1' => 'Base64 ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒr & Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒr',
        'subtitle' => 'ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ and Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Base64 data ÐœÐ³Ð½Ð¾Ð²ÐµÐ½Ð½Ñ‹Ð¹ly',
        'desc' => 'Base64 is a Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹-to-text encoding scheme that ÐšÐ¾Ð½Ð²ÐµÑ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒs Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹ data into ASCII text format. Our Ð‘ÐµÑÐ¿Ð»Ð°Ñ‚Ð½Ð¾ Base64 ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒr & Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒr helps developers, system administrators, and IT professionals ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ text to Base64 or Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Base64 back to readable text ÐœÐ³Ð½Ð¾Ð²ÐµÐ½Ð½Ñ‹Ð¹ly. Perfect for API authentication, data URIs, email attachments, and Ð‘ÐµÐ·Ð¾Ð¿Ð°ÑÐ½Ñ‹Ð¹ data transmission. All processing happens in your browser for complete ÐšÐ¾Ð½Ñ„Ð¸Ð´ÐµÐ½Ñ†Ð¸Ð°Ð»ÑŒÐ½Ð¾ÑÑ‚ÑŒ.',
        'works_title' => 'ðŸ”„ How Base64 Works',
        'works_encoding' => 'ÐšÐ¾Ð½Ð²ÐµÑ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒs Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹ data to ASCII text using 64 characters',
        'works_encoding_sub' => 'A-Z, a-z, 0-9, +, / (and = for padding)',
        'works_decoding' => 'ÐšÐ¾Ð½Ð²ÐµÑ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒs Base64 text back to original Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹ data',
        'works_decoding_sub' => 'Reverses the encoding process perfectly',
        'cases_title' => 'âœ… Common Use Cases',
        'case_api' => 'API Authentication',
        'case_api_desc' => 'ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ credentials for Basic Auth in HTTP headers',
        'case_uri' => 'Data URIs',
        'case_uri_desc' => 'Embed images and files directly in HTML/CSS',
        'case_email' => 'Email Attachments',
        'case_email_desc' => 'ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹ files for email transmission',
        'case_url' => 'URL Parameters',
        'case_url_desc' => 'Safely pass Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹ data in URLs',
        'case_storage' => 'Data Storage',
        'case_storage_desc' => 'Store Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹ data in text-only databases',
        'case_web' => 'Web Development',
        'case_web_desc' => 'ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ JSON, XML, and configuration files',
        'best_practices_title' => 'ðŸ’¡ Base64 Best Practices',
        'best_practices_list' => 
        array (
          0 => 'Base64 increases data size by approximately 33%',
          1 => 'Not suitable for encryption - use proper encryption algorithms',
          2 => 'Perfect for encoding Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹ data in text-only systems',
          3 => 'Always validate Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒd data before using it',
          4 => 'Use URL-safe Base64 for URLs (replaces +/= with -_)',
        ),
      ),
      'faq' => 
      array (
        'title' => 'â“ Frequently Asked Questions',
        'q1' => 'Is Base64 encoding Ð‘ÐµÐ·Ð¾Ð¿Ð°ÑÐ½Ñ‹Ð¹?',
        'a1' => 'No! Base64 is NOT encryption - it\'s simply encoding. Anyone can Ð”ÐµÐºÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Base64 data ÐœÐ³Ð½Ð¾Ð²ÐµÐ½Ð½Ñ‹Ð¹ly. Never use Base64 alone for security. For encryption, use proper cryptographic algorithms like AES, RSA, or TLS/SSL.',
        'q2' => 'Why does Base64 increase file size?',
        'a2' => 'Base64 encoding increases data size by approximately 33% because it represents 3 bytes of Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹ data using 4 ASCII characters. This overhead is the trade-off for making Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹ data safe for text-only systems.',
        'q3' => 'What is Base64 used for?',
        'a3' => 'Base64 is used for encoding Ð”Ð²Ð¾Ð¸Ñ‡Ð½Ñ‹Ð¹ data (images, files, credentials) into ASCII text for transmission over text-only systems like email, URLs, JSON, XML, and HTTP headers. It\'s essential for API authentication, data URIs, and email attachments.',
        'q4' => 'Is my data sent to a server?',
        'a4' => 'No! All Base64 encoding and decoding happens entirely in your browser using JavaScript. Your data never leaves your device and is not stored, transmitted, or logged anywhere. Your ÐšÐ¾Ð½Ñ„Ð¸Ð´ÐµÐ½Ñ†Ð¸Ð°Ð»ÑŒÐ½Ð¾ÑÑ‚ÑŒ is completely protected.',
        'q5' => 'Can I ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ images to Base64?',
        'a5' => 'Yes! While our tool ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒs text, you can ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ images using specialized tools. Base64-ÐšÐ¾Ð´Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒd images can be embedded directly in HTML/CSS using data URIs (data:image/png;base64,...). This is useful for small images but increases page size.',
      ),
    ),
  ),
  'html-viewer' => 
  array (
    'meta' => 
    array (
      'title' => 'HTML Viewer',
      'description' => 'Preview HTML code in real-time with our free online HTML viewer',
      'h1' => 'HTML Viewer',
      'subtitle' => 'Preview HTML code in real-time',
    ),
    'editor' => 
    array (
      'label_input' => 'HTML Code',
      'ph_input' => 'Enter your HTML code here...',
      'label_preview' => 'Live Preview',
      'btn_clear' => 'Clear',
      'btn_load_sample' => 'Load Sample',
      'btn_fullscreen' => 'Fullscreen',
      'btn_exit_fullscreen' => 'Exit Fullscreen',
    ),
    'content' => 
    array (
      'about_title' => 'What is an HTML Viewer?',
      'about_desc' => 'An HTML Viewer is a powerful online tool that allows you to preview and visualize HTML code in real-time. Whether you\'re a web developer testing code snippets, a student learning HTML, or a designer reviewing markup, our HTML viewer provides instant visual feedback for your HTML code. Simply paste your HTML code into the editor, and see the rendered output immediately in the live preview pane.',
      'why_title' => 'Why Use Our HTML Viewer?',
      'why_desc' => 'Our free HTML viewer offers several advantages for developers and designers. First, it provides instant visual feedback without needing to create files or set up a development environment. Second, it\'s completely browser-based, meaning you can use it anywhere without installing software. Third, it\'s perfect for quick testing, debugging, and learning HTML. The side-by-side view lets you see your code and its output simultaneously, making it easier to understand how HTML elements render.',
      'features_title' => 'Key Features',
      'features_list' => 
      array (
        'preview' => '<strong>Real-Time Preview:</strong> See your HTML rendered instantly as you type',
        'layout' => '<strong>Side-by-Side View:</strong> Code editor and preview pane displayed together',
        'syntax' => '<strong>Syntax Highlighting:</strong> Easy-to-read code with color-coded syntax',
        'sample' => '<strong>Sample Code:</strong> Load example HTML to get started quickly',
        'no_install' => '<strong>No Installation Required:</strong> Works directly in your browser',
        'free' => '<strong>Free to Use:</strong> No registration or payment required',
        'secure' => '<strong>Secure:</strong> All processing happens in your browser',
      ),
      'how_title' => 'How to Use the HTML Viewer',
      'how_steps' => 
      array (
        1 => 'Paste or type your HTML code in the left editor pane',
        2 => 'The preview will update automatically in the right pane',
        3 => 'Use the "Load Sample" button to see example HTML code',
        4 => 'Click "Clear" to start fresh with a blank editor',
        5 => 'Test different HTML elements and see how they render',
      ),
      'uses_title' => 'Common Use Cases',
      'uses_desc' => 'HTML viewers are essential tools for various web development tasks. Developers use them to quickly test HTML snippets before integrating them into larger projects. Students learning HTML can experiment with different tags and attributes to understand their effects. Email marketers use HTML viewers to preview email templates before sending. Content creators can visualize how their HTML content will appear on websites. Designers can review markup structure and ensure proper rendering of HTML elements.',
      'basics_title' => 'Understanding HTML Basics',
      'basics_desc' => 'HTML (HyperText Markup Language) is the standard markup language for creating web pages. It consists of elements represented by tags, which tell browsers how to display content. Common HTML elements include headings (&lt;h1&gt; to &lt;h6&gt;), paragraphs (&lt;p&gt;), links (&lt;a&gt;), images (&lt;img&gt;), and divisions (&lt;div&gt;). Understanding these basic elements is crucial for web development, and our HTML viewer helps you visualize how they work together to create web pages.',
      'tips_title' => 'Best Practices for HTML',
      'tips_desc' => 'When writing HTML, follow best practices to ensure clean, maintainable code. Always use semantic HTML elements that describe their content (like &lt;header&gt;, &lt;nav&gt;, &lt;article&gt;). Properly nest elements and close all tags. Use lowercase for tag names and attribute names. Add alt attributes to images for accessibility. Validate your HTML to catch errors early. Keep your code organized with proper indentation. These practices lead to better SEO, accessibility, and maintainability.',
      'faq_title' => 'Frequently Asked Questions',
      'faq' => 
      array (
        'q1' => 'Is this HTML viewer free to use?',
        'a1' => 'Yes, our HTML viewer is completely free to use. There are no hidden fees, registration requirements, or usage limits.',
        'q2' => 'Does the HTML viewer support CSS and JavaScript?',
        'a2' => 'The HTML viewer primarily focuses on HTML markup. While inline CSS styles will render, external CSS and JavaScript are sandboxed for security.',
        'q3' => 'Is my HTML code stored or saved?',
        'a3' => 'No, all HTML processing happens entirely in your browser. Your code is never sent to our servers or stored anywhere.',
        'q4' => 'Can I use this tool for learning HTML?',
        'a4' => 'Absolutely! Our HTML viewer is perfect for learning HTML. You can experiment with different tags, attributes, and structures to see how they render.',
        'q5' => 'What\'s the difference between an HTML viewer and a code editor?',
        'a5' => 'An HTML viewer focuses on previewing and visualizing HTML code in real-time, while a code editor provides advanced features (syntax highlighting, debugging) and is better for full-scale development.',
      ),
    ),
  ),
  'json-parser' => 
  array (
    'meta' => 
    array (
      'h1' => 'JSON Parser & Validator',
      'subtitle' => 'Parse, validate, and visualize JSON structure',
      'title' => 'JSON Parser & Validator',
      'description' => 'Parse, validate, and visualize JSON structure',
    ),
    'editor' => 
    array (
      'label_input' => 'JSON Input',
      'ph_input' => '{"name": "John Doe", "age": 30, "isActive": true}',
      'btn_parse' => 'Parse JSON',
      'btn_beautify' => 'Beautify',
      'btn_minify' => 'Minify',
      'btn_clear' => 'Clear',
      'btn_load' => 'Load Sample',
      'title_tree' => 'JSON Tree View',
    ),
    'js' => 
    array (
      'error_empty_parse' => 'Please enter JSON data to parse',
      'error_empty_beautify' => 'Please enter JSON data to beautify',
      'error_empty_minify' => 'Please enter JSON data to minify',
      'success_valid' => 'âœ“ Valid JSON! Parsed successfully',
      'error_invalid' => 'âœ— Invalid JSON: ',
      'success_beautify' => 'âœ“ JSON beautified successfully',
      'error_beautify' => 'âœ— Cannot beautify invalid JSON: ',
      'success_minify' => 'âœ“ JSON minified successfully',
      'error_minify' => 'âœ— Cannot minify invalid JSON: ',
      'success_load' => 'Sample JSON loaded',
    ),
    'content' => 
    array (
      'hero_title' => 'Free JSON Parser & Validator',
      'hero_subtitle' => 'Parse, validate, beautify, and minify JSON data instantly',
      'p1' => 'Our free JSON Parser is a powerful online tool for developers, data analysts, and anyone working with JSON data. Instantly parse, validate, beautify, and minify JSON with a clean, intuitive interface. Perfect for debugging APIs, formatting configuration files, or validating JSON structure. 100% free, client-side processing ensures your data stays private and secure.',
      'what_title' => 'ðŸ“‹ What is JSON?',
      'what_desc' => 'JSON (JavaScript Object Notation) is a lightweight data-interchange format that\'s easy for humans to read and write, and easy for machines to parse and generate. It\'s the most popular format for APIs, configuration files, and data storage. JSON uses key-value pairs and supports strings, numbers, booleans, arrays, and nested objects.',
      'features_title' => 'âœ¨ Features',
      'features' => 
      array (
        'validate' => 
        array (
          'title' => 'JSON Validation',
          'desc' => 'Instantly validate JSON syntax and structure',
        ),
        'beautify' => 
        array (
          'title' => 'Beautify JSON',
          'desc' => 'Format JSON with proper indentation and spacing',
        ),
        'minify' => 
        array (
          'title' => 'Minify JSON',
          'desc' => 'Compress JSON by removing whitespace',
        ),
        'tree' => 
        array (
          'title' => 'Tree View',
          'desc' => 'Visualize JSON structure in tree format',
        ),
        'privacy' => 
        array (
          'title' => 'Privacy First',
          'desc' => 'All processing happens in your browser',
        ),
        'instant' => 
        array (
          'title' => 'Instant Results',
          'desc' => 'Parse and format JSON in milliseconds',
        ),
      ),
      'uses_title' => 'ðŸŽ¯ Common Use Cases',
      'uses' => 
      array (
        'api' => 
        array (
          'title' => 'ðŸ”Œ API Development',
          'desc' => 'Test and debug API responses, validate request payloads, and format JSON data',
        ),
        'config' => 
        array (
          'title' => 'âš™ï¸ Configuration Files',
          'desc' => 'Format and validate config files for applications, databases, and services',
        ),
        'analysis' => 
        array (
          'title' => 'ðŸ“Š Data Analysis',
          'desc' => 'Parse and visualize JSON data from databases, logs, and analytics tools',
        ),
        'debug' => 
        array (
          'title' => 'ðŸ› Debugging',
          'desc' => 'Identify syntax errors, validate structure, and troubleshoot JSON issues',
        ),
        'docs' => 
        array (
          'title' => 'ðŸ“ Documentation',
          'desc' => 'Create readable JSON examples for API docs and technical guides',
        ),
        'migration' => 
        array (
          'title' => 'ðŸ”„ Data Migration',
          'desc' => 'Transform and validate JSON during data imports and exports',
        ),
      ),
      'how_title' => 'ðŸ“š How to Use',
      'how_steps' => 
      array (
        1 => '<strong>Paste JSON:</strong> Copy and paste your JSON data into the input field',
        2 => '<strong>Parse:</strong> Click "Parse JSON" to validate and visualize the structure',
        3 => '<strong>Beautify:</strong> Click "Beautify" to format with proper indentation',
        4 => '<strong>Minify:</strong> Click "Minify" to compress and remove whitespace',
        5 => '<strong>View Tree:</strong> See the hierarchical structure in tree view format',
      ),
      'tips_title' => 'ðŸ’¡ JSON Best Practices',
      'tips_list' => 
      array (
        1 => '<strong>Use double quotes:</strong> JSON requires double quotes for strings, not single quotes',
        2 => '<strong>No trailing commas:</strong> Remove commas after the last item in objects and arrays',
        3 => '<strong>Proper data types:</strong> Use numbers without quotes, booleans as true/false, null for empty values',
        4 => '<strong>Validate regularly:</strong> Always validate JSON before deployment or production use',
        5 => '<strong>Beautify for readability:</strong> Format JSON for easier debugging and maintenance',
      ),
      'faq_title' => 'â“ Frequently Asked Questions',
      'faq' => 
      array (
        'q1' => 'What\'s the difference between beautify and minify?',
        'a1' => 'Beautify adds indentation and line breaks to make JSON human-readable. Minify removes all whitespace to reduce file size, making it ideal for production environments.',
        'q2' => 'Is my JSON data secure?',
        'a2' => 'Yes! All JSON parsing and formatting happens entirely in your browser. Your data never leaves your device and is not sent to any server.',
        'q3' => 'Can I parse large JSON files?',
        'a3' => 'Yes, our parser can handle large JSON files. However, very large files (>10MB) may take longer to process depending on your device\'s performance.',
        'q4' => 'What errors does the parser detect?',
        'a4' => 'The parser detects syntax errors like missing quotes, trailing commas, invalid characters, unclosed brackets, and incorrect data types. Error messages show the exact location of the issue.',
        'q5' => 'Can I use this for API testing?',
        'a5' => 'Absolutely! This tool is perfect for testing API responses, validating request payloads, and formatting JSON data from API calls.',
      ),
    ),
  ),
  'code-formatter' => 
  array (
    'meta' => 
    array (
      'title' => 'Free Online Code Formatter',
      'description' => 'Beautify and format your code instantly - supports HTML, CSS, JavaScript, JSON, XML, SQL, PHP',
      'h1' => 'Code Formatter',
      'subtitle' => 'Beautify and format your code instantly',
    ),
    'editor' => 
    array (
      'label_input' => 'Input Code',
      'ph_input' => '// Paste your code here...',
      'label_language' => 'Language',
      'languages' => 
      array (
        'html' => 'HTML',
        'css' => 'CSS',
        'js' => 'JavaScript',
        'json' => 'JSON',
        'xml' => 'XML',
        'sql' => 'SQL',
        'php' => 'PHP',
      ),
      'label_indent' => 'Indentation',
      'indents' => 
      array (
        2 => '2 Spaces',
        4 => '4 Spaces',
        'tab' => 'Tab',
      ),
      'btn_format' => 'Format Code',
      'btn_clear' => 'Clear',
      'btn_copy' => 'Copy',
      'label_output' => 'Formatted Code',
      'ph_output' => '// Formatted code will appear here...',
    ),
    'js' => 
    array (
      'error_empty' => 'Please paste some code to format',
      'success_format' => 'âœ“ Code formatted successfully!',
      'error_format' => 'Error formatting code: ',
      'no_copy' => 'No code to copy',
      'success_copy' => 'âœ“ Copied to clipboard!',
    ),
    'content' => 
    array (
      'hero_title' => 'Free Online Code Formatter',
      'hero_subtitle' => 'Beautify and format your code instantly with our advanced code formatter. Supports HTML, CSS, JavaScript, JSON, XML, SQL, and PHP.',
      'p1' => 'Clean up messy code and improve readability with our free online code formatter. Whether you have minified code that needs beautifying or just want to standardize indentation, our tool handles it all instantly in your browser.',
      'features_title' => 'âœ¨ Key Features',
      'features' => 
      array (
        'multi' => 
        array (
          'title' => 'Multi-Language Support',
          'desc' => 'Supports major programming languages including HTML, CSS, JS, JSON, and more',
        ),
        'indent' => 
        array (
          'title' => 'Custom Indentation',
          'desc' => 'Choose between 2 spaces, 4 spaces, or tabs for your preferred style',
        ),
        'instant' => 
        array (
          'title' => 'Instant Beautify',
          'desc' => 'Format code instantly without page reloads',
        ),
        'privacy' => 
        array (
          'title' => 'Privacy Focused',
          'desc' => 'Code processing happens in your browser - no data is stored',
        ),
      ),
      'langs_title' => 'ðŸ’» Supported Languages',
      'langs' => 
      array (
        'web' => 
        array (
          'title' => 'Web Technologies',
          'desc' => 'HTML5, CSS3, JavaScript (ES6+)',
        ),
        'data' => 
        array (
          'title' => 'Data Formats',
          'desc' => 'JSON, XML',
        ),
        'backend' => 
        array (
          'title' => 'Backend',
          'desc' => 'PHP, SQL',
        ),
      ),
      'why_title' => 'ðŸ¤” Why Format Code?',
      'why' => 
      array (
        'read' => 
        array (
          'title' => 'Readability',
          'desc' => 'Properly indented code is easier to read, understand, and maintain.',
        ),
        'debug' => 
        array (
          'title' => 'Debugging',
          'desc' => 'Find errors faster in well-structured code compared to minified strings.',
        ),
        'collab' => 
        array (
          'title' => 'Collaboration',
          'desc' => 'Standard code style helps teams work together more efficiently.',
        ),
      ),
      'faq_title' => 'â“ Frequently Asked Questions',
      'faq' => 
      array (
        'q1' => 'Is my code safe?',
        'a1' => 'Yes! All code formatting is done using JavaScript directly in your browser. Your code is never sent to our servers.',
        'q2' => 'Can I format minified code?',
        'a2' => 'Absolutely! Our beautifier is perfect for un-minifying code to make it readable again.',
        'q3' => 'Does it fix syntax errors?',
        'a3' => 'The formatter focuses on layout and indentation. While it can handle some basic structure issues, it does not fix syntax errors.',
        'q4' => 'Is there a limit on code size?',
        'a4' => 'Since processing is done on your device, the limit depends on your browser\'s memory. It can easily handle files with thousands of lines.',
      ),
    ),
  ),
  'css-minifier' => 
  array (
    'meta' => 
    array (
      'title' => 'Free CSS Minifier & Beautifier',
      'description' => 'Optimize CSS files for faster page loads - minify and beautify CSS instantly',
      'h1' => 'CSS Minifier & Beautifier',
      'subtitle' => 'Optimize CSS files for faster page loads',
    ),
    'editor' => 
    array (
      'label_input' => 'CSS Input',
      'ph_input' => 'Paste your CSS code here...',
      'btn_minify' => 'Minify CSS',
      'btn_beautify' => 'Beautify CSS',
      'btn_clear' => 'Clear',
      'btn_copy' => 'Copy',
      'label_output' => 'CSS Output',
      'ph_output' => 'Processed CSS will appear here...',
      'stats' => 
      array (
        'original' => 'Original Size',
        'minified' => 'Minified Size',
        'saved' => 'Saved',
        'compression' => 'Compression',
      ),
    ),
    'js' => 
    array (
      'error_empty' => 'Please enter CSS code to process',
      'success_minify' => 'âœ“ CSS minified successfully',
      'success_beautify' => 'âœ“ CSS beautified successfully',
      'error_process' => 'âœ— Error processing CSS: ',
      'no_copy' => 'No CSS to copy',
      'success_copy' => 'âœ“ CSS copied to clipboard',
    ),
    'content' => 
    array (
      'hero_title' => 'Free CSS Minifier & Beautifier',
      'hero_subtitle' => 'Optimize CSS files for faster page loads and better performance',
      'p1' => 'Our free CSS Minifier compresses CSS files by removing whitespace, comments, and unnecessary characters, significantly reducing file size and improving website load times. Perfect for web developers, designers, and anyone optimizing website performance. Also includes a CSS beautifier to format and organize your stylesheets for better readability. 100% free, client-side processing ensures your code stays private.',
      'what_title' => 'ðŸŽ¨ What is CSS Minification?',
      'what_desc' => 'CSS minification is the process of removing unnecessary characters from CSS code without changing its functionality. This includes whitespace, line breaks, comments, and redundant code. Minified CSS files are smaller, load faster, and improve website performance. It\'s an essential optimization technique for production websites.',
      'features_title' => 'âœ¨ Features',
      'features' => 
      array (
        'minify' => 
        array (
          'title' => 'CSS Minification',
          'desc' => 'Compress CSS by removing whitespace and comments',
        ),
        'beautify' => 
        array (
          'title' => 'CSS Beautification',
          'desc' => 'Format CSS with proper indentation and spacing',
        ),
        'stats' => 
        array (
          'title' => 'Compression Stats',
          'desc' => 'See file size reduction and compression rate',
        ),
        'instant' => 
        array (
          'title' => 'Instant Processing',
          'desc' => 'Minify or beautify CSS in milliseconds',
        ),
        'privacy' => 
        array (
          'title' => 'Privacy First',
          'desc' => 'All processing happens in your browser',
        ),
        'copy' => 
        array (
          'title' => 'One-Click Copy',
          'desc' => 'Copy minified CSS to clipboard instantly',
        ),
      ),
      'benefits_title' => 'ðŸŽ¯ Benefits of CSS Minification',
      'benefits' => 
      array (
        'speed' => 
        array (
          'title' => 'âš¡ Faster Page Loads',
          'desc' => 'Smaller CSS files download faster, improving page load times and user experience',
        ),
        'bandwidth' => 
        array (
          'title' => 'ðŸ’° Reduced Bandwidth',
          'desc' => 'Lower bandwidth usage saves hosting costs and mobile data for users',
        ),
        'seo' => 
        array (
          'title' => 'ðŸ“ˆ Better SEO',
          'desc' => 'Faster sites rank better in search engines, improving visibility',
        ),
        'performance' => 
        array (
          'title' => 'ðŸŽ¯ Improved Performance',
          'desc' => 'Optimized CSS reduces browser parsing time and rendering delays',
        ),
        'mobile' => 
        array (
          'title' => 'ðŸ“± Mobile Optimization',
          'desc' => 'Crucial for mobile users with limited bandwidth and slower connections',
        ),
        'production' => 
        array (
          'title' => 'ðŸ”§ Production Ready',
          'desc' => 'Minified CSS is standard practice for production deployments',
        ),
      ),
      'how_title' => 'ðŸ“š How to Use',
      'how_steps' => 
      array (
        1 => '<strong>Paste CSS:</strong> Copy and paste your CSS code into the input field',
        2 => '<strong>Choose Action:</strong> Click "Minify CSS" to compress or "Beautify CSS" to format',
        3 => '<strong>View Results:</strong> See the processed CSS in the output field with compression stats',
        4 => '<strong>Copy:</strong> Click "Copy" to copy the minified CSS to your clipboard',
        5 => '<strong>Use in Production:</strong> Replace your original CSS file with the minified version',
      ),
      'best_practices_title' => 'ðŸ’¡ Best Practices',
      'best_practices_list' => 
      array (
        1 => '<strong>Keep source files:</strong> Always maintain readable, unminified versions for development',
        2 => '<strong>Minify for production:</strong> Only use minified CSS in production environments',
        3 => '<strong>Combine files:</strong> Merge multiple CSS files before minifying for better compression',
        4 => '<strong>Test thoroughly:</strong> Always test minified CSS to ensure no functionality is broken',
        5 => '<strong>Use build tools:</strong> Integrate minification into your build process for automation',
      ),
      'faq_title' => 'â“ Frequently Asked Questions',
      'faq' => 
      array (
        'q1' => 'How much can CSS minification reduce file size?',
        'a1' => 'Typically 20-40% reduction, depending on your CSS structure. Files with lots of comments and whitespace see bigger savings. Combined with gzip compression, you can achieve 70-80% total reduction.',
        'q2' => 'Will minification break my CSS?',
        'a2' => 'No! Minification only removes unnecessary characters while preserving functionality. However, always test your minified CSS to ensure everything works as expected.',
        'q3' => 'Should I minify CSS for development?',
        'a3' => 'No. Keep CSS readable during development for easier debugging. Only minify for production deployments. Use beautified CSS during development and testing.',
        'q4' => 'Can I reverse minification?',
        'a4' => 'Yes! Use our "Beautify CSS" feature to format minified CSS back into a readable format. However, comments are permanently removed during minification.',
        'q5' => 'Is my CSS data secure?',
        'a5' => 'Absolutely! All processing happens entirely in your browser. Your CSS code never leaves your device and is not sent to any server.',
      ),
    ),
  ),
  'js-minifier' => 
  array (
    'meta' => 
    array (
      'title' => 'JavaScript Minifier',
      'description' => 'Compress and optimize your JavaScript code for faster page loads',
      'h1' => 'JavaScript Minifier',
      'subtitle' => 'Compress and optimize your JavaScript code',
    ),
    'editor' => 
    array (
      'label_input' => 'JavaScript Input',
      'ph_input' => 'Paste your JavaScript code here...',
      'btn_minify' => 'Minify JS',
      'btn_beautify' => 'Beautify JS',
      'btn_clear' => 'Clear',
      'btn_copy' => 'Copy Output',
      'label_output' => 'JavaScript Output',
    ),
    'js' => 
    array (
      'error_empty' => 'Please enter JavaScript code',
      'success_minify' => 'âœ“ JavaScript minified successfully!',
      'success_beautify' => 'âœ“ JavaScript beautified successfully!',
      'error_no_copy' => 'No output to copy',
      'success_copy' => 'âœ“ Copied to clipboard!',
    ),
    'content' => 
    array (
      'about_title' => 'What is a JavaScript Minifier?',
      'about_desc' => 'A JavaScript Minifier is a tool that compresses JavaScript code by removing unnecessary characters like whitespace, comments, and line breaks without changing functionality. Minified JavaScript files are significantly smaller, leading to faster page load times and improved website performance. Our free online JS minifier also includes a beautify feature to format JavaScript with proper indentation for better readability during development.',
      'why_title' => 'Why Minify JavaScript?',
      'why_desc' => 'Minifying JavaScript is essential for web performance optimization. Smaller JS files mean faster downloads, reduced bandwidth usage, and improved page load times. This is especially important for mobile users and users with slower internet connections. Minified JavaScript reduces server load and improves user experience. For production websites, minification is a standard best practice that can significantly improve Core Web Vitals scores.',
      'features_title' => 'Key Features',
      'features_list' => 
      array (
        'minify' => '<strong>Minify JavaScript:</strong> Remove whitespace and comments to reduce file size',
        'beautify' => '<strong>Beautify JavaScript:</strong> Format JS with proper indentation',
        'instant' => '<strong>Instant Results:</strong> Process JavaScript in real-time',
        'copy' => '<strong>Copy Output:</strong> Easily copy minified JavaScript',
        'secure' => '<strong>Secure & Private:</strong> All processing in browser',
        'free' => '<strong>Free to Use:</strong> No registration required',
      ),
      'how_title' => 'How to Use',
      'how_steps' => 
      array (
        1 => 'Paste your JavaScript code into the input field',
        2 => 'Click "Minify JS" to compress the code',
        3 => 'Click "Beautify JS" to format with indentation',
        4 => 'Copy the output using "Copy Output" button',
      ),
      'faq_title' => 'Frequently Asked Questions',
      'faq' => 
      array (
        'q1' => 'Is this JavaScript minifier free?',
        'a1' => 'Yes, completely free with no limitations or registration required.',
        'q2' => 'Is my JavaScript code stored?',
        'a2' => 'No, all processing happens in your browser. Your code is never sent to our servers.',
        'q3' => 'How much smaller will my JS be?',
        'a3' => 'Typically 30-50% smaller depending on formatting and comments in original code.',
        'q4' => 'Can I unminify JavaScript?',
        'a4' => 'Yes, use the "Beautify JS" button to format minified JavaScript with proper indentation.',
        'q5' => 'Does minifying affect JavaScript functionality?',
        'a5' => 'No, minification only removes unnecessary characters. The JavaScript works exactly the same.',
      ),
    ),
  ),
  'html-minifier' => 
  array (
    'meta' => 
    array (
      'title' => 'Free HTML Minifier & Beautifier',
      'description' => 'Compress or format HTML code instantly - minify for production or beautify for development',
      'h1' => 'HTML Minifier & Beautifier',
      'subtitle' => 'Compress or format HTML code instantly',
    ),
    'editor' => 
    array (
      'label_input' => 'HTML Input',
      'ph_input' => 'Paste your HTML code here...',
      'btn_minify' => 'Minify HTML',
      'btn_beautify' => 'Beautify HTML',
      'btn_clear' => 'Clear',
      'btn_copy' => 'Copy Output',
      'label_output' => 'HTML Output',
    ),
    'js' => 
    array (
      'error_empty' => 'Please enter HTML code',
      'success_minify' => 'âœ“ HTML minified successfully!',
      'success_beautify' => 'âœ“ HTML beautified successfully!',
      'error_no_copy' => 'No output to copy',
      'success_copy' => 'âœ“ Copied to clipboard!',
    ),
    'content' => 
    array (
      'about_title' => 'What is an HTML Minifier?',
      'about_desc' => 'An HTML Minifier is a tool that compresses HTML code by removing unnecessary characters like whitespace, comments, and line breaks without changing functionality. Minified HTML files are significantly smaller, leading to faster page load times and improved website performance. Our free online HTML minifier also includes a beautify feature to format HTML with proper indentation for better readability during development.',
      'why_title' => 'Why Minify HTML?',
      'why_desc' => 'Minifying HTML is important for web performance optimization. Smaller HTML files mean faster downloads, reduced bandwidth usage, and improved page load times. This is especially beneficial for large websites with lots of HTML content. Minified HTML reduces server load and improves user experience.',
      'features_title' => 'Key Features',
      'features_list' => 
      array (
        'minify' => '<strong>Minify HTML:</strong> Remove whitespace and comments to reduce file size',
        'beautify' => '<strong>Beautify HTML:</strong> Format HTML with proper indentation',
        'instant' => '<strong>Instant Results:</strong> Process HTML in real-time',
        'copy' => '<strong>Copy Output:</strong> Easily copy minified HTML',
        'secure' => '<strong>Secure & Private:</strong> All processing in browser',
        'free' => '<strong>Free to Use:</strong> No registration required',
      ),
      'how_title' => 'How to Use',
      'how_steps' => 
      array (
        1 => 'Paste your HTML code into the input field',
        2 => 'Click "Minify HTML" to compress the code',
        3 => 'Click "Beautify HTML" to format with indentation',
        4 => 'Copy the output using "Copy Output" button',
      ),
      'faq_title' => 'Frequently Asked Questions',
      'faq' => 
      array (
        'q1' => 'Is this HTML minifier free?',
        'a1' => 'Yes, completely free with no limitations or registration required.',
        'q2' => 'Is my HTML code stored?',
        'a2' => 'No, all processing happens in your browser. Your code is never sent to our servers.',
        'q3' => 'How much smaller will my HTML be?',
        'a3' => 'Typically 10-30% smaller depending on formatting and comments in original code.',
        'q4' => 'Can I unminify HTML?',
        'a4' => 'Yes, use the "Beautify HTML" button to format minified HTML with proper indentation.',
        'q5' => 'Does minifying affect HTML functionality?',
        'a5' => 'No, minification only removes unnecessary characters. The HTML works exactly the same.',
      ),
    ),
  ),
  'xml-formatter' => 
  array (
    'meta' => 
    array (
      'title' => 'XML Formatter',
      'description' => 'Format, beautify, and minify XML data with our free online tool',
      'h1' => 'XML Formatter',
      'subtitle' => 'Format, beautify, and minify XML data',
    ),
    'editor' => 
    array (
      'label_input' => 'XML Input',
      'ph_input' => '<root><child>value</child></root>',
      'btn_format' => 'Format / Beautify',
      'btn_minify' => 'Minify',
      'btn_copy' => 'Copy',
    ),
    'js' => 
    array (
      'success_format' => 'XML Formatted Successfully!',
      'error_invalid' => 'Invalid XML',
      'success_minify' => 'XML Minified!',
      'success_copy' => 'Copied to clipboard!',
    ),
  ),
  'file-difference-checker' => 
  array (
    'meta' => 
    array (
      'title' => 'ÐŸÑ€Ð¾Ð²ÐµÑ€ÐºÐ° Ð Ð°Ð·Ð»Ð¸Ñ‡Ð¸Ð¹ Ð¤Ð°Ð¹Ð»Ð¾Ð²',
      'description' => 'Ð¡Ñ€Ð°Ð²Ð½Ð¸Ñ‚Ðµ Ð´Ð²Ð° Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ñ‹Ñ… Ñ„Ð°Ð¹Ð»Ð° Ð¸ Ð½Ð°Ð¹Ð´Ð¸Ñ‚Ðµ Ñ€Ð°Ð·Ð»Ð¸Ñ‡Ð¸Ñ Ð¼Ð³Ð½Ð¾Ð²ÐµÐ½Ð½Ð¾',
      'h1' => 'ÐŸÑ€Ð¾Ð²ÐµÑ€ÐºÐ° Ð Ð°Ð·Ð»Ð¸Ñ‡Ð¸Ð¹ Ð¤Ð°Ð¹Ð»Ð¾Ð²',
      'subtitle' => 'Compare two text files and find differences instantly',
    ),
    'editor' => 
    array (
      'original_text' => 'Original Text',
      'modified_text' => 'Modified Text',
      'ph_original' => 'Paste original text...',
      'ph_modified' => 'Paste modified text...',
      'btn_compare' => 'Compare Differences',
      'result_label' => 'Difference Result',
    ),
    'js' => 
    array (
      'error_empty' => 'Please enter both texts to compare',
    ),
    'content' => 
    array (
      'title' => 'Online Diff Checker',
      'subtitle' => 'Compare two text files and find differences instantly',
      'p1' => 'Our free Online Diff Checker allows you to compare two text files and visualize the differences between them. Whether you are a programmer comparing code versions or a writer checking document changes, this tool highlights additions, deletions, and changes effectively.',
    ),
  ),
  'cron-job-generator' => 
  array (
    'meta' => 
    array (
      'title' => 'Cron Job Generator',
      'description' => 'Create cron schedules easily with our visual generator - no need to memorize cron syntax',
      'h1' => 'Cron Job Generator',
      'subtitle' => 'Create cron schedules easily with our visual generator',
    ),
    'editor' => 
    array (
      'common_settings' => 'Common Settings',
      'minute' => 'Minute',
      'hour' => 'Hour',
      'day' => 'Day',
      'month' => 'Month',
      'weekday' => 'Weekday',
      'command' => 'Command to Run',
      'next_run' => 'Next Scheduled Runs',
      'generated_cron' => 'Generated Cron Expression',
      'btn_generate' => 'Generate Cron',
      'btn_copy' => 'Copy Cron',
      'btn_clear' => 'Reset',
      'every_minute' => 'Every Minute (*)',
      'every_hour' => 'Every Hour (*)',
      'every_day' => 'Every Day (*)',
      'every_month' => 'Every Month (*)',
      'every_weekday' => 'Every Weekday (*)',
      'choose' => '-- Choose --',
      'ph_command' => '/usr/bin/php /path/to/script.php',
      'options' => 
      array (
        'every_minute' => 'Every Minute (* * * * *)',
        'every_5_minutes' => 'Every 5 Minutes (*/5 * * * *)',
        'every_15_minutes' => 'Every 15 Minutes (*/15 * * * *)',
        'every_30_minutes' => 'Every 30 Minutes (*/30 * * * *)',
        'every_hour' => 'Every Hour (0 * * * *)',
        'every_day_midnight' => 'Every Day at Midnight (0 0 * * *)',
        'every_week' => 'Every Week (0 0 * * 0)',
        'every_month' => 'Every Month (0 0 1 * *)',
      ),
    ),
    'js' => 
    array (
      'success_copy' => 'âœ“ Cron expression copied to clipboard!',
      'no_copy' => 'No cron expression to copy',
    ),
    'content' => 
    array (
      'hero_title' => 'Cron Job Generator',
      'hero_subtitle' => 'Create complex cron job schedules easily with our visual generator. No need to memorize cron syntax anymore.',
      'p1' => 'Setting up cron jobs can be confusing with cryptic asterisks and numbers. Our free online Cron Job Generator allows you to build perfect cron schedules visually. Whether you need to run a script every 5 minutes, at midnight, or on specific days of the month, our tool generates the correct syntax for you instantly.',
      'features_title' => 'âœ¨ Key Features',
      'features' => 
      array (
        'visual' => 
        array (
          'title' => 'Visual Editor',
          'desc' => 'Select minutes, hours, days, and months using a simple interface',
        ),
        'validate' => 
        array (
          'title' => 'Real-time Validation',
          'desc' => 'See the next scheduled run times to verify your schedule matches your intent',
        ),
        'templates' => 
        array (
          'title' => 'Common Templates',
          'desc' => 'One-click presets for common schedules like "Every 5 Minutes" or "Daily"',
        ),
        'readable' => 
        array (
          'title' => 'Human Readable',
          'desc' => 'Converts cron expressions into plain English descriptions',
        ),
      ),
      'syntax_title' => 'ðŸ“š Understanding Cron Syntax',
      'syntax_intro' => 'A cron expression consists of 5 fields separated by spaces:',
      'syntax_fields' => 
      array (
        'min' => 'Minute (0-59)',
        'hour' => 'Hour (0-23)',
        'day' => 'Day of Month (1-31)',
        'month' => 'Month (1-12)',
        'week' => 'Day of Week (0-6, Sunday=0)',
      ),
      'examples_title' => 'ðŸ’¡ Popular Examples',
      'examples' => 
      array (
        1 => 
        array (
          'code' => '*/15 * * * *',
          'desc' => 'Run every 15 minutes',
        ),
        2 => 
        array (
          'code' => '0 0 * * *',
          'desc' => 'Run once a day at midnight',
        ),
        3 => 
        array (
          'code' => '0 9-17 * * 1-5',
          'desc' => 'Run every hour from 9 AM to 5 PM, Monday to Friday',
        ),
        4 => 
        array (
          'code' => '0 0 1 * *',
          'desc' => 'Run once a month on the 1st day',
        ),
      ),
      'faq_title' => 'â“ Frequently Asked Questions',
      'faq' => 
      array (
        'q1' => 'What is a cron job?',
        'a1' => 'A cron job is a time-based job scheduler in Unix-like computer operating systems. Users can schedule jobs (commands or scripts) to run periodically at fixed times, dates, or intervals.',
        'q2' => 'How do I install a cron job?',
        'a2' => 'You typically use the command `crontab -e` in your terminal to edit your cron file. Then paste the generated line at the bottom of the file.',
        'q3' => 'Can I use this for Windows?',
        'a3' => 'Windows uses "Task Scheduler" which has a different format. However, some Windows tools and environments (like WSL or some hosting control panels) do support cron syntax.',
        'q4' => 'What does asterisk (*) mean?',
        'a4' => 'An asterisk means "every". For example, an asterisk in the minute field means "every minute".',
      ),
    ),
  ),
  'curl-command-builder' => 
  array (
    'meta' => 
    array (
      'title' => 'CURL Command Builder',
      'description' => 'Build CURL commands easily with our visual builder - create HTTP requests without memorizing syntax',
      'h1' => 'CURL Command Builder',
      'subtitle' => 'Build CURL commands easily with our visual builder',
    ),
    'editor' => 
    array (
      'method_label' => 'Method',
      'url_label' => 'URL',
      'headers_tab' => 'Headers',
      'body_tab' => 'Request Body',
      'key_ph' => 'Key (e.g. Authorization)',
      'value_ph' => 'Value (e.g. Bearer token)',
      'add_header' => '+ Add Header',
      'raw_data_label' => 'Raw Data (JSON/Text)',
      'generated_label' => 'Generated Command',
      'btn_copy' => 'Copy Command',
    ),
    'js' => 
    array (
      'success_copy' => 'Command copied!',
    ),
  ),
);
