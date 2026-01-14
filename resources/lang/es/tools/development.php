<?php

return array (
  'rgb-hex-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Convertidor de Color RGB a HEX',
      'subtitle' => 'Convierte colores entre formatos RGB y HEX al instante con nuestra herramienta gratuita de conversiÃ³n de colores en lÃ­nea.',
      'title' => 'RGB to HEX Color Convertirer',
      'description' => 'Convertir colors between RGB and HEX formats InstantÃ¡neoly with live preview.',
    ),
    'editor' => 
    array (
      'rgb_to_hex' => 'RGB a HEX',
      'label_red' => 'Rojo (0-255)',
      'label_green' => 'Verde (0-255)',
      'label_blue' => 'Azul (0-255)',
      'label_hex' => 'Color HEX',
      'hex_to_rgb' => 'HEX a RGB',
      'label_hex_input' => 'Color HEX',
      'label_rgb_output' => 'Color RGB',
      'ph_hex' => '#FF0000',
    ),
    'js' => 
    array (
      'invalid_hex' => 'HEX invÃ¡lido',
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
      'title' => 'Formateador JSON',
      'description' => 'Formatea, valida y minifica tus datos JSON con nuestra herramienta gratuita en lÃ­nea',
      'h1' => 'Formateador JSON',
      'subtitle' => 'Formatea, valida y minifica tus datos JSON',
    ),
    'editor' => 
    array (
      'title' => 'Formatea tus Datos JSON',
      'label_input' => 'Ingresa Datos JSON',
      'ph_input' => '{"nombre": "Juan PÃ©rez", "edad": 30, "ciudad": "Nueva York"}',
      'help_text' => 'Pega tus datos JSON para formatear, embellecer o minificar',
      'btn_format' => 'Formatear y Embellecer',
      'btn_minify' => 'Minificar JSON',
      'label_results' => 'JSON Formateado',
      'btn_copy' => 'Copiar JSON',
    ),
    'js' => 
    array (
      'error_empty_format' => 'Por favor ingresa datos JSON para formatear',
      'error_empty_minify' => 'Por favor ingresa datos JSON para minificar',
      'error_invalid' => 'JSON invÃ¡lido: ',
      'success_copy' => 'Â¡Copiado!',
      'error_copy' => 'Error al copiar. Por favor copia manualmente.',
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
      'title' => 'Base64 Codificarr & Decodificarr',
      'description' => 'Codificar and Decodificar Base64 data InstantÃ¡neoly with our Gratis online tool',
      'h1' => 'Base64 Codificarr & Decodificarr',
      'subtitle' => 'Codificar and Decodificar Base64 data InstantÃ¡neoly',
    ),
    'editor' => 
    array (
      'tab_encode' => 'Codificar to Base64',
      'tab_decode' => 'Decodificar from Base64',
      'label_encode' => 'Enter Text to Codificar',
      'desc_encode' => 'Enter any text to Convertir it to Base64 format',
      'ph_encode' => 'Enter your text here...',
      'btn_encode' => 'Codificar to Base64',
      'label_decode' => 'Enter Base64 to Decodificar',
      'desc_decode' => 'Enter Base64 Codificard text to Decodificar it back to plain text',
      'ph_decode' => 'Enter Base64 Codificard string...',
      'btn_decode' => 'Decodificar from Base64',
      'result_title' => 'Result',
      'btn_copy' => 'Copy Result',
    ),
    'js' => 
    array (
      'error_empty_encode' => 'Please enter text to Codificar',
      'error_encoding' => 'Error encoding text: ',
      'error_empty_decode' => 'Please enter Base64 string to Decodificar',
      'error_invalid' => 'Invalid Base64 string. Please check your input.',
      'copied' => 'Copied!',
    ),
    'content' => 
    array (
      'what_title' => 'What is Base64 Encoding?',
      'what_desc' => 'Base64 is a Binario-to-text encoding scheme that represents Binario data in an ASCII string format. It\'s commonly used to Codificar data that needs to be stored or transferred over media designed to handle text. Our Gratis Base64 Codificarr and Decodificarr tool allows developers, data analysts, and IT professionals to RÃ¡pidoly Convertir text to Base64 or Decodificar Base64 strings back to readable text. Perfect for API development, data transmission, email attachments, embedding images in HTML/CSS, and handling Binario data in JSON.',
      'features' => 
      array (
        'secure' => 
        array (
          'title' => 'Seguro Encoding',
          'desc' => 'All processing happens in your browser - your data never leaves your computer',
        ),
        'instant' => 
        array (
          'title' => 'InstantÃ¡neo Conversion',
          'desc' => 'Codificar or Decodificar Base64 data in milliseconds with client-side processing',
        ),
        'easy' => 
        array (
          'title' => 'FÃ¡cil to Use',
          'desc' => 'Simple tabbed interface for encoding and decoding with one-click copy',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Use Base64 Codificarr/Decodificarr',
        'encode' => 
        array (
          'title' => 'Encoding Text',
          'step1' => 'Click the "Codificar to Base64" tab',
          'step2' => 'Paste or type your text in the input area',
          'step3' => 'Click "Codificar to Base64" button',
          'step4' => 'Copy the Base64 Codificard result',
        ),
        'decode' => 
        array (
          'title' => 'Decoding Base64',
          'step1' => 'Click the "Decodificar from Base64" tab',
          'step2' => 'Paste your Base64 string in the input area',
          'step3' => 'Click "Decodificar from Base64" button',
          'step4' => 'Copy the Decodificard plain text result',
        ),
      ),
      'uses' => 
      array (
        'title' => 'Common Base64 Use Cases',
        'api' => 
        array (
          'title' => 'API Authentication',
          'desc' => 'Codificar credentials for Basic Authentication in HTTP headers and API requests.',
        ),
        'data_uri' => 
        array (
          'title' => 'Data URIs',
          'desc' => 'Embed images, fonts, and files directly in HTML, CSS, or JSON using Base64 data URIs.',
        ),
        'email' => 
        array (
          'title' => 'Email Attachments',
          'desc' => 'Codificar Binario attachments in MIME email messages for safe transmission.',
        ),
        'storage' => 
        array (
          'title' => 'Data Storage',
          'desc' => 'Store Binario data in text-based formats like JSON, XML, or databases.',
        ),
      ),
      'bottom' => 
      array (
        'h1' => 'Base64 Codificarr & Decodificarr',
        'subtitle' => 'Codificar and Decodificar Base64 data InstantÃ¡neoly',
        'desc' => 'Base64 is a Binario-to-text encoding scheme that Convertirs Binario data into ASCII text format. Our Gratis Base64 Codificarr & Decodificarr helps developers, system administrators, and IT professionals Codificar text to Base64 or Decodificar Base64 back to readable text InstantÃ¡neoly. Perfect for API authentication, data URIs, email attachments, and Seguro data transmission. All processing happens in your browser for complete Privacidad.',
        'works_title' => 'ðŸ”„ How Base64 Works',
        'works_encoding' => 'Convertirs Binario data to ASCII text using 64 characters',
        'works_encoding_sub' => 'A-Z, a-z, 0-9, +, / (and = for padding)',
        'works_decoding' => 'Convertirs Base64 text back to original Binario data',
        'works_decoding_sub' => 'Reverses the encoding process perfectly',
        'cases_title' => 'âœ… Common Use Cases',
        'case_api' => 'API Authentication',
        'case_api_desc' => 'Codificar credentials for Basic Auth in HTTP headers',
        'case_uri' => 'Data URIs',
        'case_uri_desc' => 'Embed images and files directly in HTML/CSS',
        'case_email' => 'Email Attachments',
        'case_email_desc' => 'Codificar Binario files for email transmission',
        'case_url' => 'URL Parameters',
        'case_url_desc' => 'Safely pass Binario data in URLs',
        'case_storage' => 'Data Storage',
        'case_storage_desc' => 'Store Binario data in text-only databases',
        'case_web' => 'Web Development',
        'case_web_desc' => 'Codificar JSON, XML, and configuration files',
        'best_practices_title' => 'ðŸ’¡ Base64 Best Practices',
        'best_practices_list' => 
        array (
          0 => 'Base64 increases data size by approximately 33%',
          1 => 'Not suitable for encryption - use proper encryption algorithms',
          2 => 'Perfect for encoding Binario data in text-only systems',
          3 => 'Always validate Decodificard data before using it',
          4 => 'Use URL-safe Base64 for URLs (replaces +/= with -_)',
        ),
      ),
      'faq' => 
      array (
        'title' => 'â“ Frequently Asked Questions',
        'q1' => 'Is Base64 encoding Seguro?',
        'a1' => 'No! Base64 is NOT encryption - it\'s simply encoding. Anyone can Decodificar Base64 data InstantÃ¡neoly. Never use Base64 alone for security. For encryption, use proper cryptographic algorithms like AES, RSA, or TLS/SSL.',
        'q2' => 'Why does Base64 increase file size?',
        'a2' => 'Base64 encoding increases data size by approximately 33% because it represents 3 bytes of Binario data using 4 ASCII characters. This overhead is the trade-off for making Binario data safe for text-only systems.',
        'q3' => 'What is Base64 used for?',
        'a3' => 'Base64 is used for encoding Binario data (images, files, credentials) into ASCII text for transmission over text-only systems like email, URLs, JSON, XML, and HTTP headers. It\'s essential for API authentication, data URIs, and email attachments.',
        'q4' => 'Is my data sent to a server?',
        'a4' => 'No! All Base64 encoding and decoding happens entirely in your browser using JavaScript. Your data never leaves your device and is not stored, transmitted, or logged anywhere. Your Privacidad is completely protected.',
        'q5' => 'Can I Codificar images to Base64?',
        'a5' => 'Yes! While our tool Codificars text, you can Codificar images using specialized tools. Base64-Codificard images can be embedded directly in HTML/CSS using data URIs (data:image/png;base64,...). This is useful for small images but increases page size.',
      ),
    ),
  ),
  'html-viewer' => 
  array (
    'meta' => 
    array (
      'title' => 'Visor HTML',
      'description' => 'Previsualiza cÃ³digo HTML en tiempo real con nuestro visor HTML gratuito en lÃ­nea',
      'h1' => 'Visor HTML',
      'subtitle' => 'Previsualiza cÃ³digo HTML en tiempo real',
    ),
    'editor' => 
    array (
      'label_input' => 'CÃ³digo HTML',
      'ph_input' => 'Ingresa tu cÃ³digo HTML aquÃ­...',
      'label_preview' => 'Vista Previa en Vivo',
      'btn_clear' => 'Limpiar',
      'btn_load_sample' => 'Cargar Ejemplo',
      'btn_fullscreen' => 'Pantalla Completa',
      'btn_exit_fullscreen' => 'Salir de Pantalla Completa',
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
      'h1' => 'Analizador y Validador JSON',
      'subtitle' => 'Analiza, valida y visualiza la estructura JSON',
      'title' => 'JSON Parser & Validator',
      'description' => 'Parse, validate, and visualize JSON structure',
    ),
    'editor' => 
    array (
      'label_input' => 'Entrada JSON',
      'ph_input' => '{"nombre": "Juan PÃ©rez", "edad": 30, "activo": true}',
      'btn_parse' => 'Analizar JSON',
      'btn_beautify' => 'Embellecer',
      'btn_minify' => 'Minificar',
      'btn_clear' => 'Limpiar',
      'btn_load' => 'Cargar Ejemplo',
      'title_tree' => 'Vista de Ãrbol JSON',
    ),
    'js' => 
    array (
      'error_empty_parse' => 'Por favor ingresa datos JSON para analizar',
      'error_empty_beautify' => 'Por favor ingresa datos JSON para embellecer',
      'error_empty_minify' => 'Por favor ingresa datos JSON para minificar',
      'success_valid' => 'âœ“ Â¡JSON vÃ¡lido! Analizado exitosamente',
      'error_invalid' => 'âœ— JSON invÃ¡lido: ',
      'success_beautify' => 'âœ“ JSON embellecido exitosamente',
      'error_beautify' => 'âœ— No se puede embellecer JSON invÃ¡lido: ',
      'success_minify' => 'âœ“ JSON minificado exitosamente',
      'error_minify' => 'âœ— No se puede minificar JSON invÃ¡lido: ',
      'success_load' => 'Ejemplo JSON cargado',
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
      'title' => 'Formateador de CÃ³digo en LÃ­nea Gratis',
      'description' => 'Embellece y formatea tu cÃ³digo al instante - soporta HTML, CSS, JavaScript, JSON, XML, SQL, PHP',
      'h1' => 'Formateador de CÃ³digo en LÃ­nea',
      'subtitle' => 'Embellece y formatea tu cÃ³digo al instante',
    ),
    'editor' => 
    array (
      'label_input' => 'CÃ³digo de Entrada',
      'ph_input' => '// Pega tu cÃ³digo aquÃ­...',
      'label_language' => 'Lenguaje',
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
      'label_indent' => 'IndentaciÃ³n',
      'indents' => 
      array (
        2 => '2 Espacios',
        4 => '4 Espacios',
        'tab' => 'TabulaciÃ³n',
      ),
      'btn_format' => 'Formatear CÃ³digo',
      'btn_clear' => 'Limpiar',
      'btn_copy' => 'Copiar',
      'label_output' => 'CÃ³digo Formateado',
      'ph_output' => '// El cÃ³digo formateado aparecerÃ¡ aquÃ­...',
    ),
    'js' => 
    array (
      'error_empty' => 'Por favor pega cÃ³digo para formatear',
      'success_format' => 'âœ“ Â¡CÃ³digo formateado exitosamente!',
      'error_format' => 'Error al formatear cÃ³digo: ',
      'no_copy' => 'No hay cÃ³digo para copiar',
      'success_copy' => 'âœ“ Â¡Copiado al portapapeles!',
    ),
    'content' => 
    array (
      'hero_title' => 'Formateador de CÃ³digo en LÃ­nea Gratis',
      'hero_subtitle' => 'Embellece y formatea tu cÃ³digo al instante con nuestro formateador avanzado. Soporta HTML, CSS, JavaScript, JSON, XML, SQL y PHP.',
      'p1' => 'Limpia cÃ³digo desordenado y mejora la legibilidad con nuestro formateador de cÃ³digo gratuito en lÃ­nea. Ya sea que tengas cÃ³digo minificado que necesita embellecerse o solo quieras estandarizar la indentaciÃ³n, nuestra herramienta lo maneja todo instantÃ¡neamente en tu navegador.',
      'features_title' => 'âœ¨ CaracterÃ­sticas Clave',
      'features' => 
      array (
        'multi' => 
        array (
          'title' => 'Soporte Multi-Lenguaje',
          'desc' => 'Soporta los principales lenguajes de programaciÃ³n incluyendo HTML, CSS, JS, JSON y mÃ¡s',
        ),
        'indent' => 
        array (
          'title' => 'IndentaciÃ³n Personalizada',
          'desc' => 'Elige entre 2 espacios, 4 espacios o tabulaciones para tu estilo preferido',
        ),
        'instant' => 
        array (
          'title' => 'Embellecimiento InstantÃ¡neo',
          'desc' => 'Formatea cÃ³digo instantÃ¡neamente sin recargas de pÃ¡gina',
        ),
        'privacy' => 
        array (
          'title' => 'Enfocado en Privacidad',
          'desc' => 'El procesamiento de cÃ³digo ocurre en tu navegador - no se almacenan datos',
        ),
      ),
      'langs_title' => 'ðŸ’» Lenguajes Soportados',
      'langs' => 
      array (
        'web' => 
        array (
          'title' => 'TecnologÃ­as Web',
          'desc' => 'HTML5, CSS3, JavaScript (ES6+)',
        ),
        'data' => 
        array (
          'title' => 'Formatos de Datos',
          'desc' => 'JSON, XML',
        ),
        'backend' => 
        array (
          'title' => 'Backend',
          'desc' => 'PHP, SQL',
        ),
      ),
      'why_title' => 'ðŸ¤” Â¿Por QuÃ© Formatear CÃ³digo?',
      'why' => 
      array (
        'read' => 
        array (
          'title' => 'Legibilidad',
          'desc' => 'El cÃ³digo correctamente indentado es mÃ¡s fÃ¡cil de leer, entender y mantener.',
        ),
        'debug' => 
        array (
          'title' => 'DepuraciÃ³n',
          'desc' => 'Encuentra errores mÃ¡s rÃ¡pido en cÃ³digo bien estructurado comparado con cadenas minificadas.',
        ),
        'collab' => 
        array (
          'title' => 'ColaboraciÃ³n',
          'desc' => 'El estilo de cÃ³digo estÃ¡ndar ayuda a los equipos a trabajar juntos mÃ¡s eficientemente.',
        ),
      ),
      'faq_title' => 'â“ Preguntas Frecuentes',
      'faq' => 
      array (
        'q1' => 'Â¿Mi cÃ³digo estÃ¡ seguro?',
        'a1' => 'Â¡SÃ­! Todo el formateo de cÃ³digo se realiza usando JavaScript directamente en tu navegador. Tu cÃ³digo nunca se envÃ­a a nuestros servidores.',
        'q2' => 'Â¿Puedo formatear cÃ³digo minificado?',
        'a2' => 'Â¡Absolutamente! Nuestro embellecedor es perfecto para des-minificar cÃ³digo y hacerlo legible nuevamente.',
        'q3' => 'Â¿Corrige errores de sintaxis?',
        'a3' => 'El formateador se enfoca en diseÃ±o e indentaciÃ³n. Aunque puede manejar algunos problemas bÃ¡sicos de estructura, no corrige errores de sintaxis.',
        'q4' => 'Â¿Hay un lÃ­mite en el tamaÃ±o del cÃ³digo?',
        'a4' => 'Dado que el procesamiento se realiza en tu dispositivo, el lÃ­mite depende de la memoria de tu navegador. Puede manejar fÃ¡cilmente archivos con miles de lÃ­neas.',
      ),
    ),
  ),
  'css-minifier' => 
  array (
    'meta' => 
    array (
      'title' => 'Minificador y Embellecedor CSS Gratis',
      'description' => 'Optimiza archivos CSS para cargas mÃ¡s rÃ¡pidas - minifica y embellece CSS al instante',
      'h1' => 'Minificador y Embellecedor CSS',
      'subtitle' => 'Optimiza archivos CSS para cargas mÃ¡s rÃ¡pidas',
    ),
    'editor' => 
    array (
      'label_input' => 'Entrada CSS',
      'ph_input' => 'Pega tu cÃ³digo CSS aquÃ­...',
      'btn_minify' => 'Minificar CSS',
      'btn_beautify' => 'Embellecer CSS',
      'btn_clear' => 'Limpiar',
      'btn_copy' => 'Copiar',
      'label_output' => 'Salida CSS',
      'ph_output' => 'El CSS procesado aparecerÃ¡ aquÃ­...',
      'stats' => 
      array (
        'original' => 'TamaÃ±o Original',
        'minified' => 'TamaÃ±o Minificado',
        'saved' => 'Ahorrado',
        'compression' => 'CompresiÃ³n',
      ),
    ),
    'js' => 
    array (
      'error_empty' => 'Por favor ingresa cÃ³digo CSS para procesar',
      'success_minify' => 'âœ“ CSS minificado exitosamente',
      'success_beautify' => 'âœ“ CSS embellecido exitosamente',
      'error_process' => 'âœ— Error al procesar CSS: ',
      'no_copy' => 'No hay CSS para copiar',
      'success_copy' => 'âœ“ CSS copiado al portapapeles',
    ),
    'content' => 
    array (
      'hero_title' => 'Minificador y Embellecedor CSS Gratis',
      'hero_subtitle' => 'Optimiza archivos CSS para cargas de pÃ¡gina mÃ¡s rÃ¡pidas y mejor rendimiento',
      'p1' => 'Nuestro Minificador CSS gratuito comprime archivos CSS eliminando espacios en blanco, comentarios y caracteres innecesarios, reduciendo significativamente el tamaÃ±o del archivo y mejorando los tiempos de carga del sitio web. Perfecto para desarrolladores web, diseÃ±adores y cualquiera que optimice el rendimiento del sitio web. TambiÃ©n incluye un embellecedor CSS para formatear y organizar tus hojas de estilo para mejor legibilidad. 100% gratuito, el procesamiento del lado del cliente asegura que tu cÃ³digo permanezca privado.',
      'what_title' => 'ðŸŽ¨ Â¿QuÃ© es la MinificaciÃ³n CSS?',
      'what_desc' => 'La minificaciÃ³n CSS es el proceso de eliminar caracteres innecesarios del cÃ³digo CSS sin cambiar su funcionalidad. Esto incluye espacios en blanco, saltos de lÃ­nea, comentarios y cÃ³digo redundante. Los archivos CSS minificados son mÃ¡s pequeÃ±os, cargan mÃ¡s rÃ¡pido y mejoran el rendimiento del sitio web. Es una tÃ©cnica de optimizaciÃ³n esencial para sitios web de producciÃ³n.',
      'features_title' => 'âœ¨ CaracterÃ­sticas',
      'features' => 
      array (
        'minify' => 
        array (
          'title' => 'MinificaciÃ³n CSS',
          'desc' => 'Comprime CSS eliminando espacios en blanco y comentarios',
        ),
        'beautify' => 
        array (
          'title' => 'Embellecimiento CSS',
          'desc' => 'Formatea CSS con indentaciÃ³n y espaciado apropiados',
        ),
        'stats' => 
        array (
          'title' => 'EstadÃ­sticas de CompresiÃ³n',
          'desc' => 'Ve la reducciÃ³n de tamaÃ±o de archivo y tasa de compresiÃ³n',
        ),
        'instant' => 
        array (
          'title' => 'Procesamiento InstantÃ¡neo',
          'desc' => 'Minifica o embellece CSS en milisegundos',
        ),
        'privacy' => 
        array (
          'title' => 'Privacidad Primero',
          'desc' => 'Todo el procesamiento ocurre en tu navegador',
        ),
        'copy' => 
        array (
          'title' => 'Copia de Un Clic',
          'desc' => 'Copia CSS minificado al portapapeles al instante',
        ),
      ),
      'benefits_title' => 'ðŸŽ¯ Beneficios de la MinificaciÃ³n CSS',
      'benefits' => 
      array (
        'speed' => 
        array (
          'title' => 'âš¡ Cargas de PÃ¡gina MÃ¡s RÃ¡pidas',
          'desc' => 'Archivos CSS mÃ¡s pequeÃ±os descargan mÃ¡s rÃ¡pido, mejorando tiempos de carga y experiencia de usuario',
        ),
        'bandwidth' => 
        array (
          'title' => 'ðŸ’° Ancho de Banda Reducido',
          'desc' => 'Menor uso de ancho de banda ahorra costos de hosting y datos mÃ³viles para usuarios',
        ),
        'seo' => 
        array (
          'title' => 'ðŸ“ˆ Mejor SEO',
          'desc' => 'Sitios mÃ¡s rÃ¡pidos rankean mejor en motores de bÃºsqueda, mejorando visibilidad',
        ),
        'performance' => 
        array (
          'title' => 'ðŸŽ¯ Rendimiento Mejorado',
          'desc' => 'CSS optimizado reduce tiempo de anÃ¡lisis del navegador y retrasos de renderizado',
        ),
        'mobile' => 
        array (
          'title' => 'ðŸ“± OptimizaciÃ³n MÃ³vil',
          'desc' => 'Crucial para usuarios mÃ³viles con ancho de banda limitado y conexiones mÃ¡s lentas',
        ),
        'production' => 
        array (
          'title' => 'ðŸ”§ Listo para ProducciÃ³n',
          'desc' => 'CSS minificado es prÃ¡ctica estÃ¡ndar para despliegues de producciÃ³n',
        ),
      ),
      'how_title' => 'ðŸ“š CÃ³mo Usar',
      'how_steps' => 
      array (
        1 => '<strong>Pega CSS:</strong> Copia y pega tu cÃ³digo CSS en el campo de entrada',
        2 => '<strong>Elige AcciÃ³n:</strong> Haz clic en "Minificar CSS" para comprimir o "Embellecer CSS" para formatear',
        3 => '<strong>Ve Resultados:</strong> Ve el CSS procesado en el campo de salida con estadÃ­sticas de compresiÃ³n',
        4 => '<strong>Copiar:</strong> Haz clic en "Copiar" para copiar el CSS minificado a tu portapapeles',
        5 => '<strong>Usar en ProducciÃ³n:</strong> Reemplaza tu archivo CSS original con la versiÃ³n minificada',
      ),
      'best_practices_title' => 'ðŸ’¡ Mejores PrÃ¡cticas',
      'best_practices_list' => 
      array (
        1 => '<strong>Mantener archivos fuente:</strong> Siempre mantÃ©n versiones legibles, no minificadas para desarrollo',
        2 => '<strong>Minificar para producciÃ³n:</strong> Solo usa CSS minificado en entornos de producciÃ³n',
        3 => '<strong>Combinar archivos:</strong> Fusiona mÃºltiples archivos CSS antes de minificar para mejor compresiÃ³n',
        4 => '<strong>Probar exhaustivamente:</strong> Siempre prueba CSS minificado para asegurar que no se rompa funcionalidad',
        5 => '<strong>Usar herramientas de construcciÃ³n:</strong> Integra minificaciÃ³n en tu proceso de construcciÃ³n para automatizaciÃ³n',
      ),
      'faq_title' => 'â“ Preguntas Frecuentes',
      'faq' => 
      array (
        'q1' => 'Â¿CuÃ¡nto puede reducir la minificaciÃ³n CSS el tamaÃ±o del archivo?',
        'a1' => 'TÃ­picamente 20-40% de reducciÃ³n, dependiendo de tu estructura CSS. Archivos con muchos comentarios y espacios en blanco ven mayores ahorros. Combinado con compresiÃ³n gzip, puedes lograr 70-80% de reducciÃ³n total.',
        'q2' => 'Â¿La minificaciÃ³n romperÃ¡ mi CSS?',
        'a2' => 'Â¡No! La minificaciÃ³n solo elimina caracteres innecesarios mientras preserva funcionalidad. Sin embargo, siempre prueba tu CSS minificado para asegurar que todo funcione como se espera.',
        'q3' => 'Â¿Debo minificar CSS para desarrollo?',
        'a3' => 'No. MantÃ©n CSS legible durante desarrollo para depuraciÃ³n mÃ¡s fÃ¡cil. Solo minifica para despliegues de producciÃ³n. Usa CSS embellecido durante desarrollo y pruebas.',
        'q4' => 'Â¿Puedo revertir la minificaciÃ³n?',
        'a4' => 'Â¡SÃ­! Usa nuestra funciÃ³n "Embellecer CSS" para formatear CSS minificado de vuelta a un formato legible. Sin embargo, los comentarios se eliminan permanentemente durante la minificaciÃ³n.',
        'q5' => 'Â¿Mis datos CSS estÃ¡n seguros?',
        'a5' => 'Â¡Absolutamente! Todo el procesamiento ocurre completamente en tu navegador. Tu cÃ³digo CSS nunca sale de tu dispositivo y no se envÃ­a a ningÃºn servidor.',
      ),
    ),
  ),
  'js-minifier' => 
  array (
    'meta' => 
    array (
      'title' => 'Minificador de JavaScript',
      'description' => 'Comprime y optimiza tu cÃ³digo JavaScript para cargas de pÃ¡gina mÃ¡s rÃ¡pidas',
      'h1' => 'Minificador de JavaScript',
      'subtitle' => 'Comprime y optimiza tu cÃ³digo JavaScript',
    ),
    'editor' => 
    array (
      'label_input' => 'Entrada JavaScript',
      'ph_input' => 'Pega tu cÃ³digo JavaScript aquÃ­...',
      'btn_minify' => 'Minificar JS',
      'btn_beautify' => 'Embellecer JS',
      'btn_clear' => 'Limpiar',
      'btn_copy' => 'Copiar Salida',
      'label_output' => 'Salida JavaScript',
    ),
    'js' => 
    array (
      'error_empty' => 'Por favor ingresa cÃ³digo JavaScript',
      'success_minify' => 'âœ“ Â¡JavaScript minificado exitosamente!',
      'success_beautify' => 'âœ“ Â¡JavaScript embellecido exitosamente!',
      'error_no_copy' => 'No hay salida para copiar',
      'success_copy' => 'âœ“ Â¡Copiado al portapapeles!',
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
      'title' => 'Minificador y Embellecedor HTML Gratis',
      'description' => 'Comprime o formatea cÃ³digo HTML al instante - minifica para producciÃ³n o embellece para desarrollo',
      'h1' => 'Minificador y Embellecedor HTML',
      'subtitle' => 'Comprime o formatea cÃ³digo HTML al instante',
    ),
    'editor' => 
    array (
      'label_input' => 'Entrada HTML',
      'ph_input' => 'Pega tu cÃ³digo HTML aquÃ­...',
      'btn_minify' => 'Minificar HTML',
      'btn_beautify' => 'Embellecer HTML',
      'btn_clear' => 'Limpiar',
      'btn_copy' => 'Copiar Salida',
      'label_output' => 'Salida HTML',
    ),
    'js' => 
    array (
      'error_empty' => 'Por favor ingresa cÃ³digo HTML',
      'success_minify' => 'âœ“ Â¡HTML minificado exitosamente!',
      'success_beautify' => 'âœ“ Â¡HTML embellecido exitosamente!',
      'error_no_copy' => 'No hay salida para copiar',
      'success_copy' => 'âœ“ Â¡Copiado al portapapeles!',
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
      'title' => 'Formateador de XML',
      'description' => 'Formatea, embellece y minifica datos XML con nuestra herramienta gratuita en lÃ­nea',
      'h1' => 'Formateador de XML',
      'subtitle' => 'Formatea, embellece y minifica datos XML',
    ),
    'editor' => 
    array (
      'label_input' => 'Entrada XML',
      'ph_input' => '<root><child>valor</child></root>',
      'btn_format' => 'Formatear / Embellecer',
      'btn_minify' => 'Minificar',
      'btn_copy' => 'Copiar',
    ),
    'js' => 
    array (
      'success_format' => 'Â¡XML Formateado Exitosamente!',
      'error_invalid' => 'XML invÃ¡lido',
      'success_minify' => 'Â¡XML Minificado!',
      'success_copy' => 'Â¡Copiado al portapapeles!',
    ),
  ),
  'file-difference-checker' => 
  array (
    'meta' => 
    array (
      'title' => 'Calculadora de Diferencia de Precios',
      'description' => 'Calcula diferencias de precios y cambios porcentuales al instante',
      'h1' => 'Verificador de Diferencias de Archivos',
      'subtitle' => 'Calcula diferencias de precios y cambios porcentuales al instante',
    ),
    'editor' => 
    array (
      'original_price' => 'Precio Original',
      'new_price' => 'Nuevo Precio',
      'ph_original' => 'Ej: 100',
      'ph_new' => 'Ej: 120',
      'btn_calculate' => 'Calcular Diferencia',
      'result_label' => 'Resultado',
      'increase' => 'Aumento',
      'decrease' => 'DisminuciÃ³n',
      'no_change' => 'Sin Cambios',
    ),
    'js' => 
    array (
      'error_empty' => 'Por favor ingresa ambos precios para calcular',
      'error_invalid' => 'Por favor ingresa nÃºmeros vÃ¡lidos para los precios',
    ),
    'content' => 
    array (
      'hero_title' => 'Calculadora de Diferencia de Precios',
      'hero_subtitle' => 'Calcula diferencias de precios y cambios porcentuales al instante',
      'p1' => 'Nuestra Calculadora de Diferencia de Precios gratuita te permite comparar dos precios y determinar la diferencia absoluta y el cambio porcentual. Ya sea que estÃ©s analizando tendencias de precios, comparando ofertas o calculando mÃ¡rgenes, esta herramienta proporciona resultados rÃ¡pidos y precisos.',
      'features_title' => 'âœ¨ CaracterÃ­sticas Clave',
      'features' => 
      array (
        'instant' => 
        array (
          'title' => 'CÃ¡lculo InstantÃ¡neo',
          'desc' => 'ObtÃ©n resultados de diferencia de precios y porcentaje al instante',
        ),
        'easy' => 
        array (
          'title' => 'FÃ¡cil de Usar',
          'desc' => 'Interfaz simple e intuitiva para cÃ¡lculos rÃ¡pidos',
        ),
        'percentage' => 
        array (
          'title' => 'Cambio Porcentual',
          'desc' => 'Calcula el aumento o disminuciÃ³n porcentual entre dos precios',
        ),
        'privacy' => 
        array (
          'title' => 'Enfocado en Privacidad',
          'desc' => 'Todo el procesamiento ocurre en tu navegador - no se almacenan datos',
        ),
      ),
      'how_title' => 'ðŸ“š CÃ³mo Usar',
      'how_steps' => 
      array (
        1 => '<strong>Ingresa Precios:</strong> Introduce el "Precio Original" y el "Nuevo Precio" en los campos designados.',
        2 => '<strong>Haz Clic en Calcular:</strong> Presiona el botÃ³n "Calcular Diferencia".',
        3 => '<strong>Ve Resultados:</strong> La herramienta mostrarÃ¡ la diferencia absoluta y el cambio porcentual, indicando si es un aumento o una disminuciÃ³n.',
      ),
      'faq_title' => 'â“ Preguntas Frecuentes',
      'faq' => 
      array (
        'q1' => 'Â¿QuÃ© es la diferencia de precios?',
        'a1' => 'La diferencia de precios es la cantidad en que un precio difiere de otro. Puede ser un aumento o una disminuciÃ³n.',
        'q2' => 'Â¿CÃ³mo se calcula el cambio porcentual?',
        'a2' => 'El cambio porcentual se calcula como ((Nuevo Precio - Precio Original) / Precio Original) * 100. Un resultado positivo indica un aumento, mientras que uno negativo indica una disminuciÃ³n.',
        'q3' => 'Â¿Puedo usar esto para cualquier moneda?',
        'a3' => 'SÃ­, la calculadora funciona con cualquier valor numÃ©rico, por lo que puedes usarla para cualquier moneda siempre que seas consistente con las unidades.',
        'q4' => 'Â¿Mis datos estÃ¡n seguros?',
        'a4' => 'Â¡Absolutamente! Todos los cÃ¡lculos se realizan directamente en tu navegador. Tus datos nunca se envÃ­an a nuestros servidores.',
      ),
    ),
  ),
  'cron-job-generator' => 
  array (
    'meta' => 
    array (
      'title' => 'Generador de Tareas Cron',
      'description' => 'Crea programaciones cron fÃ¡cilmente con nuestro generador visual - no necesitas memorizar la sintaxis cron',
      'h1' => 'Generador de Tareas Cron',
      'subtitle' => 'Crea programaciones cron fÃ¡cilmente con nuestro generador visual',
    ),
    'editor' => 
    array (
      'common_settings' => 'Configuraciones Comunes',
      'minute' => 'Minuto',
      'hour' => 'Hora',
      'day' => 'DÃ­a',
      'month' => 'Mes',
      'weekday' => 'DÃ­a de la Semana',
      'command' => 'Comando a Ejecutar',
      'next_run' => 'PrÃ³ximas Ejecuciones Programadas',
      'generated_cron' => 'ExpresiÃ³n Cron Generada',
      'btn_generate' => 'Generar Cron',
      'btn_copy' => 'Copiar Cron',
      'btn_clear' => 'Reiniciar',
      'every_minute' => 'Cada Minuto (*)',
      'every_hour' => 'Cada Hora (*)',
      'every_day' => 'Cada DÃ­a (*)',
      'every_month' => 'Cada Mes (*)',
      'every_weekday' => 'Cada DÃ­a de Semana (*)',
      'choose' => '-- Elegir --',
      'ph_command' => '/usr/bin/php /ruta/al/script.php',
      'options' => 
      array (
        'every_minute' => 'Cada Minuto (* * * * *)',
        'every_5_minutes' => 'Cada 5 Minutos (*/5 * * * *)',
        'every_15_minutes' => 'Cada 15 Minutos (*/15 * * * *)',
        'every_30_minutes' => 'Cada 30 Minutos (*/30 * * * *)',
        'every_hour' => 'Cada Hora (0 * * * *)',
        'every_day_midnight' => 'Cada DÃ­a a Medianoche (0 0 * * *)',
        'every_week' => 'Cada Semana (0 0 * * 0)',
        'every_month' => 'Cada Mes (0 0 1 * *)',
      ),
    ),
    'js' => 
    array (
      'success_copy' => 'âœ“ Â¡ExpresiÃ³n cron copiada al portapapeles!',
      'no_copy' => 'No hay expresiÃ³n cron para copiar',
    ),
    'content' => 
    array (
      'hero_title' => 'Generador de Tareas Cron',
      'hero_subtitle' => 'Crea programaciones cron complejas fÃ¡cilmente con nuestro generador visual. Ya no necesitas memorizar la sintaxis cron.',
      'p1' => 'Configurar tareas cron puede ser confuso con asteriscos y nÃºmeros crÃ­pticos. Nuestro Generador de Tareas Cron gratuito en lÃ­nea te permite construir programaciones cron perfectas visualmente. Ya sea que necesites ejecutar un script cada 5 minutos, a medianoche o en dÃ­as especÃ­ficos del mes, nuestra herramienta genera la sintaxis correcta para ti al instante.',
      'features_title' => 'âœ¨ CaracterÃ­sticas Clave',
      'features' => 
      array (
        'visual' => 
        array (
          'title' => 'Editor Visual',
          'desc' => 'Selecciona minutos, horas, dÃ­as y meses usando una interfaz simple',
        ),
        'validate' => 
        array (
          'title' => 'ValidaciÃ³n en Tiempo Real',
          'desc' => 'Ve las prÃ³ximas ejecuciones programadas para verificar que tu programaciÃ³n coincida con tu intenciÃ³n',
        ),
        'templates' => 
        array (
          'title' => 'Plantillas Comunes',
          'desc' => 'Preajustes de un clic para programaciones comunes como "Cada 5 Minutos" o "Diario"',
        ),
        'readable' => 
        array (
          'title' => 'Legible para Humanos',
          'desc' => 'Convierte expresiones cron a descripciones en espaÃ±ol simple',
        ),
      ),
      'syntax_title' => 'ðŸ“š Entendiendo la Sintaxis Cron',
      'syntax_intro' => 'Una expresiÃ³n cron consiste en 5 campos separados por espacios:',
      'syntax_fields' => 
      array (
        'min' => 'Minuto (0-59)',
        'hour' => 'Hora (0-23)',
        'day' => 'DÃ­a del Mes (1-31)',
        'month' => 'Mes (1-12)',
        'week' => 'DÃ­a de la Semana (0-6, Domingo=0)',
      ),
      'examples_title' => 'ðŸ’¡ Ejemplos Populares',
      'examples' => 
      array (
        1 => 
        array (
          'code' => '*/15 * * * *',
          'desc' => 'Ejecutar cada 15 minutos',
        ),
        2 => 
        array (
          'code' => '0 0 * * *',
          'desc' => 'Ejecutar una vez al dÃ­a a medianoche',
        ),
        3 => 
        array (
          'code' => '0 9-17 * * 1-5',
          'desc' => 'Ejecutar cada hora de 9 AM a 5 PM, lunes a viernes',
        ),
        4 => 
        array (
          'code' => '0 0 1 * *',
          'desc' => 'Ejecutar una vez al mes el dÃ­a 1',
        ),
      ),
      'faq_title' => 'â“ Preguntas Frecuentes',
      'faq' => 
      array (
        'q1' => 'Â¿QuÃ© es una tarea cron?',
        'a1' => 'Una tarea cron es un programador de trabajos basado en tiempo en sistemas operativos tipo Unix. Los usuarios pueden programar trabajos (comandos o scripts) para ejecutarse periÃ³dicamente en tiempos, fechas o intervalos fijos.',
        'q2' => 'Â¿CÃ³mo instalo una tarea cron?',
        'a2' => 'TÃ­picamente usas el comando `crontab -e` en tu terminal para editar tu archivo cron. Luego pega la lÃ­nea generada al final del archivo.',
        'q3' => 'Â¿Puedo usar esto para Windows?',
        'a3' => 'Windows usa "Programador de Tareas" que tiene un formato diferente. Sin embargo, algunas herramientas y entornos de Windows (como WSL o algunos paneles de control de hosting) sÃ­ soportan sintaxis cron.',
        'q4' => 'Â¿QuÃ© significa el asterisco (*)?',
        'a4' => 'Un asterisco significa "cada". Por ejemplo, un asterisco en el campo de minuto significa "cada minuto".',
      ),
    ),
  ),
  'curl-command-builder' => 
  array (
    'meta' => 
    array (
      'title' => 'Constructor de Comandos CURL',
      'description' => 'Construye comandos CURL fÃ¡cilmente con nuestro constructor visual - crea solicitudes HTTP sin memorizar sintaxis',
      'h1' => 'Constructor de Comandos CURL',
      'subtitle' => 'Construye comandos CURL fÃ¡cilmente con nuestro constructor visual',
    ),
    'editor' => 
    array (
      'method_label' => 'MÃ©todo',
      'url_label' => 'URL',
      'headers_tab' => 'Encabezados',
      'body_tab' => 'Cuerpo de Solicitud',
      'key_ph' => 'Clave (ej. Authorization)',
      'value_ph' => 'Valor (ej. Bearer token)',
      'add_header' => '+ Agregar Encabezado',
      'raw_data_label' => 'Datos Crudos (JSON/Texto)',
      'generated_label' => 'Comando Generado',
      'btn_copy' => 'Copiar Comando',
    ),
    'js' => 
    array (
      'success_copy' => 'Â¡Comando copiado!',
    ),
  ),
);
