<?php

return [
  'json-formatter' => [
    'meta' =>
      [
        'title' => 'JSON Formatter',
        'description' => 'Format, validate, and minify your JSON data with our free online tool',
        'h1' => 'JSON Formatter',
        'subtitle' => 'Format, validate, and minify your JSON data',
      ],
    'editor' =>
      [
        'title' => 'Format Your JSON Data',
        'label_input' => 'Enter JSON Data',
        'ph_input' => '{"name": "John Doe", "age": 30, "city": "New York"}',
        'help_text' => 'Paste your JSON data to format, beautify, or minify it',
        'btn_format' => 'Format & Beautify',
        'btn_minify' => 'Minify JSON',
        'label_results' => 'Formatted JSON',
        'btn_copy' => 'Copy JSON',
      ],
    'js' =>
      [
        'error_empty_format' => 'Please enter JSON data to format',
        'error_empty_minify' => 'Please enter JSON data to minify',
        'error_invalid' => 'Invalid JSON: ',
        'success_copy' => 'Copied!',
        'error_copy' => 'Failed to copy. Please copy manually.',
      ],
    'content' =>
      [
        'why_title' => 'Why Use Our JSON Formatter?',
        'why_desc' => 'JSON (JavaScript Object Notation) is the most popular data interchange format used in web development, APIs, and configuration files. Our free online JSON formatter helps developers, data analysts, and IT professionals quickly format, beautify, validate, and minify JSON data. Whether you\'re debugging API responses, cleaning up configuration files, or preparing JSON for production, our tool provides instant results with syntax highlighting and error detection. Perfect for developers working with REST APIs, NoSQL databases, and modern web applications.',
        'features' =>
          [
            'instant' =>
              [
                'title' => 'Instant Formatting',
                'desc' => 'Format and beautify JSON data in milliseconds with proper indentation and syntax highlighting',
              ],
            'error' =>
              [
                'title' => 'Error Detection',
                'desc' => 'Automatically detect and highlight JSON syntax errors with helpful error messages',
              ],
            'privacy' =>
              [
                'title' => '100% Private',
                'desc' => 'All processing happens in your browser - your JSON data never leaves your computer',
              ],
          ],
        'how_title' => 'How to Format JSON in 3 Easy Steps',
        'how_steps' =>
          [
            1 =>
              [
                'title' => 'Paste JSON Data',
                'desc' => 'Copy and paste your JSON data into the text area above',
              ],
            2 =>
              [
                'title' => 'Choose Action',
                'desc' => 'Click "Format & Beautify" to format or "Minify" to compress your JSON',
              ],
            3 =>
              [
                'title' => 'Copy Result',
                'desc' => 'Click the copy button to copy the formatted JSON to your clipboard',
              ],
          ],
        'uses_title' => 'Common JSON Formatting Use Cases',
        'uses' =>
          [
            'api' =>
              [
                'title' => 'API Response Debugging',
                'desc' => 'Format messy API responses to easily read and debug JSON data from REST APIs, GraphQL, and web services.',
              ],
            'config' =>
              [
                'title' => 'Configuration Files',
                'desc' => 'Clean up and validate JSON configuration files for applications, package.json, tsconfig.json, and more.',
              ],
            'db' =>
              [
                'title' => 'Database Data',
                'desc' => 'Format JSON data from NoSQL databases like MongoDB, CouchDB, and Firebase for better readability.',
              ],
            'export' =>
              [
                'title' => 'Data Export/Import',
                'desc' => 'Prepare JSON data for export or validate imported JSON data to ensure proper structure and syntax.',
              ],
          ],
        'tips_title' => 'JSON Best Practices & Tips',
        'tips' =>
          [
            'validate' =>
              [
                'title' => '✓ Always Validate JSON',
                'desc' => 'Use a JSON validator to catch syntax errors before deploying to production. Invalid JSON can break your application.',
              ],
            'indent' =>
              [
                'title' => '✓ Use Proper Indentation',
                'desc' => 'Format JSON with 2 or 4 space indentation for better readability during development and debugging.',
              ],
            'minify' =>
              [
                'title' => '✓ Minify for Production',
                'desc' => 'Minify JSON data before deploying to production to reduce file size and improve load times.',
              ],
            'naming' =>
              [
                'title' => '✓ Use Consistent Naming',
                'desc' => 'Follow camelCase or snake_case naming conventions consistently throughout your JSON structure.',
              ],
          ],
        'faq_title' => '❓ Frequently Asked Questions',
        'faq' =>
          [
            'q1' => 'Is my JSON data safe?',
            'a1' => 'Yes, absolutely. Our JSON formatter runs entirely in your web browser using JavaScript. Your data is never sent to our servers or stored anywhere.',
            'q2' => 'Why is Minifying JSON important?',
            'a2' => 'Minifying removes unnecessary whitespace and line breaks, significantly reducing the file size. This is crucial for improving API performance and reducing bandwidth usage in production environments.',
            'q3' => 'Can I validate incomplete JSON?',
            'a3' => 'The tool requires valid JSON structure to format or minify. However, it provides detailed error messages to help you locate and fix issues in your JSON data.',
            'q4' => 'Does it support large JSON files?',
            'a4' => 'Yes, the tool is optimized to handle large JSON datasets efficiently, though extremely large files might depend on your browser\'s memory limits.',
          ],
      ],
  ],
  'base64-encoder-decoder' => [
    'meta' =>
      [
        'title' => 'Base64 Encoder & Decoder',
        'description' => 'Encode and decode Base64 data instantly with our free online tool',
        'h1' => 'Base64 Encoder & Decoder',
        'subtitle' => 'Encode and decode Base64 data instantly',
      ],
    'editor' =>
      [
        'tab_encode' => 'Encode to Base64',
        'tab_decode' => 'Decode from Base64',
        'label_encode' => 'Enter Text to Encode',
        'desc_encode' => 'Enter any text to convert it to Base64 format',
        'ph_encode' => 'Enter your text here...',
        'btn_encode' => 'Encode to Base64',
        'label_decode' => 'Enter Base64 to Decode',
        'desc_decode' => 'Enter Base64 encoded text to decode it back to plain text',
        'ph_decode' => 'Enter Base64 encoded string...',
        'btn_decode' => 'Decode from Base64',
        'result_title' => 'Result',
        'btn_copy' => 'Copy Result',
      ],
    'js' =>
      [
        'error_empty_encode' => 'Please enter text to encode',
        'error_encoding' => 'Error encoding text: ',
        'error_empty_decode' => 'Please enter Base64 string to decode',
        'error_invalid' => 'Invalid Base64 string. Please check your input.',
        'copied' => 'Copied!',
      ],
    'content' =>
      [
        'what_title' => 'What is Base64 Encoding?',
        'what_desc' => 'Base64 is a binary-to-text encoding scheme that represents binary data in an ASCII string format. It\'s commonly used to encode data that needs to be stored or transferred over media designed to handle text. Our free Base64 encoder and decoder tool allows developers, data analysts, and IT professionals to quickly convert text to Base64 or decode Base64 strings back to readable text. Perfect for API development, data transmission, email attachments, embedding images in HTML/CSS, and handling binary data in JSON.',
        'features' =>
          [
            'secure' =>
              [
                'title' => 'Secure Encoding',
                'desc' => 'All processing happens in your browser - your data never leaves your computer',
              ],
            'instant' =>
              [
                'title' => 'Instant Conversion',
                'desc' => 'Encode or decode Base64 data in milliseconds with client-side processing',
              ],
            'easy' =>
              [
                'title' => 'Easy to Use',
                'desc' => 'Simple tabbed interface for encoding and decoding with one-click copy',
              ],
          ],
        'how_to' =>
          [
            'title' => 'How to Use Base64 Encoder/Decoder',
            'encode' =>
              [
                'title' => 'Encoding Text',
                'step1' => 'Click the "Encode to Base64" tab',
                'step2' => 'Paste or type your text in the input area',
                'step3' => 'Click "Encode to Base64" button',
                'step4' => 'Copy the Base64 encoded result',
              ],
            'decode' =>
              [
                'title' => 'Decoding Base64',
                'step1' => 'Click the "Decode from Base64" tab',
                'step2' => 'Paste your Base64 string in the input area',
                'step3' => 'Click "Decode from Base64" button',
                'step4' => 'Copy the decoded plain text result',
              ],
          ],
        'uses' =>
          [
            'title' => 'Common Base64 Use Cases',
            'api' =>
              [
                'title' => 'API Authentication',
                'desc' => 'Encode credentials for Basic Authentication in HTTP headers and API requests.',
              ],
            'data_uri' =>
              [
                'title' => 'Data URIs',
                'desc' => 'Embed images, fonts, and files directly in HTML, CSS, or JSON using Base64 data URIs.',
              ],
            'email' =>
              [
                'title' => 'Email Attachments',
                'desc' => 'Encode binary attachments in MIME email messages for safe transmission.',
              ],
            'storage' =>
              [
                'title' => 'Data Storage',
                'desc' => 'Store binary data in text-based formats like JSON, XML, or databases.',
              ],
          ],
        'bottom' =>
          [
            'h1' => 'Base64 Encoder & Decoder',
            'subtitle' => 'Encode and decode Base64 data instantly',
            'desc' => 'Base64 is a binary-to-text encoding scheme that converts binary data into ASCII text format. Our free Base64 Encoder & Decoder helps developers, system administrators, and IT professionals encode text to Base64 or decode Base64 back to readable text instantly. Perfect for API authentication, data URIs, email attachments, and secure data transmission. All processing happens in your browser for complete privacy.',
            'works_title' => '🔄 How Base64 Works',
            'works_encoding' => 'Converts binary data to ASCII text using 64 characters',
            'works_encoding_sub' => 'A-Z, a-z, 0-9, +, / (and = for padding)',
            'works_decoding' => 'Converts Base64 text back to original binary data',
            'works_decoding_sub' => 'Reverses the encoding process perfectly',
            'cases_title' => '✅ Common Use Cases',
            'case_api' => 'API Authentication',
            'case_api_desc' => 'Encode credentials for Basic Auth in HTTP headers',
            'case_uri' => 'Data URIs',
            'case_uri_desc' => 'Embed images and files directly in HTML/CSS',
            'case_email' => 'Email Attachments',
            'case_email_desc' => 'Encode binary files for email transmission',
            'case_url' => 'URL Parameters',
            'case_url_desc' => 'Safely pass binary data in URLs',
            'case_storage' => 'Data Storage',
            'case_storage_desc' => 'Store binary data in text-only databases',
            'case_web' => 'Web Development',
            'case_web_desc' => 'Encode JSON, XML, and configuration files',
            'best_practices_title' => '💡 Base64 Best Practices',
            'best_practices_list' =>
              [
                0 => 'Base64 increases data size by approximately 33%',
                1 => 'Not suitable for encryption - use proper encryption algorithms',
                2 => 'Perfect for encoding binary data in text-only systems',
                3 => 'Always validate decoded data before using it',
                4 => 'Use URL-safe Base64 for URLs (replaces +/= with -_)',
              ],
          ],
        'faq' =>
          [
            'title' => '❓ Frequently Asked Questions',
            'q1' => 'Is Base64 encoding secure?',
            'a1' => 'No! Base64 is NOT encryption - it\'s simply encoding. Anyone can decode Base64 data instantly. Never use Base64 alone for security. For encryption, use proper cryptographic algorithms like AES, RSA, or TLS/SSL.',
            'q2' => 'Why does Base64 increase file size?',
            'a2' => 'Base64 encoding increases data size by approximately 33% because it represents 3 bytes of binary data using 4 ASCII characters. This overhead is the trade-off for making binary data safe for text-only systems.',
            'q3' => 'What is Base64 used for?',
            'a3' => 'Base64 is used for encoding binary data (images, files, credentials) into ASCII text for transmission over text-only systems like email, URLs, JSON, XML, and HTTP headers. It\'s essential for API authentication, data URIs, and email attachments.',
            'q4' => 'Is my data sent to a server?',
            'a4' => 'No! All Base64 encoding and decoding happens entirely in your browser using JavaScript. Your data never leaves your device and is not stored, transmitted, or logged anywhere. Your privacy is completely protected.',
            'q5' => 'Can I encode images to Base64?',
            'a5' => 'Yes! While our tool encodes text, you can encode images using specialized tools. Base64-encoded images can be embedded directly in HTML/CSS using data URIs (data:image/png;base64,...). This is useful for small images but increases page size.',
          ],
      ],
  ],
  'html-viewer' => [
    'meta' =>
      [
        'title' => 'HTML Viewer',
        'description' => 'Preview HTML code in real-time with our free online HTML viewer',
        'h1' => 'HTML Viewer',
        'subtitle' => 'Preview HTML code in real-time',
      ],
    'editor' =>
      [
        'label_input' => 'HTML Code',
        'ph_input' => 'Enter your HTML code here...',
        'label_preview' => 'Live Preview',
        'btn_clear' => 'Clear',
        'btn_load_sample' => 'Load Sample',
        'btn_fullscreen' => 'Fullscreen',
        'btn_exit_fullscreen' => 'Exit Fullscreen',
      ],
    'content' =>
      [
        'about_title' => 'What is an HTML Viewer?',
        'about_desc' => 'An HTML Viewer is a powerful online tool that allows you to preview and visualize HTML code in real-time. Whether you\'re a web developer testing code snippets, a student learning HTML, or a designer reviewing markup, our HTML viewer provides instant visual feedback for your HTML code. Simply paste your HTML code into the editor, and see the rendered output immediately in the live preview pane.',
        'why_title' => 'Why Use Our HTML Viewer?',
        'why_desc' => 'Our free HTML viewer offers several advantages for developers and designers. First, it provides instant visual feedback without needing to create files or set up a development environment. Second, it\'s completely browser-based, meaning you can use it anywhere without installing software. Third, it\'s perfect for quick testing, debugging, and learning HTML. The side-by-side view lets you see your code and its output simultaneously, making it easier to understand how HTML elements render.',
        'features_title' => 'Key Features',
        'features_list' =>
          [
            'preview' => '<strong>Real-Time Preview:</strong> See your HTML rendered instantly as you type',
            'layout' => '<strong>Side-by-Side View:</strong> Code editor and preview pane displayed together',
            'syntax' => '<strong>Syntax Highlighting:</strong> Easy-to-read code with color-coded syntax',
            'sample' => '<strong>Sample Code:</strong> Load example HTML to get started quickly',
            'no_install' => '<strong>No Installation Required:</strong> Works directly in your browser',
            'free' => '<strong>Free to Use:</strong> No registration or payment required',
            'secure' => '<strong>Secure:</strong> All processing happens in your browser',
          ],
        'how_title' => 'How to Use the HTML Viewer',
        'how_steps' =>
          [
            1 => 'Paste or type your HTML code in the left editor pane',
            2 => 'The preview will update automatically in the right pane',
            3 => 'Use the "Load Sample" button to see example HTML code',
            4 => 'Click "Clear" to start fresh with a blank editor',
            5 => 'Test different HTML elements and see how they render',
          ],
        'uses_title' => 'Common Use Cases',
        'uses_desc' => 'HTML viewers are essential tools for various web development tasks. Developers use them to quickly test HTML snippets before integrating them into larger projects. Students learning HTML can experiment with different tags and attributes to understand their effects. Email marketers use HTML viewers to preview email templates before sending. Content creators can visualize how their HTML content will appear on websites. Designers can review markup structure and ensure proper rendering of HTML elements.',
        'basics_title' => 'Understanding HTML Basics',
        'basics_desc' => 'HTML (HyperText Markup Language) is the standard markup language for creating web pages. It consists of elements represented by tags, which tell browsers how to display content. Common HTML elements include headings (&lt;h1&gt; to &lt;h6&gt;], paragraphs (&lt;p&gt;], links (&lt;a&gt;], images (&lt;img&gt;], and divisions (&lt;div&gt;). Understanding these basic elements is crucial for web development, and our HTML viewer helps you visualize how they work together to create web pages.',
        'tips_title' => 'Best Practices for HTML',
        'tips_desc' => 'When writing HTML, follow best practices to ensure clean, maintainable code. Always use semantic HTML elements that describe their content (like &lt;header&gt;, &lt;nav&gt;, &lt;article&gt;). Properly nest elements and close all tags. Use lowercase for tag names and attribute names. Add alt attributes to images for accessibility. Validate your HTML to catch errors early. Keep your code organized with proper indentation. These practices lead to better SEO, accessibility, and maintainability.',
        'faq_title' => 'Frequently Asked Questions',
        'faq' =>
          [
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
          ],
      ],
  ],
  'json-parser' => [
    'meta' =>
      [
        'title' => 'JSON Parser & Validator',
        'description' => 'Parse, validate, and visualize JSON structure',
        'h1' => 'JSON Parser & Validator',
        'subtitle' => 'Parse, validate, and visualize JSON structure',
      ],
    'editor' =>
      [
        'label_input' => 'JSON Input',
        'ph_input' => '{"name": "John Doe", "age": 30, "isActive": true}',
        'btn_parse' => 'Parse JSON',
        'btn_beautify' => 'Beautify',
        'btn_minify' => 'Minify',
        'btn_clear' => 'Clear',
        'btn_load' => 'Load Sample',
        'title_tree' => 'JSON Tree View',
      ],
    'js' =>
      [
        'error_empty_parse' => 'Please enter JSON data to parse',
        'error_empty_beautify' => 'Please enter JSON data to beautify',
        'error_empty_minify' => 'Please enter JSON data to minify',
        'success_valid' => '✓ Valid JSON! Parsed successfully',
        'error_invalid' => '✗ Invalid JSON: ',
        'success_beautify' => '✓ JSON beautified successfully',
        'error_beautify' => '✗ Cannot beautify invalid JSON: ',
        'success_minify' => '✓ JSON minified successfully',
        'error_minify' => '✗ Cannot minify invalid JSON: ',
        'success_load' => 'Sample JSON loaded',
      ],
    'content' =>
      [
        'hero_title' => 'Free JSON Parser & Validator',
        'hero_subtitle' => 'Parse, validate, beautify, and minify JSON data instantly',
        'p1' => 'Our free JSON Parser is a powerful online tool for developers, data analysts, and anyone working with JSON data. Instantly parse, validate, beautify, and minify JSON with a clean, intuitive interface. Perfect for debugging APIs, formatting configuration files, or validating JSON structure. 100% free, client-side processing ensures your data stays private and secure.',
        'what_title' => '📋 What is JSON?',
        'what_desc' => 'JSON (JavaScript Object Notation) is a lightweight data-interchange format that\'s easy for humans to read and write, and easy for machines to parse and generate. It\'s the most popular format for APIs, configuration files, and data storage. JSON uses key-value pairs and supports strings, numbers, booleans, arrays, and nested objects.',
        'features_title' => '✨ Features',
        'features' =>
          [
            'validate' =>
              [
                'title' => 'JSON Validation',
                'desc' => 'Instantly validate JSON syntax and structure',
              ],
            'beautify' =>
              [
                'title' => 'Beautify JSON',
                'desc' => 'Format JSON with proper indentation and spacing',
              ],
            'minify' =>
              [
                'title' => 'Minify JSON',
                'desc' => 'Compress JSON by removing whitespace',
              ],
            'tree' =>
              [
                'title' => 'Tree View',
                'desc' => 'Visualize JSON structure in tree format',
              ],
            'privacy' =>
              [
                'title' => 'Privacy First',
                'desc' => 'All processing happens in your browser',
              ],
            'instant' =>
              [
                'title' => 'Instant Results',
                'desc' => 'Parse and format JSON in milliseconds',
              ],
          ],
        'uses_title' => '🎯 Common Use Cases',
        'uses' =>
          [
            'api' =>
              [
                'title' => '🔌 API Development',
                'desc' => 'Test and debug API responses, validate request payloads, and format JSON data',
              ],
            'config' =>
              [
                'title' => '⚙️ Configuration Files',
                'desc' => 'Format and validate config files for applications, databases, and services',
              ],
            'analysis' =>
              [
                'title' => '📊 Data Analysis',
                'desc' => 'Parse and visualize JSON data from databases, logs, and analytics tools',
              ],
            'debug' =>
              [
                'title' => '🐛 Debugging',
                'desc' => 'Identify syntax errors, validate structure, and troubleshoot JSON issues',
              ],
            'docs' =>
              [
                'title' => '📝 Documentation',
                'desc' => 'Create readable JSON examples for API docs and technical guides',
              ],
            'migration' =>
              [
                'title' => '🔄 Data Migration',
                'desc' => 'Transform and validate JSON during data imports and exports',
              ],
          ],
        'how_title' => '📚 How to Use',
        'how_steps' =>
          [
            1 => '<strong>Paste JSON:</strong> Copy and paste your JSON data into the input field',
            2 => '<strong>Parse:</strong> Click "Parse JSON" to validate and visualize the structure',
            3 => '<strong>Beautify:</strong> Click "Beautify" to format with proper indentation',
            4 => '<strong>Minify:</strong> Click "Minify" to compress and remove whitespace',
            5 => '<strong>View Tree:</strong> See the hierarchical structure in tree view format',
          ],
        'tips_title' => '💡 JSON Best Practices',
        'tips_list' =>
          [
            1 => '<strong>Use double quotes:</strong> JSON requires double quotes for strings, not single quotes',
            2 => '<strong>No trailing commas:</strong> Remove commas after the last item in objects and arrays',
            3 => '<strong>Proper data types:</strong> Use numbers without quotes, booleans as true/false, null for empty values',
            4 => '<strong>Validate regularly:</strong> Always validate JSON before deployment or production use',
            5 => '<strong>Beautify for readability:</strong> Format JSON for easier debugging and maintenance',
          ],
        'faq_title' => '❓ Frequently Asked Questions',
        'faq' =>
          [
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
          ],
      ],
  ],
  'code-formatter' => [
    'meta' =>
      [
        'title' => 'Free Online Code Formatter',
        'description' => 'Beautify and format your code instantly - supports HTML, CSS, JavaScript, JSON, XML, SQL, PHP',
        'h1' => 'Free Online Code Formatter',
        'subtitle' => 'Beautify and format your code instantly',
      ],
    'editor' =>
      [
        'label_input' => 'Input Code',
        'ph_input' => '// Paste your code here...',
        'label_language' => 'Language',
        'languages' =>
          [
            'html' => 'HTML',
            'css' => 'CSS',
            'js' => 'JavaScript',
            'json' => 'JSON',
            'xml' => 'XML',
            'sql' => 'SQL',
            'php' => 'PHP',
          ],
        'label_indent' => 'Indentation',
        'indents' =>
          [
            2 => '2 Spaces',
            4 => '4 Spaces',
            'tab' => 'Tab',
          ],
        'btn_format' => 'Format Code',
        'btn_clear' => 'Clear',
        'btn_copy' => 'Copy',
        'label_output' => 'Formatted Code',
        'ph_output' => '// Formatted code will appear here...',
      ],
    'js' =>
      [
        'error_empty' => 'Please paste some code to format',
        'success_format' => '✓ Code formatted successfully!',
        'error_format' => 'Error formatting code: ',
        'no_copy' => 'No code to copy',
        'success_copy' => '✓ Copied to clipboard!',
      ],
    'content' =>
      [
        'hero_title' => 'Free Online Code Formatter',
        'hero_subtitle' => 'Beautify and format your code instantly with our advanced code formatter. Supports HTML, CSS, JavaScript, JSON, XML, SQL, and PHP.',
        'p1' => 'Clean up messy code and improve readability with our free online code formatter. Whether you have minified code that needs beautifying or just want to standardize indentation, our tool handles it all instantly in your browser.',
        'features_title' => '✨ Key Features',
        'features' =>
          [
            'multi' =>
              [
                'title' => 'Multi-Language Support',
                'desc' => 'Supports major programming languages including HTML, CSS, JS, JSON, and more',
              ],
            'indent' =>
              [
                'title' => 'Custom Indentation',
                'desc' => 'Choose between 2 spaces, 4 spaces, or tabs for your preferred style',
              ],
            'instant' =>
              [
                'title' => 'Instant Beautify',
                'desc' => 'Format code instantly without page reloads',
              ],
            'privacy' =>
              [
                'title' => 'Privacy Focused',
                'desc' => 'Code processing happens in your browser - no data is stored',
              ],
          ],
        'langs_title' => '💻 Supported Languages',
        'langs' =>
          [
            'web' =>
              [
                'title' => 'Web Technologies',
                'desc' => 'HTML5, CSS3, JavaScript (ES6+)',
              ],
            'data' =>
              [
                'title' => 'Data Formats',
                'desc' => 'JSON, XML',
              ],
            'backend' =>
              [
                'title' => 'Backend',
                'desc' => 'PHP, SQL',
              ],
          ],
        'why_title' => '🤔 Why Format Code?',
        'why' =>
          [
            'read' =>
              [
                'title' => 'Readability',
                'desc' => 'Properly indented code is easier to read, understand, and maintain.',
              ],
            'debug' =>
              [
                'title' => 'Debugging',
                'desc' => 'Find errors faster in well-structured code compared to minified strings.',
              ],
            'collab' =>
              [
                'title' => 'Collaboration',
                'desc' => 'Standard code style helps teams work together more efficiently.',
              ],
          ],
        'faq_title' => '❓ Frequently Asked Questions',
        'faq' =>
          [
            'q1' => 'Is my code safe?',
            'a1' => 'Yes! All code formatting is done using JavaScript directly in your browser. Your code is never sent to our servers.',
            'q2' => 'Can I format minified code?',
            'a2' => 'Absolutely! Our beautifier is perfect for un-minifying code to make it readable again.',
            'q3' => 'Does it fix syntax errors?',
            'a3' => 'The formatter focuses on layout and indentation. While it can handle some basic structure issues, it does not fix syntax errors.',
            'q4' => 'Is there a limit on code size?',
            'a4' => 'Since processing is done on your device, the limit depends on your browser\'s memory. It can easily handle files with thousands of lines.',
          ],
      ],
  ],
  'css-minifier' => [
    'meta' =>
      [
        'title' => 'Free CSS Minifier & Beautifier',
        'description' => 'Optimize CSS files for faster page loads - minify and beautify CSS instantly',
        'h1' => 'Free CSS Minifier & Beautifier',
        'subtitle' => 'Optimize CSS files for faster page loads',
      ],
    'editor' =>
      [
        'label_input' => 'CSS Input',
        'ph_input' => 'Paste your CSS code here...',
        'btn_minify' => 'Minify CSS',
        'btn_beautify' => 'Beautify CSS',
        'btn_clear' => 'Clear',
        'btn_copy' => 'Copy',
        'label_output' => 'CSS Output',
        'ph_output' => 'Processed CSS will appear here...',
        'stats' =>
          [
            'original' => 'Original Size',
            'minified' => 'Minified Size',
            'saved' => 'Saved',
            'compression' => 'Compression',
          ],
      ],
    'js' =>
      [
        'error_empty' => 'Please enter CSS code to process',
        'success_minify' => '✓ CSS minified successfully',
        'success_beautify' => '✓ CSS beautified successfully',
        'error_process' => '✗ Error processing CSS: ',
        'no_copy' => 'No CSS to copy',
        'success_copy' => '✓ CSS copied to clipboard',
      ],
    'content' =>
      [
        'hero_title' => 'Free CSS Minifier & Beautifier',
        'hero_subtitle' => 'Optimize CSS files for faster page loads and better performance',
        'p1' => 'Our free CSS Minifier compresses CSS files by removing whitespace, comments, and unnecessary characters, significantly reducing file size and improving website load times. Perfect for web developers, designers, and anyone optimizing website performance. Also includes a CSS beautifier to format and organize your stylesheets for better readability. 100% free, client-side processing ensures your code stays private.',
        'what_title' => '🎨 What is CSS Minification?',
        'what_desc' => 'CSS minification is the process of removing unnecessary characters from CSS code without changing its functionality. This includes whitespace, line breaks, comments, and redundant code. Minified CSS files are smaller, load faster, and improve website performance. It\'s an essential optimization technique for production websites.',
        'features_title' => '✨ Features',
        'features' =>
          [
            'minify' =>
              [
                'title' => 'CSS Minification',
                'desc' => 'Compress CSS by removing whitespace and comments',
              ],
            'beautify' =>
              [
                'title' => 'CSS Beautification',
                'desc' => 'Format CSS with proper indentation and spacing',
              ],
            'stats' =>
              [
                'title' => 'Compression Stats',
                'desc' => 'See file size reduction and compression rate',
              ],
            'instant' =>
              [
                'title' => 'Instant Processing',
                'desc' => 'Minify or beautify CSS in milliseconds',
              ],
            'privacy' =>
              [
                'title' => 'Privacy First',
                'desc' => 'All processing happens in your browser',
              ],
            'copy' =>
              [
                'title' => 'One-Click Copy',
                'desc' => 'Copy minified CSS to clipboard instantly',
              ],
          ],
        'benefits_title' => '🎯 Benefits of CSS Minification',
        'benefits' =>
          [
            'speed' =>
              [
                'title' => '⚡ Faster Page Loads',
                'desc' => 'Smaller CSS files download faster, improving page load times and user experience',
              ],
            'bandwidth' =>
              [
                'title' => '💰 Reduced Bandwidth',
                'desc' => 'Lower bandwidth usage saves hosting costs and mobile data for users',
              ],
            'seo' =>
              [
                'title' => '📈 Better SEO',
                'desc' => 'Faster sites rank better in search engines, improving visibility',
              ],
            'performance' =>
              [
                'title' => '🎯 Improved Performance',
                'desc' => 'Optimized CSS reduces browser parsing time and rendering delays',
              ],
            'mobile' =>
              [
                'title' => '📱 Mobile Optimization',
                'desc' => 'Crucial for mobile users with limited bandwidth and slower connections',
              ],
            'production' =>
              [
                'title' => '🔧 Production Ready',
                'desc' => 'Minified CSS is standard practice for production deployments',
              ],
          ],
        'how_title' => '📚 How to Use',
        'how_steps' =>
          [
            1 => '<strong>Paste CSS:</strong> Copy and paste your CSS code into the input field',
            2 => '<strong>Choose Action:</strong> Click "Minify CSS" to compress or "Beautify CSS" to format',
            3 => '<strong>View Results:</strong> See the processed CSS in the output field with compression stats',
            4 => '<strong>Copy:</strong> Click "Copy" to copy the minified CSS to your clipboard',
            5 => '<strong>Use in Production:</strong> Replace your original CSS file with the minified version',
          ],
        'best_practices_title' => '💡 Best Practices',
        'best_practices_list' =>
          [
            1 => '<strong>Keep source files:</strong> Always maintain readable, unminified versions for development',
            2 => '<strong>Minify for production:</strong> Only use minified CSS in production environments',
            3 => '<strong>Combine files:</strong> Merge multiple CSS files before minifying for better compression',
            4 => '<strong>Test thoroughly:</strong> Always test minified CSS to ensure no functionality is broken',
            5 => '<strong>Use build tools:</strong> Integrate minification into your build process for automation',
          ],
        'faq_title' => '❓ Frequently Asked Questions',
        'faq' =>
          [
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
          ],
      ],
  ],
  'js-minifier' => [
    'meta' =>
      [
        'title' => 'JavaScript Minifier',
        'description' => 'Compress and optimize your JavaScript code for faster page loads',
        'h1' => 'JavaScript Minifier',
        'subtitle' => 'Compress and optimize your JavaScript code',
      ],
    'editor' =>
      [
        'label_input' => 'JavaScript Input',
        'ph_input' => 'Paste your JavaScript code here...',
        'btn_minify' => 'Minify JS',
        'btn_beautify' => 'Beautify JS',
        'btn_clear' => 'Clear',
        'btn_copy' => 'Copy Output',
        'label_output' => 'JavaScript Output',
      ],
    'js' =>
      [
        'error_empty' => 'Please enter JavaScript code',
        'success_minify' => '✓ JavaScript minified successfully!',
        'success_beautify' => '✓ JavaScript beautified successfully!',
        'error_no_copy' => 'No output to copy',
        'success_copy' => '✓ Copied to clipboard!',
      ],
    'content' =>
      [
        'about_title' => 'What is a JavaScript Minifier?',
        'about_desc' => 'A JavaScript Minifier is a tool that compresses JavaScript code by removing unnecessary characters like whitespace, comments, and line breaks without changing functionality. Minified JavaScript files are significantly smaller, leading to faster page load times and improved website performance. Our free online JS minifier also includes a beautify feature to format JavaScript with proper indentation for better readability during development.',
        'why_title' => 'Why Minify JavaScript?',
        'why_desc' => 'Minifying JavaScript is essential for web performance optimization. Smaller JS files mean faster downloads, reduced bandwidth usage, and improved page load times. This is especially important for mobile users and users with slower internet connections. Minified JavaScript reduces server load and improves user experience. For production websites, minification is a standard best practice that can significantly improve Core Web Vitals scores.',
        'features_title' => 'Key Features',
        'features_list' =>
          [
            'minify' => '<strong>Minify JavaScript:</strong> Remove whitespace and comments to reduce file size',
            'beautify' => '<strong>Beautify JavaScript:</strong> Format JS with proper indentation',
            'instant' => '<strong>Instant Results:</strong> Process JavaScript in real-time',
            'copy' => '<strong>Copy Output:</strong> Easily copy minified JavaScript',
            'secure' => '<strong>Secure & Private:</strong> All processing in browser',
            'free' => '<strong>Free to Use:</strong> No registration required',
          ],
        'how_title' => 'How to Use',
        'how_steps' =>
          [
            1 => 'Paste your JavaScript code into the input field',
            2 => 'Click "Minify JS" to compress the code',
            3 => 'Click "Beautify JS" to format with indentation',
            4 => 'Copy the output using "Copy Output" button',
          ],
        'faq_title' => 'Frequently Asked Questions',
        'faq' =>
          [
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
          ],
      ],
  ],
  'html-minifier' => [
    'meta' =>
      [
        'title' => 'Free HTML Minifier & Beautifier',
        'description' => 'Compress or format HTML code instantly - minify for production or beautify for development',
        'h1' => 'Free HTML Minifier & Beautifier',
        'subtitle' => 'Compress or format HTML code instantly',
      ],
    'editor' =>
      [
        'label_input' => 'HTML Input',
        'ph_input' => 'Paste your HTML code here...',
        'btn_minify' => 'Minify HTML',
        'btn_beautify' => 'Beautify HTML',
        'btn_clear' => 'Clear',
        'btn_copy' => 'Copy Output',
        'label_output' => 'HTML Output',
      ],
    'js' =>
      [
        'error_empty' => 'Please enter HTML code',
        'success_minify' => '✓ HTML minified successfully!',
        'success_beautify' => '✓ HTML beautified successfully!',
        'error_no_copy' => 'No output to copy',
        'success_copy' => '✓ Copied to clipboard!',
      ],
    'content' =>
      [
        'about_title' => 'What is an HTML Minifier?',
        'about_desc' => 'An HTML Minifier is a tool that compresses HTML code by removing unnecessary characters like whitespace, comments, and line breaks without changing functionality. Minified HTML files are significantly smaller, leading to faster page load times and improved website performance. Our free online HTML minifier also includes a beautify feature to format HTML with proper indentation for better readability during development.',
        'why_title' => 'Why Minify HTML?',
        'why_desc' => 'Minifying HTML is important for web performance optimization. Smaller HTML files mean faster downloads, reduced bandwidth usage, and improved page load times. This is especially beneficial for large websites with lots of HTML content. Minified HTML reduces server load and improves user experience.',
        'features_title' => 'Key Features',
        'features_list' =>
          [
            'minify' => '<strong>Minify HTML:</strong> Remove whitespace and comments to reduce file size',
            'beautify' => '<strong>Beautify HTML:</strong> Format HTML with proper indentation',
            'instant' => '<strong>Instant Results:</strong> Process HTML in real-time',
            'copy' => '<strong>Copy Output:</strong> Easily copy minified HTML',
            'secure' => '<strong>Secure & Private:</strong> All processing in browser',
            'free' => '<strong>Free to Use:</strong> No registration required',
          ],
        'how_title' => 'How to Use',
        'how_steps' =>
          [
            1 => 'Paste your HTML code into the input field',
            2 => 'Click "Minify HTML" to compress the code',
            3 => 'Click "Beautify HTML" to format with indentation',
            4 => 'Copy the output using "Copy Output" button',
          ],
        'faq_title' => 'Frequently Asked Questions',
        'faq' =>
          [
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
          ],
      ],
  ],
  'xml-formatter' => [
    'meta' =>
      [
        'title' => 'XML Formatter',
        'description' => 'Format, beautify, and minify XML data with our free online tool.',
        'h1' => 'XML Formatter',
        'subtitle' => 'Format, beautify, and minify XML data',
      ],
    'editor' =>
      [
        'label_input' => 'XML Input',
        'ph_input' => '<root><child>value</child></root>',
        'btn_format' => 'Format / Beautify',
        'btn_minify' => 'Minify',
        'btn_copy' => 'Copy',
      ],
    'js' =>
      [
        'success_format' => 'XML Formatted Successfully!',
        'error_invalid' => 'Invalid XML',
        'success_minify' => 'XML Minified!',
        'success_copy' => 'Copied to clipboard!',
      ],
  ],
  'cron-job-generator' => [
    'meta' =>
      [
        'title' => 'Cron Job Generator',
        'description' => 'Create cron schedules easily with our visual generator - no need to memorize cron syntax',
        'h1' => 'Cron Job Generator',
        'subtitle' => 'Create cron schedules easily with our visual generator',
      ],
    'editor' =>
      [
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
          [
            'every_minute' => 'Every Minute (* * * * *)',
            'every_5_minutes' => 'Every 5 Minutes (*/5 * * * *)',
            'every_15_minutes' => 'Every 15 Minutes (*/15 * * * *)',
            'every_30_minutes' => 'Every 30 Minutes (*/30 * * * *)',
            'every_hour' => 'Every Hour (0 * * * *)',
            'every_day_midnight' => 'Every Day at Midnight (0 0 * * *)',
            'every_week' => 'Every Week (0 0 * * 0)',
            'every_month' => 'Every Month (0 0 1 * *)',
          ],
      ],
    'js' =>
      [
        'success_copy' => '✓ Cron expression copied to clipboard!',
        'no_copy' => 'No cron expression to copy',
      ],
    'content' =>
      [
        'hero_title' => 'Cron Job Generator',
        'hero_subtitle' => 'Create complex cron job schedules easily with our visual generator. No need to memorize cron syntax anymore.',
        'p1' => 'Setting up cron jobs can be confusing with cryptic asterisks and numbers. Our free online Cron Job Generator allows you to build perfect cron schedules visually. Whether you need to run a script every 5 minutes, at midnight, or on specific days of the month, our tool generates the correct syntax for you instantly.',
        'features_title' => '✨ Key Features',
        'features' =>
          [
            'visual' =>
              [
                'title' => 'Visual Editor',
                'desc' => 'Select minutes, hours, days, and months using a simple interface',
              ],
            'validate' =>
              [
                'title' => 'Real-time Validation',
                'desc' => 'See the next scheduled run times to verify your schedule matches your intent',
              ],
            'templates' =>
              [
                'title' => 'Common Templates',
                'desc' => 'One-click presets for common schedules like "Every 5 Minutes" or "Daily"',
              ],
            'readable' =>
              [
                'title' => 'Human Readable',
                'desc' => 'Converts cron expressions into plain English descriptions',
              ],
          ],
        'syntax_title' => '📚 Understanding Cron Syntax',
        'syntax_intro' => 'A cron expression consists of 5 fields separated by spaces:',
        'syntax_fields' =>
          [
            'min' => 'Minute (0-59)',
            'hour' => 'Hour (0-23)',
            'day' => 'Day of Month (1-31)',
            'month' => 'Month (1-12)',
            'week' => 'Day of Week (0-6, Sunday=0)',
          ],
        'examples_title' => '💡 Popular Examples',
        'examples' =>
          [
            1 =>
              [
                'code' => '*/15 * * * *',
                'desc' => 'Run every 15 minutes',
              ],
            2 =>
              [
                'code' => '0 0 * * *',
                'desc' => 'Run once a day at midnight',
              ],
            3 =>
              [
                'code' => '0 9-17 * * 1-5',
                'desc' => 'Run every hour from 9 AM to 5 PM, Monday to Friday',
              ],
            4 =>
              [
                'code' => '0 0 1 * *',
                'desc' => 'Run once a month on the 1st day',
              ],
          ],
        'faq_title' => '❓ Frequently Asked Questions',
        'faq' =>
          [
            'q1' => 'What is a cron job?',
            'a1' => 'A cron job is a time-based job scheduler in Unix-like computer operating systems. Users can schedule jobs (commands or scripts) to run periodically at fixed times, dates, or intervals.',
            'q2' => 'How do I install a cron job?',
            'a2' => 'You typically use the command `crontab -e` in your terminal to edit your cron file. Then paste the generated line at the bottom of the file.',
            'q3' => 'Can I use this for Windows?',
            'a3' => 'Windows uses "Task Scheduler" which has a different format. However, some Windows tools and environments (like WSL or some hosting control panels) do support cron syntax.',
            'q4' => 'What does asterisk (*) mean?',
            'a4' => 'An asterisk means "every". For example, an asterisk in the minute field means "every minute".',
          ],
      ],
  ],
  'curl-command-builder' => [
    'meta' =>
      [
        'title' => 'CURL Command Builder',
        'description' => 'Build CURL commands easily with our visual builder - create HTTP requests without memorizing syntax',
        'h1' => 'CURL Command Builder',
        'subtitle' => 'Build CURL commands easily with our visual builder',
      ],
    'editor' =>
      [
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
      ],
    'js' =>
      [
        'success_copy' => 'Command copied!',
      ],
  ],
  'md5-generator' => [
    'meta' =>
      [
        'title' => 'MD5 Hash Generator',
        'description' => 'Generate MD5 hashes from any text instantly',
        'h1' => 'MD5 Hash Generator',
        'subtitle' => 'Generate MD5 hashes from any text instantly',
      ],
    'editor' =>
      [
        'label_input' => 'Enter Text',
        'ph_input' => 'Enter text to hash...',
        'btn_generate' => 'Generate MD5 Hash',
        'label_result' => 'MD5 Hash',
        'btn_copy' => 'Copy',
      ],
    'js' =>
      [
        'error_empty' => 'Please enter some text',
        'btn_copied' => 'Copied!',
      ],
    'content' =>
      [
        'hero_title' => 'MD5 Hash Generator',
        'hero_subtitle' => 'Generate MD5 hashes from any text instantly',
        'p1' => 'Generate MD5 hashes from any text, password, or data string instantly with our free online MD5 hash generator. MD5 (Message-Digest Algorithm 5) is a widely used cryptographic hash function that produces a 128-bit (32-character hexadecimal) hash value. Perfect for data integrity verification, checksum generation, and understanding hash functions. All processing happens in your browser for complete privacy.',
        'what_title' => 'ðŸ”’ What is MD5?',
        'what_desc' => 'MD5 is a cryptographic hash function that takes an input of any length and produces a fixed 128-bit hash value, typically represented as a 32-character hexadecimal number. The same input always produces the same hash, but even a tiny change in input creates a completely different hash.',
        'features_title' => 'âœ… MD5 Advantages',
        'features' =>
          [
            'fast' => '<strong>Fast Processing:</strong> Extremely quick hash generation',
            'fixed' => '<strong>Fixed Length:</strong> Always produces 128-bit output',
            'deterministic' => '<strong>Deterministic:</strong> Same input = same hash',
            'support' => '<strong>Wide Support:</strong> Available in all programming languages',
          ],
        'uses_title' => 'ðŸ“Š Common Use Cases',
        'uses' =>
          [
            'verify' => '<strong>File Verification:</strong> Check file integrity',
            'checksum' => '<strong>Checksums:</strong> Verify downloads',
            'cache' => '<strong>Cache Keys:</strong> Generate unique identifiers',
            'integrity' => '<strong>Data Integrity:</strong> Detect changes',
          ],
        'warning_title' => 'âš ï¸ Security Warning',
        'warning_desc' => '<strong>DO NOT use MD5 for password hashing or security-critical applications!</strong> MD5 is cryptographically broken and vulnerable to collision attacks. For password hashing, use modern algorithms like bcrypt, Argon2, or PBKDF2.',
        'compare_title' => 'ðŸ”„ MD5 vs Other Hash Functions',
        'compare' =>
          [
            'md5' =>
              [
                'title' => 'MD5',
                'desc1' => '128-bit output',
                'desc2' => 'Fast but insecure for cryptography',
              ],
            'sha1' =>
              [
                'title' => 'SHA-1',
                'desc1' => '160-bit output',
                'desc2' => 'Also deprecated for security use',
              ],
            'sha256' =>
              [
                'title' => 'SHA-256',
                'desc1' => '256-bit output',
                'desc2' => 'Secure and widely used today',
              ],
          ],
        'faq_title' => 'â“ Frequently Asked Questions',
        'faq' =>
          [
            'q1' => 'Is MD5 secure for passwords?',
            'a1' => 'No! MD5 is cryptographically broken and should never be used for password hashing. Use bcrypt, Argon2, or PBKDF2 instead.',
            'q2' => 'Can I reverse an MD5 hash?',
            'a2' => 'No, MD5 is a one-way function - you cannot reverse a hash to get the original input. However, attackers can use rainbow tables to find inputs.',
            'q3' => 'Is my data sent to a server?',
            'a3' => 'No! All MD5 hash generation happens entirely in your browser using JavaScript. Your data never leaves your device.',
          ],
      ],
  ],
  'url-encoder-decoder' => [
    'meta' =>
      [
        'title' => 'Free URL Encoder & Decoder',
        'description' => 'Encode and decode URLs for safe web transmission with our free online tool.',
        'h1' => 'URL Encoder & Decoder',
        'subtitle' => 'Encode and decode URLs for safe web transmission',
      ],
    'editor' =>
      [
        'btn_encode' => 'Encode URL',
        'btn_decode' => 'Decode URL',
        'label_input_encode' => 'Enter URL to Encode',
        'label_input_decode' => 'Enter URL to Decode',
        'ph_input' => 'https://example.com/search?name=John Doe&age=30',
        'label_output_encoded' => 'Encoded URL',
        'label_output_decoded' => 'Decoded URL',
        'btn_process_encode' => 'Encode URL',
        'btn_process_decode' => 'Decode URL',
        'btn_clear' => 'Clear',
        'btn_copy' => 'Copy',
      ],
    'js' =>
      [
        'error_empty' => 'Please enter a URL to process',
        'success_encode' => 'âœ“ URL encoded successfully',
        'success_decode' => 'âœ“ URL decoded successfully',
        'error_process' => 'âœ— Error processing URL: ',
        'error_no_copy' => 'No output to copy',
        'success_copy' => 'âœ“ Copied to clipboard',
        'label_input_encode' => 'Enter URL to Encode',
        'label_input_decode' => 'Enter URL to Decode',
        'label_output_encoded' => 'Encoded URL',
        'label_output_decoded' => 'Decoded URL',
        'btn_process_encode' => 'Encode URL',
        'btn_process_decode' => 'Decode URL',
      ],
    'content' =>
      [
        'p1' => 'Our free URL Encoder & Decoder tool helps you encode special characters in URLs for safe transmission over the internet, or decode encoded URLs back to their original format. Perfect for developers, SEO professionals, and anyone working with web URLs. 100% free, client-side processing ensures your data stays private.',
        'what_title' => 'What is URL Encoding?',
        'what_desc' => 'URL encoding (also called percent-encoding) converts special characters in URLs into a format that can be transmitted over the internet. Spaces become %20, special characters like & become %26, and so on. This ensures URLs work correctly across all browsers and systems.',
        'features_title' => 'Features',
        'features' =>
          [
            'instant' =>
              [
                'title' => 'Instant Conversion',
                'desc' => 'Encode or decode URLs in milliseconds',
              ],
            'bidirectional' =>
              [
                'title' => 'Bidirectional',
                'desc' => 'Encode to URL format or decode back to original',
              ],
            'privacy' =>
              [
                'title' => 'Privacy First',
                'desc' => 'All processing happens in your browser',
              ],
            'copy' =>
              [
                'title' => 'One-Click Copy',
                'desc' => 'Copy encoded/decoded URLs instantly',
              ],
            'free' =>
              [
                'title' => '100% Free',
                'desc' => 'No limits, no registration required',
              ],
            'universal' =>
              [
                'title' => 'Universal Support',
                'desc' => 'Works with all URL formats and characters',
              ],
          ],
        'uses_title' => 'Common Use Cases',
        'uses' =>
          [
            'params' =>
              [
                'title' => 'Query Parameters',
                'desc' => 'Encode special characters in URL query strings for API calls and web requests',
              ],
            'analytics' =>
              [
                'title' => 'Analytics Tracking',
                'desc' => 'Encode UTM parameters and tracking URLs for marketing campaigns',
              ],
            'auth' =>
              [
                'title' => 'Authentication',
                'desc' => 'Encode credentials and tokens in OAuth and API authentication',
              ],
            'i18n' =>
              [
                'title' => 'Internationalization',
                'desc' => 'Encode non-ASCII characters in URLs for global compatibility',
              ],
            'seo' =>
              [
                'title' => 'SEO & Redirects',
                'desc' => 'Create properly encoded redirect URLs and canonical links',
              ],
            'email' =>
              [
                'title' => 'Email Links',
                'desc' => 'Encode mailto links with subject lines and body content',
              ],
          ],
        'how_to_title' => 'How to Use',
        'how_to' =>
          [
            'step1' =>
              [
                'title' => 'Choose Mode',
                'desc' => 'Select "Encode URL" or "Decode URL" based on your need',
              ],
            'step2' =>
              [
                'title' => 'Enter URL',
                'desc' => 'Paste your URL or text in the input field',
              ],
            'step3' =>
              [
                'title' => 'Process',
                'desc' => 'Click "Encode URL" or "Decode URL" button',
              ],
            'step4' =>
              [
                'title' => 'Copy Result',
                'desc' => 'Click "Copy" to copy the processed URL to clipboard',
              ],
            'step5' =>
              [
                'title' => 'Use Anywhere',
                'desc' => 'Paste the encoded/decoded URL in your application',
              ],
          ],
        'examples_title' => 'URL Encoding Examples',
        'examples' =>
          [
            'space' =>
              [
                'title' => 'Space Character:',
                'desc' => 'Original: "Hello World" â†’ Encoded: "Hello%20World"',
              ],
            'special' =>
              [
                'title' => 'Special Characters:',
                'desc' => 'Original: "name=John&age=30" â†’ Encoded: "name%3DJohn%26age%3D30"',
              ],
            'full' =>
              [
                'title' => 'Full URL:',
                'desc' => 'Original: "https://example.com/search?q=hello world" â†’ Encoded: "https%3A%2F%2Fexample.com%2Fsearch%3Fq%3Dhello%20world"',
              ],
          ],
        'faq_title' => 'Frequently Asked Questions',
        'faq' =>
          [
            'q1' => 'When should I encode URLs?',
            'a1' => 'Encode URLs when passing them as query parameters, storing them in databases, or when they contain special characters like spaces, &, =, ?, or non-ASCII characters.',
            'q2' => 'What characters need encoding?',
            'a2' => 'Reserved characters like : / ? # [ ] @ ! $ & \' ( ) * + , ; = and unsafe characters like spaces, <, >, ", {, }, |, \\, ^, `, and non-ASCII characters must be encoded.',
            'q3' => 'Is URL encoding the same as Base64?',
            'a3' => 'No. URL encoding converts specific characters to %XX format, while Base64 encodes entire data into a different character set. They serve different purposes.',
            'q4' => 'Can I encode entire URLs?',
            'a4' => 'Yes, but typically you only encode the query string portion. Encoding the entire URL including protocol (https://) is less common and may cause issues.',
            'q5' => 'Is my data secure?',
            'a5' => 'Yes! All encoding and decoding happens entirely in your browser using JavaScript. Your URLs never leave your device or get sent to any server.',
          ],
      ],
  ],
  'html-encoder-decoder' => [
    'meta' =>
      [
        'title' => 'Free HTML Encoder & Decoder',
        'description' => 'Encode and decode HTML entities to prevent XSS attacks with our free online tool',
        'h1' => 'HTML Encoder & Decoder',
        'subtitle' => 'Encode and decode HTML entities to prevent XSS attacks',
      ],
    'editor' =>
      [
        'mode_encode' => 'Encode HTML',
        'mode_decode' => 'Decode HTML',
        'label_input_encode' => 'Enter HTML to Encode',
        'label_input_decode' => 'Enter HTML to Decode',
        'ph_input_encode' => '<div>Hello & Welcome</div>',
        'label_output_encode' => 'Encoded HTML',
        'label_output_decode' => 'Decoded HTML',
        'ph_output' => 'Processed HTML will appear here...',
        'btn_encode' => 'Encode HTML',
        'btn_decode' => 'Decode HTML',
        'btn_clear' => 'Clear',
        'btn_copy' => 'Copy',
      ],
    'js' =>
      [
        'error_empty' => 'Please enter HTML to process',
        'success_encode' => 'âœ“ HTML encoded successfully',
        'success_decode' => 'âœ“ HTML decoded successfully',
        'error_process' => 'âœ— Error processing HTML: ',
        'error_no_copy' => 'No output to copy',
        'success_copy' => 'âœ“ Copied to clipboard',
      ],
    'content' =>
      [
        'hero_title' => 'Free HTML Encoder & Decoder',
        'hero_subtitle' => 'Encode and decode HTML entities to prevent XSS attacks',
        'p1' => 'Our free HTML Encoder & Decoder tool helps you encode special characters in HTML for safe display on web pages, or decode encoded HTML back to its original format. Perfect for developers, security professionals, and anyone working with raw HTML.',
        'what_title' => 'ðŸ”— What is HTML Encoding?',
        'what_desc' => 'HTML encoding converts characters that have special meaning in HTML (like <, >, &, ") into their corresponding HTML entities (like &lt;, &gt;, &amp;, &quot;). This prevents the browser from interpreting them as HTML tags, which is crucial for preventing Cross-Site Scripting (XSS) attacks.',
        'features_title' => 'âœ¨ Features',
        'features' =>
          [
            'fast' =>
              [
                'title' => 'Instant Conversion',
                'desc' => 'Encode or decode HTML in milliseconds',
              ],
            'bidirectional' =>
              [
                'title' => 'Bidirectional',
                'desc' => 'Encode special characters or decode entities back to text',
              ],
            'privacy' =>
              [
                'title' => 'Privacy First',
                'desc' => 'All processing happens in your browser',
              ],
            'copy' =>
              [
                'title' => 'One-Click Copy',
                'desc' => 'Copy processed HTML to clipboard instantly',
              ],
            'free' =>
              [
                'title' => '100% Free',
                'desc' => 'No limits, no registration required',
              ],
            'safe' =>
              [
                'title' => 'Security Focused',
                'desc' => 'Helps prevent XSS vulnerabilities',
              ],
          ],
        'uses_title' => 'ðŸŽ¯ Common Use Cases',
        'uses' =>
          [
            'security' =>
              [
                'title' => 'ðŸ”’ Security',
                'desc' => 'Sanitize user input to prevent XSS attacks by encoding special characters.',
              ],
            'display' =>
              [
                'title' => 'ðŸ’» Code Display',
                'desc' => 'Display raw HTML code on a webpage without it being rendered by the browser.',
              ],
            'data' =>
              [
                'title' => 'ðŸ“Š Data Storage',
                'desc' => 'Store content safely in databases without worrying about HTML parsing issues.',
              ],
            'email' =>
              [
                'title' => 'ðŸ“§ Email Templates',
                'desc' => 'Ensure special characters render correctly in HTML emails.',
              ],
          ],
        'how_title' => 'ðŸ“š How to Use',
        'how_steps' =>
          [
            1 => 'Choose "Encode HTML" or "Decode HTML" based on your need',
            2 => 'Paste your HTML or text in the input field',
            3 => 'Click the process button to convert',
            4 => 'Copy the result to clipboard',
          ],
        'examples_title' => 'ðŸ’¡ HTML Encoding Examples',
        'examples' =>
          [
            1 =>
              [
                'title' => 'Tags:',
                'code' => '<div> â†’ &lt;div&gt;',
              ],
            2 =>
              [
                'title' => 'Quotes:',
                'code' => '"Hello" â†’ &quot;Hello&quot;',
              ],
            3 =>
              [
                'title' => 'Ampersand:',
                'code' => 'Tom & Jerry â†’ Tom &amp; Jerry',
              ],
          ],
        'faq_title' => 'â“ Frequently Asked Questions',
        'faq' =>
          [
            'q1' => 'Why do I need to encode HTML?',
            'a1' => 'Encoding is essential for security to prevent the browser from executing malicious scripts (XSS) and to display code snippets correctly.',
            'q2' => 'Which characters are encoded?',
            'a2' => 'Essential characters like <, >, &, ", and \' are always encoded. Extended ASCII characters may also be encoded.',
            'q3' => 'Is it reversible?',
            'a3' => 'Yes, decoding reverses the process exactly, restoring the original text.',
          ],
      ],
  ],
  'jwt-decoder' => [
    'meta' =>
      [
        'title' => 'JWT Decoder',
        'description' => 'Decode and inspect JSON Web Tokens (JWT) - View header, payload, and signature!',
        'h1' => 'JWT Decoder',
        'subtitle' => 'Decode and inspect JSON Web Tokens (JWT) - View header, payload, and signature!',
      ],
    'editor' =>
      [
        'label_input' => 'Enter JWT Token',
        'ph_input' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...',
        'btn_decode' => 'Decode JWT',
        'btn_clear' => 'Clear',
        'btn_example' => 'Example',
        'label_payload' => 'Payload (Claims)',
        'label_signature' => 'Signature',
        'note_signature' => 'âš ï¸ Note: Signature verification requires the secret key',
      ],
    'js' =>
      [
        'error_empty' => 'Please enter a JWT token',
        'error_invalid_format' => 'Invalid JWT format. JWT should have 3 parts separated by dots.',
        'success_decode' => 'âœ“ JWT decoded successfully',
        'error_decode' => 'âœ— Error decoding JWT: ',
      ],
    'content' =>
      [
        'hero_title' => 'Free JWT Decoder Online',
        'hero_subtitle' => 'Decode and inspect JSON Web Tokens instantly',
        'p1' => 'Our free JWT Decoder tool allows you to decode and inspect JSON Web Tokens (JWT) to view their header, payload, and signature components. Perfect for debugging authentication issues, understanding token structure, and validating JWT claims.',
        'what_title' => 'ðŸ” What is JWT?',
        'what_desc' => 'JSON Web Token (JWT) is a compact, URL-safe means of representing claims between two parties. JWTs consist of three parts: Header (algorithm and token type], Payload (claims/data], and Signature (verification], separated by dots.',
        'features_title' => 'âœ¨ Features',
        'features' =>
          [
            'instant' =>
              [
                'title' => 'Instant Decoding',
                'desc' => 'Decode JWTs in milliseconds',
              ],
            'structured' =>
              [
                'title' => 'Structured View',
                'desc' => 'See header, payload, and signature separately',
              ],
            'privacy' =>
              [
                'title' => 'Privacy First',
                'desc' => 'All decoding happens in your browser',
              ],
          ],
        'uses_title' => 'ðŸŽ¯ Common Use Cases',
        'uses' =>
          [
            'debug' =>
              [
                'title' => 'ðŸ› Debugging',
                'desc' => 'Debug authentication issues by inspecting JWT contents',
              ],
            'validate' =>
              [
                'title' => 'âœ… Validation',
                'desc' => 'Verify JWT claims and expiration times',
              ],
            'learn' =>
              [
                'title' => 'ðŸ“š Learning',
                'desc' => 'Understand JWT structure and components',
              ],
            'dev' =>
              [
                'title' => 'ðŸ”§ Development',
                'desc' => 'Test JWT generation and parsing in your applications',
              ],
          ],
        'faq_title' => 'â“ Frequently Asked Questions',
        'faq' =>
          [
            'q1' => 'Is it safe to decode JWTs here?',
            'a1' => 'Yes! All decoding happens in your browser. Your JWT never leaves your device. However, never share JWTs publicly as they may contain sensitive information.',
            'q2' => 'Can this tool verify JWT signatures?',
            'a2' => 'This tool decodes and displays JWT components but doesn\'t verify signatures, as that requires the secret key which should never be shared.',
            'q3' => 'What are JWT claims?',
            'a3' => 'Claims are statements about an entity (typically the user) and additional data. Common claims include \'sub\' (subject], \'exp\' (expiration], and \'iat\' (issued at).',
          ],
      ],
  ],
  'unicode-encoder-decoder' => [
    'meta' =>
      [
        'title' => 'Free Unicode Encoder & Decoder',
        'description' => 'Encode and decode Unicode escape sequences for JavaScript and JSON with our free tool.',
        'h1' => 'Unicode Encoder & Decoder',
        'subtitle' => 'Encode and decode Unicode escape sequences for JavaScript and JSON',
      ],
    'editor' =>
      [
        'btn_encode' => 'Encode Unicode',
        'btn_decode' => 'Decode Unicode',
        'label_input_encode' => 'Enter Text to Encode',
        'label_input_decode' => 'Enter Unicode to Decode',
        'ph_input' => 'Hello ä¸–ç•Œ',
        'label_output_encoded' => 'Encoded Unicode',
        'label_output_decoded' => 'Decoded Text',
        'btn_process_encode' => 'Encode Unicode',
        'btn_process_decode' => 'Decode Unicode',
        'btn_clear' => 'Clear',
        'btn_copy' => 'Copy',
      ],
    'js' =>
      [
        'error_empty' => 'Please enter text to process',
        'success_encode' => 'âœ“ Unicode encoded successfully',
        'success_decode' => 'âœ“ Unicode decoded successfully',
        'error_process' => 'âœ— Error processing Unicode: ',
        'error_no_copy' => 'No output to copy',
        'success_copy' => 'âœ“ Copied to clipboard',
        'label_input_encode' => 'Enter Text to Encode',
        'label_input_decode' => 'Enter Unicode to Decode',
        'label_output_encoded' => 'Encoded Unicode',
        'label_output_decoded' => 'Decoded Text',
        'btn_process_encode' => 'Encode Unicode',
        'btn_process_decode' => 'Decode Unicode',
      ],
    'content' =>
      [
        'p1' => 'Our free Unicode Encoder & Decoder tool helps you encode text into Unicode escape sequences (e.g., \\u0041) for safe use in JavaScript, JSON, and other programming contexts, or decode them back to readable text. Perfect for developers, data analysts, and anyone dealing with international character sets. 100% free, client-side processing ensures your data stays private.',
        'what_title' => 'What is Unicode Encoding?',
        'what_desc' => 'Unicode encoding converts characters into their corresponding Unicode code points, often represented as escape sequences like \\uXXXX. This ensures that text containing special characters, emojis, or non-Latin scripts can be safely represented in environments that typically support only ASCII, such as source code files or JSON data.',
        'features_title' => 'Features',
        'features' =>
          [
            'instant' =>
              [
                'title' => 'Instant Conversion',
                'desc' => 'Encode or decode Unicode in milliseconds',
              ],
            'bidirectional' =>
              [
                'title' => 'Bidirectional',
                'desc' => 'Encode to Unicode format or decode back to original',
              ],
            'privacy' =>
              [
                'title' => 'Privacy First',
                'desc' => 'All processing happens in your browser',
              ],
            'copy' =>
              [
                'title' => 'One-Click Copy',
                'desc' => 'Copy encoded/decoded text instantly',
              ],
            'free' =>
              [
                'title' => '100% Free',
                'desc' => 'No limits, no registration required',
              ],
            'universal' =>
              [
                'title' => 'Universal Support',
                'desc' => 'Works with all Unicode characters and scripts',
              ],
          ],
        'uses_title' => 'Common Use Cases',
        'uses' =>
          [
            'programming' =>
              [
                'title' => 'Programming',
                'desc' => 'Embed special characters in JavaScript or Java source code safely',
              ],
            'data' =>
              [
                'title' => 'Data Serialization',
                'desc' => 'Ensure safe transmission of non-ASCII characters in JSON',
              ],
            'international' =>
              [
                'title' => 'Internationalization',
                'desc' => 'Debug and display text in various languages and scripts',
              ],
            'security' =>
              [
                'title' => 'Security',
                'desc' => 'Analyze obfuscated code or data containing Unicode escapes',
              ],
          ],
        'how_to_title' => 'How to Use',
        'how_to' =>
          [
            'step1' =>
              [
                'title' => 'Choose Mode',
                'desc' => 'Select "Encode Unicode" or "Decode Unicode" based on your need',
              ],
            'step2' =>
              [
                'title' => 'Enter Text',
                'desc' => 'Paste your text or Unicode escapes in the input field',
              ],
            'step3' =>
              [
                'title' => 'Process',
                'desc' => 'Click the encode or decode button',
              ],
            'step4' =>
              [
                'title' => 'Copy Result',
                'desc' => 'Click "Copy" to copy the processed text to clipboard',
              ],
            'step5' =>
              [
                'title' => 'Use Anywhere',
                'desc' => 'Paste the result in your code or application',
              ],
          ],
        'examples_title' => 'Unicode Examples',
        'examples' =>
          [
            'simple' =>
              [
                'title' => 'Simple/ASCII:',
                'desc' => 'Original: "A" â†’ Encoded: "\\u0041"',
              ],
            'special' =>
              [
                'title' => 'Special Characters:',
                'desc' => 'Original: "Â©" â†’ Encoded: "\\u00A9"',
              ],
            'emoji' =>
              [
                'title' => 'Emojis/Multi-byte:',
                'desc' => 'Original: "ðŸŒŸ" â†’ Encoded: "\\uD83C\\uDF1F" (surrogate pairs) or "\\u2B50" depending on representation',
              ],
          ],
        'faq_title' => 'Frequently Asked Questions',
        'faq' =>
          [
            'q1' => 'Why use Unicode escape sequences?',
            'a1' => 'They allow you to represent any character using only ASCII characters, which ensures compatibility across different systems, encodings, and file transfers that might not handle raw Unicode correctly.',
            'q2' => 'What format is used?',
            'a2' => 'This tool typically uses the JavaScript/JSON style \\uXXXX format for Basic Multilingual Plane characters.',
            'q3' => 'Is this different from URL encoding?',
            'a3' => 'Yes. URL encoding uses %XX hex values mainly for URLs. Unicode escaping uses \\uXXXX and is used in strings in programming languages like JavaScript, Java, and Python.',
            'q4' => 'Is my data secure?',
            'a4' => 'Yes! All encoding and decoding happens entirely in your browser using JavaScript. Your text never leaves your device.',
          ],
      ],
  ],
  'json-to-sql-converter' => [
    'meta' => [
      'title' => 'JSON to SQL Converter',
      'description' => 'Transform JSON data into SQL INSERT statements for database population.',
      'h1' => 'JSON to SQL Converter',
      'subtitle' => 'Create SQL scripts from JSON data',
    ],
    'editor' => [
      'btn_convert' => 'Generate SQL',
    ],
    'content' => [
      'features_title' => 'Features',
    ],
  ],
];

