<?php

return array (
  'base64-to-image-converter' => 
  array (
    'meta' => 
    array (
      'title' => 'Base64 to Image Converter - Decode Base64 Output | Optimizo',
      'description' => 'Convert Base64 encoded strings back to images (PNG, JPG, GIF). Free online decoder and visualizer.',
      'h1' => 'Decode Base64 to Image',
      'subtitle' => 'Convert Base64 encoded strings back to images (PNG, JPG, GIF) instantly',
    ),
    'input' => 
    array (
      'title' => 'Paste Base64 String',
      'desc' => 'Paste your code below to visualize the image',
      'placeholder' => 'data:image/png;base64,iVBORw0KGgo...',
      'btn_decode' => 'Decode Image',
    ),
    'result' => 
    array (
      'success' => 'Image Decoded Successfully',
      'btn_download' => 'Download Image',
      'btn_clear' => 'Clear Pattern',
      'image_alt' => 'Decoded Image',
    ),
    'js' => 
    array (
      'input_required' => 'Please paste a Base64 string first.',
      'invalid_error' => 'Invalid Base64 string or unsupported image format.',
    ),
    'content' => 
    array (
      'title' => 'Decode Base64 to Image',
      'p1' => 'Found a long string of random characters starting with <code>data:image/...</code> and don\'t know what it is? It\'s likely a Base64-encoded image.',
      'p2' => 'Our <strong>Base64 to Image Decoder</strong> converts that text string back into a visible image file (PNG, JPG, GIF, etc.) that you can view and download to your computer.',
      'features' => 
      array (
        'preview' => 
        array (
          'title' => 'Instant Preview',
          'desc' => 'See the image immediately. We parse the binary data and render it on your screen.',
        ),
        'auto' => 
        array (
          'title' => 'Auto-Detection',
          'desc' => 'We automatically detect the file format (PNG, JPEG, GIF) from the header of the Base64 string.',
        ),
        'download' => 
        array (
          'title' => 'Download File',
          'desc' => 'Save the decoded result as a real image file to your hard drive with one click.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Decode?',
        'list' => 
        array (
          0 => 'Paste your Base64 string into the textarea.',
          1 => 'We instantly attempt to read the string.',
          2 => 'If valid, the image appears on the left.',
          3 => 'Click "Download Image" to save it.',
        ),
      ),
      'use_cases' => 
      array (
        'title' => 'Common Use Cases',
        'list' => 
        array (
          0 => 'Debugging: Checking what image data is being sent in API responses or stored in databases.',
          1 => 'Recovery: Extracting images embedded in CSS files or HTML templates.',
          2 => 'Verification: Ensuring a Base64 string is not corrupted.',
        ),
      ),
    ),
  ),
  'heic-to-jpg-converter' => 
  array (
    'meta' => 
    array (
      'title' => 'HEIC to JPG Converter - Convert iPhone Photos Online | Optimizo',
      'description' => 'Convert High Efficiency Image File (HEIC/HEIF) photos from iPhone to standard JPG format. Free, private, client-side converter.',
      'h1' => 'HEIC to JPG Converter',
      'subtitle' => 'Convert High Efficiency Image File (HEIC/HEIF) photos from iPhone to standard JPG format',
    ),
    'input' => 
    array (
      'title' => 'Upload HEIC File',
      'desc' => 'Drag & drop your .heic or .heif file here',
      'drop_title' => 'Drop HEIC file here',
      'drop_desc' => 'Supports HEIC/HEIF (Max 20MB)',
    ),
    'loading' => 
    array (
      'title' => 'Processing HEIC file...',
      'desc' => 'Larger files may take a few seconds.',
    ),
    'result' => 
    array (
      'converted_to' => 'Converted to:',
      'btn_download' => 'Download JPG Image',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'error' => 'Error converting HEIC file: ',
    ),
    'content' => 
    array (
      'title' => 'Convert HEIC to JPG Instantly',
      'p1' => 'Apple\'s High Efficiency Image Format (HEIC) is great for saving space on your iPhone, but it can be a nightmare to open on Windows, Android, or older software. Our <strong>HEIC to JPG Converter</strong> solves this problem instantly.',
      'p2' => 'We use advanced local processing capabilities to convert your photos without ever uploading them to a cloud server. This is the <strong>safest way</strong> to convert personal photos.',
      'features' => 
      array (
        'private' => 
        array (
          'title' => '100% Private',
          'desc' => 'Your personal photos stay on your device. We use client-side logic for zero-risk conversion.',
        ),
        'compatibility' => 
        array (
          'title' => 'Broad Compatibility',
          'desc' => 'Convert HEIC and HEIF files from any iOS version (iPhone/iPad) to universally accepted JPGs.',
        ),
        'fast' => 
        array (
          'title' => 'Fast & Free',
          'desc' => 'No software installation needed. Just drag, drop, and convert in seconds.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Convert HEIC to JPG?',
        'list' => 
        array (
          0 => 'Drag your .heic or .heif file into the upload zone.',
          1 => 'The tool will automatically read and convert the file using advanced browser libraries.',
          2 => 'See a preview of your converted JPG image immediately.',
          3 => 'Click the "Download JPG Image" button to save it to your computer.',
        ),
      ),
      'details' => 
      array (
        'title' => 'Technical Details',
        'p1' => 'HEIC (High Efficiency Image Container) uses modern compression methods to keep file sizes small. However, Windows and Android often struggle to open them.',
        'p2' => 'Our tool decodes the HEIC data and re-encodes it as a standardized JPEG image with 90% quality retention, ensuring your photos look great while being accessible everywhere.',
      ),
      'faq' => 
      array (
        'title' => 'Common Questions',
        'q1' => 'Can I convert iPhone Live Photos?',
        'a1' => 'You can convert the still image part of the Live Photo if you transfer the .HEIC file to your computer first.',
        'q2' => 'Is quality lost during conversion?',
        'a2' => 'We use a high-quality setting (0.9 out of 1.0) to ensure minimal visual difference. JPG is a lossy format, but the difference is usually negligible to the human eye.',
      ),
    ),
  ),
  'ico-converter' => 
  array (
    'meta' => 
    array (
      'title' => 'ICO Converter - Create Favicons Online | Optimizo',
      'description' => 'Convert images to ICO format for website favicons. Supports custom sizing (32x32, 64x64). Free online favicon generator.',
      'h1' => 'ICO Converter & Favicon Generator',
      'subtitle' => 'Convert images to ICO format for website favicons with custom sizing',
    ),
    'input' => 
    array (
      'title' => 'Upload Image to Convert',
      'desc' => 'Drag & drop your PNG/JPG file',
      'drop_title' => 'Drop image file here',
      'drop_desc' => 'Fast conversion to .ico',
    ),
    'editor' => 
    array (
      'original' => 'Original',
      'favicon' => 'Favicon',
      'size_label' => 'Icon Size',
      'output_format' => 'Output Format:',
      'btn_download' => 'Download Favicon (.ico)',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid image',
    ),
    'content' => 
    array (
      'title' => 'Free ICO Converter & Favicon Generator',
      'p1' => 'Creating a website? You need a favicon - that little icon that appears in browser tabs.',
      'p2' => 'Our <strong>ICO Converter</strong> transforms any PNG or JPG image into a standard Microsoft `.ico` file. We support all common favicon sizes to ensure your brand looks sharp on every device.',
      'features' => 
      array (
        'sizes' => 
        array (
          'title' => 'Standard Sizes',
          'desc' => 'Choose from 16x16, 32x32, 48x48, 64x64, or 128x128 pixels. Or select all!',
        ),
        'resize' => 
        array (
          'title' => 'Auto-Resizing',
          'desc' => 'Upload a large logo, and we\'ll automatically downscale it smoothly to fit the tiny icon format.',
        ),
        'multi' => 
        array (
          'title' => 'Multi-Icon Support',
          'desc' => 'Modern .ico files can contain multiple sizes in one file. We handle that for you.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'Steps to Create Favicon',
        'list' => 
        array (
          0 => 'Use a square image (PNG/JPG) for best results.',
          1 => '16x16 (Browser tabs), 32x32 (Taskbar), 48x48 (Desktop).',
          2 => 'See how it looks instantly.',
          3 => 'Get your `favicon.ico` file.',
        ),
      ),
      'why' => 
      array (
        'title' => 'Why .ICO format?',
        'p1' => 'While modern browsers support PNG favicons, the `.ico` format is still the standard for maximum compatibility across all operating systems and legacy browsers (like Internet Explorer).',
      ),
    ),
  ),
  'image-converter' => 
  array (
    'meta' => 
    array (
      'title' => 'Image Converter - Convert Images Online Free | Optimizo',
      'description' => 'Convert images between multiple formats (PNG, JPG, WEBP) easily and for free. Secure, client-side conversion requiring no uploads.',
      'h1' => 'Image Converter',
      'subtitle' => 'Convert images between multiple formats (PNG, JPG, WEBP) easily and for free',
    ),
    'input' => 
    array (
      'title' => 'Upload Your Image',
      'desc' => 'Drag & drop or click to select an image',
      'drop_title' => 'Drop your image here',
      'drop_desc' => 'Supports PNG, JPG, WEBP (Max 10MB)',
    ),
    'editor' => 
    array (
      'note' => 'Note:',
      'note_text' => 'Transparent backgrounds will be filled with white color for JPG.',
      'target_format' => 'Target Format',
      'quality' => 'Quality (JPG/WEBP)',
      'btn_convert' => 'Convert & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid image file',
    ),
    'content' => 
    array (
      'title' => 'The Ultimate Free Online Image Converter',
      'p1' => 'In today\'s digital landscape, working with images requires versatility. Whether you\'re a web developer needing WEBP for performance, a designer needing PNG for transparency, or a photographer needing universal JPG compatibility, our <strong>Image Converter</strong> is the all-in-one solution.',
      'p2' => 'Forget about installing heavy software or uploading your private photos to unknown servers. Our tool runs entirely in your browser, ensuring <strong>100% privacy and lightning-fast speeds</strong>.',
      'features' => 
      array (
        'secure' => 
        array (
          'title' => 'Secure & Private',
          'desc' => 'Your files never leave your device. All processing happens locally in your browser.',
        ),
        'instant' => 
        array (
          'title' => 'Instant Conversion',
          'desc' => 'No queuing or waiting. Powered by modern WebAssembly technology for speed.',
        ),
        'bulk' => 
        array (
          'title' => 'Bulk Processing',
          'desc' => 'Convert unlimited images one by one without any usage restrictions or costs.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Convert Images?',
        'list' => 
        array (
          0 => 'Drag your image file into the blue box or click to select from your device.',
          1 => 'Select your desired output format (PNG, JPG, or WEBP) from the dropdown.',
          2 => 'If choosing JPG or WEBP, use the slider to balance file size and quality.',
          3 => 'Click the "Convert & Download" button to save your formatted image instantly.',
        ),
      ),
      'features_list' => 
      array (
        'title' => 'Key Features',
        'list' => 
        array (
          0 => 'Cross-Format Support: Effortlessly switch between PNG, JPG, and WEBP.',
          1 => 'Transparency Control: PNG conversions preserve transparency, while JPG fills it with a white background.',
          2 => 'Responsive: Works perfectly on Desktops, Tablets, and Mobile phones.',
          3 => 'No Limits: No file size limits and no daily conversion caps.',
        ),
      ),
      'faq' => 
      array (
        'title' => 'Frequently Asked Questions',
        'q1' => 'Is this tool free?',
        'a1' => 'Yes, absolutely. We don\'t charge anything, and there are no hidden premium features.',
        'q2' => 'Does it support transparency?',
        'a2' => 'Yes! If you convert to PNG or WEBP, transparency is preserved. For JPG, transparent areas become white.',
        'q3' => 'Are my images uploaded?',
        'a3' => 'No. All conversion logic runs in your own browser using JavaScript and Canvas APIs. We count privacy as our top feature.',
        'q4' => 'What is the best format?',
        'a4' => 'Use <strong>JPG</strong> for photos, <strong>PNG</strong> for graphics with sharp edges/transparency, and <strong>WEBP</strong> for web performance.',
      ),
    ),
  ),
  'image-to-base64-converter' => 
  array (
    'meta' => 
    array (
      'title' => 'Image to Base64 Converter - Convert Image to String | Optimizo',
      'description' => 'Convert images to Base64 encoded strings for embedding in HTML or CSS. Free online tool supporting PNG, JPG, GIF.',
      'h1' => 'Convert Image to Base64 String',
      'subtitle' => 'Convert images to Base64 encoded strings for embedding in HTML or CSS',
    ),
    'input' => 
    array (
      'title' => 'Upload Image',
      'desc' => 'Drag & drop your image file here',
      'drop_title' => 'Drop image file here',
      'drop_desc' => 'Supports All Image Formats',
    ),
    'editor' => 
    array (
      'label_string' => 'Base64 String',
      'btn_copy' => 'Copy to Clipboard',
      'char_count' => 'Character Count',
      'mime_type' => 'MIME Type',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'copied' => 'Copied!',
    ),
    'content' => 
    array (
      'title' => 'Convert Image to Base64 String',
      'p1' => 'Developers and web designers often need to embed images directly into HTML or CSS files to reduce HTTP requests.',
      'p2' => 'Our <strong>Image to Base64 Converter</strong> encodes your image file into a long string of characters that represents the binary data. You can paste this string straight into your code.',
      'features' => 
      array (
        'clipboard' => 
        array (
          'title' => 'Clipboard Ready',
          'desc' => 'One-click copy. We format the output for HTML (`&lt;img src="..."&gt;`) or CSS (`background: url(...)`).',
        ),
        'requests' => 
        array (
          'title' => 'Reduce Requests',
          'desc' => 'Embedding small icons and logos as Base64 eliminates the network overhead of fetching external image files.',
        ),
        'formats' => 
        array (
          'title' => 'Any Format',
          'desc' => 'Works with PNG, JPG, GIF, WEBP, SVG, and even ICO files.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to use?',
        'list' => 
        array (
          0 => 'Select your image file.',
          1 => 'The tool immediately converts the file to a Data URI.',
          2 => 'Click "Copy to Clipboard" to grab the code.',
          3 => 'Insert it into your `src` attribute or CSS file.',
        ),
      ),
      'use_cases' => 
      array (
        'title' => 'When to use Base64?',
        'list' => 
        array (
          0 => 'Small Images: Best for icons, spinners, and small logos (under 10KB).',
          1 => 'Single-File Apps: When you need to bundle everything into one HTML file (e.g., email templates).',
          2 => 'Offline Access: Ensures images load even without a network connection if the HTML is saved locally.',
        ),
      ),
    ),
  ),
  'jpg-to-png-converter' => 
  array (
    'meta' => 
    array (
      'title' => 'JPG to PNG Converter - Convert JPG Images to PNG Free | Optimizo',
      'description' => 'Convert JPG images to PNG format instantly. 100% free, secure client-side conversion, no file size limits.',
      'h1' => 'JPG to PNG Converter',
      'subtitle' => 'Convert JPG images to PNG format instantly with 100% free conversion',
    ),
    'input' => 
    array (
      'title' => 'Upload JPG Image',
      'desc' => 'Drag & drop your JPG/JPEG file here',
      'drop_title' => 'Drop JPG file here',
      'drop_desc' => 'Supports JPG, JPEG (Max 10MB)',
    ),
    'editor' => 
    array (
      'output_format' => 'Output Format:',
      'format_short' => 'PNG',
      'btn_convert' => 'Convert to PNG & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid JPG image',
      'converted_name' => 'converted-image',
    ),
    'content' => 
    array (
      'title' => 'Convert JPG to PNG Instantly',
      'p1' => 'JPG is the world\'s most popular image format, but it often lacks the versatility needed for modern web design. By converting to PNG, you gain access to lossless compression and transparency support.',
      'p2' => 'Our <strong>JPG to PNG Converter</strong> is designed for speed and privacy, handling everything directly in your browser without uploading your sensitive photos to any server.',
      'features' => 
      array (
        'lossless' => 
        array (
          'title' => 'Lossless Quality',
          'desc' => 'Stop image degradation. PNG uses lossless compression to keep every pixel perfect during edits.',
        ),
        'private' => 
        array (
          'title' => '100% Private',
          'desc' => 'Files are processed locally on your device. We never see, store, or upload your images.',
        ),
        'transparency' => 
        array (
          'title' => 'Transparency Ready',
          'desc' => 'Convert to the preferred format for logos, icons, and graphics that require transparent backgrounds.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Convert JPG to PNG',
        'list' => 
        array (
          0 => 'Drag and drop your JPG file into the designated area.',
          1 => 'The tool immediately reads the file ready for conversion.',
          2 => 'See exactly how your image looks before saving.',
          3 => 'Click "Convert & Download" to save your new PNG instantly.',
        ),
      ),
      'faq' => 
      array (
        'title' => 'Frequently Asked Questions',
        'q1' => 'Is the quality better?',
        'a1' => 'Converting to PNG stops <em>future</em> quality loss. It\'s best for images you plan to edit further or need to keep sharp.',
        'q2' => 'Are there file limits?',
        'a2' => 'Since we process files in your browser, the limit is determined by your device\'s memory, usually allowing files up to 50MB easily.',
      ),
    ),
  ),
  'jpg-to-webp-converter' => 
  array (
    'meta' => 
    array (
      'title' => 'JPG to WEBP Converter - Convert Images to WebP | Optimizo',
      'description' => 'Convert JPG images to the modern WebP format for superior compression and web performance. Free online tool.',
      'h1' => 'JPG to WebP Converter',
      'subtitle' => 'Convert JPG images to the modern WebP format for superior compression',
    ),
    'input' => 
    array (
      'title' => 'Upload JPG Image',
      'desc' => 'Drag & drop your JPG file here',
      'drop_title' => 'Drop JPG file here',
      'drop_desc' => 'Supports JPG, JPEG (Max 10MB)',
    ),
    'editor' => 
    array (
      'output_format' => 'Output Format:',
      'quality' => 'Compression Quality',
      'format_short' => 'WEBP',
      'btn_convert' => 'Convert to WEBP & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid JPG image',
      'converted_name' => 'converted-image',
    ),
    'content' => 
    array (
      'title' => 'Convert JPG to WebP for Better Performance',
      'p1' => 'WebP is a modern image format that provides superior lossless and lossy compression for images on the web. By converting JPG to WebP, developers and webmasters can create smaller, richer images that make the web faster.',
      'p2' => 'Our <strong>JPG to WebP Converter</strong> helps you optimize your images instantly in the browser, reducing file size by up to 30% compared to JPEG without standard quality loss.',
      'features' => 
      array (
        'faster' => 
        array (
          'title' => 'Faster Loading',
          'desc' => 'WebP images are significantly smaller than JPGs, helping your website load faster and improving SEO scores.',
        ),
        'quality' => 
        array (
          'title' => 'High Quality',
          'desc' => 'Maintain visual fidelity while reducing file weight. Perfect for photographs and complex web graphics.',
        ),
        'secure' => 
        array (
          'title' => 'Secure Processing',
          'desc' => 'All conversions happen locally. Your sensitive images never leave your computer.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Convert JPG to WebP',
        'list' => 
        array (
          0 => 'Select or drag & drop your JPG image.',
          1 => 'Use the quality slider to balance size vs quality.',
          2 => 'See the result in real-time.',
          3 => 'Save your optimized WebP image.',
        ),
      ),
      'faq' => 
      array (
        'title' => 'Frequently Asked Questions',
        'q1' => 'Do all browsers support WebP?',
        'a1' => 'Yes, all modern browsers (Chrome, Firefox, Safari, Edge) fully support WebP images.',
        'q2' => 'Is WebP better for SEO?',
        'a2' => 'Absolutely. Google prefers WebP because it loads faster, improving your Core Web Vitals score.',
      ),
    ),
  ),
  'png-to-jpg-converter' => 
  array (
    'meta' => 
    array (
      'title' => 'PNG to JPG Converter - Convert PNG to JPG Online | Optimizo',
      'description' => 'Convert PNG images to JPG format for smaller file sizes. Free online converter.',
      'h1' => 'PNG to JPG Converter',
      'subtitle' => 'Convert PNG images to JPG format for smaller file sizes instantly',
    ),
    'input' => 
    array (
      'title' => 'Upload PNG Image',
      'desc' => 'Drag & drop your PNG file here',
      'drop_title' => 'Drop PNG file here',
      'drop_desc' => 'Supports PNG (Max 10MB)',
    ),
    'editor' => 
    array (
      'note' => 'Note:',
      'note_text' => 'Transparent backgrounds will be converted to white.',
      'output_format' => 'Output Format:',
      'btn_convert' => 'Convert to JPG & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid PNG image',
    ),
    'content' => 
    array (
      'title' => 'Compress PNG to JPG Instantly',
      'p1' => 'PNG files are great for quality, but they can be massive. If you\'re uploading photos to a website or sending them via email, JPG is often the better choice.',
      'p2' => 'Our <strong>PNG to JPG Converter</strong> drastically reduces file size by using JPEG compression. We automatically handle transparent backgrounds by filling them with white, ensuring your images look perfect.',
      'features' => 
      array (
        'size' => 
        array (
          'title' => 'Drastic Size Reduction',
          'desc' => 'Reduce file sizes by up to 80% with minimal loss in visual quality.',
        ),
        'secure' => 
        array (
          'title' => 'Secure & Private',
          'desc' => 'Local browser processing means your photos are never uploaded to the cloud.',
        ),
        'smart' => 
        array (
          'title' => 'Smart Conversion',
          'desc' => 'Intelligent background handling converts transparency to a clean white matte.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'Steps to Convert',
        'list' => 
        array (
          0 => 'Select a PNG image from your device.',
          1 => 'The tool instantly processes the image.',
          2 => 'Check the preview (transparent areas will now be white).',
          3 => 'Download your optimized JPG file.',
        ),
      ),
      'why' => 
      array (
        'title' => 'When to use JPG?',
        'list' => 
        array (
          0 => 'Photographs: JPG is designed for complex, real-world images.',
          1 => 'Web Uploads: Many forms only accept .jpg or .jpeg.',
          2 => 'Saving Space: If you have thousands of images, JPG saves GBs of storage.',
        ),
      ),
    ),
  ),
  'png-to-webp-converter' => 
  array (
    'meta' => 
    array (
      'title' => 'PNG to WEBP Converter - Compress PNG to WebP | Optimizo',
      'description' => 'Convert PNG images to WebP to reduce file size while maintaining transparency. Enhance your website loading speed.',
      'h1' => 'PNG to WebP Converter',
      'subtitle' => 'Convert PNG images to WebP to reduce file size while maintaining transparency',
    ),
    'input' => 
    array (
      'title' => 'Upload PNG Image',
      'desc' => 'Drag & drop your PNG file here',
      'drop_title' => 'Drop PNG file here',
      'drop_desc' => 'Supports PNG (Max 10MB)',
    ),
    'editor' => 
    array (
      'output_format' => 'Output Format:',
      'quality' => 'Compression Quality',
      'btn_convert' => 'Convert to WEBP & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid PNG image',
    ),
    'content' => 
    array (
      'title' => 'Optimize Images with PNG to WebP',
      'p1' => 'Want faster website load times? Converting your PNGs to WebP is the #1 recommendation from Google PageSpeed Insights.',
      'p2' => 'Our tool compresses your PNG images into the modern WebP format, reducing file size by up to <strong>30-50%</strong> while keeping the background transparent and the quality sharp.',
      'features' => 
      array (
        'smaller' => 
        array (
          'title' => 'Significantly Smaller',
          'desc' => 'WebP offers superior compression. Save bandwidth and storage space instantly.',
        ),
        'transparency' => 
        array (
          'title' => 'Transparency Kept',
          'desc' => 'Unlike converting to JPG, switching from PNG to WebP preserves your alpha channel (background transparency).',
        ),
        'adjustable' => 
        array (
          'title' => 'Adjustable Quality',
          'desc' => 'You control the balance. Choose 90% for high quality or 70% for maximum savings.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Convert?',
        'list' => 
        array (
          0 => 'Drag and drop your file.',
          1 => 'Use the slider. We recommend 80-90% for a good balance.',
          2 => 'Click the "Convert" button.',
          3 => 'Your lighter .webp file is ready.',
        ),
      ),
      'why' => 
      array (
        'title' => 'Why WebP?',
        'p1' => 'WebP is a modern image format developed by Google.',
        'list' => 
        array (
          0 => 'SEO Boost: Faster sites rank better on Google.',
          1 => 'Mobile Friendly: Uses less data for mobile visitors.',
          2 => 'Support: Supported by Chrome, Firefox, Safari, Edge, and all modern browsers.',
        ),
      ),
    ),
  ),
  'svg-to-jpg-converter' => 
  array (
    'meta' => 
    array (
      'title' => 'SVG to JPG Converter - Vector to Raster Conversion | Optimizo',
      'description' => 'Convert SVG vector files to JPG images online. Auto-fills transparent backgrounds with white for perfect JPG output.',
      'h1' => 'SVG to JPG Converter',
      'subtitle' => 'Convert SVG vector files to JPG images online with auto-fill backgrounds',
    ),
    'input' => 
    array (
      'title' => 'Upload SVG File',
      'desc' => 'Drag & drop your SVG file here',
      'drop_title' => 'Drop SVG file here',
      'drop_desc' => 'Supports SVG, SVGZ (Max 10MB)',
    ),
    'editor' => 
    array (
      'note' => 'Note:',
      'note_text' => 'Transparent backgrounds will be filled with white color.',
      'output_format' => 'Output Format:',
      'scale_label' => 'Resolution Multiplier (Scale)',
      'scale_1' => '1x (Original Size)',
      'scale_2' => '2x (High Res)',
      'scale_4' => '4x (Ultra Res)',
      'btn_convert' => 'Convert to JPG & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid SVG image',
    ),
    'content' => 
    array (
      'title' => 'Convert SVG to JPG Format',
      'p1' => 'Need to use a logo in a document or on a website that doesn\'t accept vector files? Our <strong>SVG to JPG Converter</strong> is the answer.',
      'p2' => 'It creates a solid, high-compatibility image file from your vector source. We automatically handle transparency by adding a clean white background, ensuring your graphic looks professional on any medium.',
      'features' => 
      array (
        'compatibility' => 
        array (
          'title' => 'Maximum Compatibility',
          'desc' => 'JPG is opened by literally every digital device and software created in the last 30 years.',
        ),
        'resolution' => 
        array (
          'title' => '4x High Resolution',
          'desc' => 'Scale up your SVG before saving to ensure your JPG is sharp, not blurry.',
        ),
        'secure' => 
        array (
          'title' => 'Secure Client-Side',
          'desc' => 'Processing happens in your browser. We never see your files.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'Easy Instructions',
        'list' => 
        array (
          0 => 'Click "Upload" or drag your file to the center box.',
          1 => 'Choose a scaling factor (e.g., 2x or 4x) for higher quality results.',
          2 => 'Observe the image. Note that transparent backgrounds are now white.',
          3 => 'Click "Convert to JPG & Download".',
        ),
      ),
      'why' => 
      array (
        'title' => 'Why choose JPG over PNG for Vectors?',
        'p1' => 'While PNG supports transparency, JPG generates smaller file sizes for complex, colorful images.',
        'list' => 
        array (
          0 => 'Smaller Files: Better for emails and attachments.',
          1 => 'No Transparency Issues: Some viewers render transparency as black. JPG forces a white background, ensuring your logo is legible.',
        ),
      ),
    ),
  ),
  'svg-to-png-converter' => 
  array (
    'meta' => 
    array (
      'title' => 'SVG to PNG Converter - Rasterize SVG Images | Optimizo',
      'description' => 'Convert Scalable Vector Graphics (SVG) to PNG images instantly. Perfect for ensuring compatibility with applications that don\'t support vector files.',
      'h1' => 'SVG to PNG Converter',
      'subtitle' => 'Convert Scalable Vector Graphics (SVG) to PNG images instantly',
    ),
    'input' => 
    array (
      'title' => 'Upload SVG File',
      'desc' => 'Drag & drop your SVG file here',
      'drop_title' => 'Drop SVG file here',
      'drop_desc' => 'Supports SVG, SVGZ (Max 10MB)',
    ),
    'editor' => 
    array (
      'checkerboard' => 'Checkerboard background indicates transparency',
      'output_format' => 'Output Format:',
      'scale_label' => 'Resolution Multiplier (Scale)',
      'scale_1' => '1x (Original Size)',
      'scale_2' => '2x (High Res)',
      'scale_4' => '4x (Ultra Res)',
      'btn_convert' => 'Convert to PNG & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid SVG image',
    ),
    'content' => 
    array (
      'title' => 'Rasterize SVG to PNG High-Res',
      'p1' => 'Scalable Vector Graphics (SVG) are perfect for the web, but impossible to use on social media, in Word documents, or as email attachments.',
      'p2' => 'Our <strong>SVG to PNG Converter</strong> allows you to turn your vector logo or icon into a high-quality, transparent PNG image. With our unique <strong>scaling feature</strong>, you can produce ultra-high-resolution images without any pixelation.',
      'features' => 
      array (
        'transparency' => 
        array (
          'title' => 'Transparency Preserved',
          'desc' => 'Unlike JPG, PNG keeps the background transparent. Perfect for logos and overlays.',
        ),
        'scaling' => 
        array (
          'title' => 'Up to 4x Scaling',
          'desc' => 'Export at 4x the original size. Get crisp edges even for large print formats.',
        ),
        'browser' => 
        array (
          'title' => 'Browser-Based',
          'desc' => 'Fast and secure. No files are uploaded to any server.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Convert SVG to PNG?',
        'list' => 
        array (
          0 => 'Drop your `.svg` file into the upload area.',
          1 => 'Select `1x`, `2x`, or `4x` from the dropdown. Higher is better for quality.',
          2 => 'Check the preview image on the left. The checkerboard indicates transparency.',
          3 => 'Hit the button to generate and download your PNG.',
        ),
      ),
      'why' => 
      array (
        'title' => 'Why Convert Vectors?',
        'p1' => 'Vectors are mathematical formulas, while PNGs are grids of pixels. You need pixels for:',
        'list' => 
        array (
          0 => 'Profile pictures (Twitter/LinkedIn often reject SVG).',
          1 => 'Embedding in emails (SVG support is poor).',
          2 => 'Using in video editors or simple graphic tools (Canva, Paint).',
        ),
      ),
    ),
  ),
  'webp-to-jpg-converter' => 
  array (
    'meta' => 
    array (
      'title' => 'WEBP to JPG Converter - Convert WebP to JPG Online | Optimizo',
      'description' => 'Convert WebP images to standard JPG format for broad compatibility. Free, fast, and secure converter.',
      'h1' => 'WebP to JPG Converter',
      'subtitle' => 'Convert WebP images to standard JPG format for broad compatibility',
    ),
    'input' => 
    array (
      'title' => 'Upload WEBP Image',
      'desc' => 'Drag & drop your WEBP file here',
      'drop_title' => 'Drop WEBP file here',
      'drop_desc' => 'Supports WEBP (Max 10MB)',
    ),
    'editor' => 
    array (
      'note' => 'Note:',
      'note_text' => 'Transparent backgrounds (common in WEBP) will be verified to white.',
      'output_format' => 'Output Format:',
      'btn_convert' => 'Convert to JPG & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid WEBP image',
    ),
    'content' => 
    array (
      'title' => 'WebP to JPG: The Compatibility Fixer',
      'p1' => 'WebP is fantastic for website speed, but it\'s a pain when you try to open it in Photoshop, older image viewers, or upload it to platforms that only accept JPG.',
      'p2' => 'Our <strong>WebP to JPG Converter</strong> bridges this gap. It takes your highly optimized WebP images and transforms them into the universally compatible JPEG format in milliseconds.',
      'features' => 
      array (
        'universal' => 
        array (
          'title' => 'Universal Support',
          'desc' => 'JPG works everywhere: Word docs, PowerPoint, legacy software, and every social media platform.',
        ),
        'secure' => 
        array (
          'title' => 'Secure Processing',
          'desc' => 'We don\'t see your files. The conversion is performed locally by your web browser.',
        ),
        'smart' => 
        array (
          'title' => 'Smart Backgrounds',
          'desc' => 'Automatically detects transparent pixels in WebP and fills them with a clean white background.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'Step-by-Step Guide',
        'list' => 
        array (
          0 => 'Click the box or drag your WebP image onto the page.',
          1 => 'The tool will display a preview of your image.',
          2 => 'Click the "Convert to JPG" button. The system handles transparency and compression automatically.',
          3 => 'Your new .jpg file will download instantly.',
        ),
      ),
      'why' => 
      array (
        'title' => 'Why Convert WebP?',
        'list' => 
        array (
          0 => 'Editing: Many desktop editors typically don\'t support WebP out of the box.',
          1 => 'Email: Outlook and other email clients might not render WebP inline images correctly.',
          2 => 'Printing: Print shops often require standard JPG or TIFF files.',
        ),
      ),
      'faq' => 
      array (
        'title' => 'FAQ',
        'q1' => 'What happens to transparent backgrounds?',
        'a1' => 'Since JPG doesn\'t support transparency, our tool replaces transparent areas with white. This is perfect for product photos and logos.',
        'q2' => 'Is it safe?',
        'a2' => 'Yes. Unlike other converters that upload your file to a server, this tool runs 100% on your device. Your data remains private.',
      ),
    ),
  ),
);
