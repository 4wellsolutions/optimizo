<?php

return array (
  'base64-to-image-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Convertidor de Base64 a Imagen',
      'subtitle' => 'Decodifique cadenas Base64 a archivos de imagen al instante con múltiples formatos',
      'title' => 'Base64 to Imagen Convertirer - Decode Base64 Output | Optimizo',
      'description' => 'Convertir Base64 encoded strings back to Imagens (PNG, JPG, GIF). Gratis online decoder and visualizer.',
    ),
    'content' => 
    array (
      'title' => 'Decodificar Base64 a Imagen',
      'p1' => '¿Encontraste una larga cadena de caracteres aleatorios que comienza con <code>data:image/...</code> y no sabes qué es? Probablemente es una imagen codificada en Base64.',
      'p2' => 'Nuestro <strong>Decodificador de Base64 a Imagen</strong> convierte esa cadena de texto de vuelta en un archivo de imagen visible (PNG, JPG, GIF, etc.) que puedes ver y descargar a tu computadora.',
      'features' => 
      array (
        'preview' => 
        array (
          'title' => 'Instantáneo Preview',
          'desc' => 'See the Imagen immediately. We parse the binary data and render it on your screen.',
        ),
        'auto' => 
        array (
          'title' => 'Auto-Detection',
          'desc' => 'We automatically detect the file format (PNG, JPEG, GIF) from the header of the Base64 string.',
        ),
        'download' => 
        array (
          'title' => 'Download File',
          'desc' => 'Save the decoded result as a real Imagen file to your hard drive with one click.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Decode?',
        'list' => 
        array (
          0 => 'Paste your Base64 string into the textarea.',
          1 => 'We Instantáneoly attempt to read the string.',
          2 => 'If valid, the Imagen appears on the left.',
          3 => 'Click "Download Imagen" to save it.',
        ),
      ),
      'use_cases' => 
      array (
        'title' => 'Common Use Cases',
        'list' => 
        array (
          0 => 'Debugging: Checking what Imagen data is being sent in API responses or stored in databases.',
          1 => 'Recovery: Extracting Imagens embedded in CSS files or HTML templates.',
          2 => 'Verification: Ensuring a Base64 string is not corrupted.',
        ),
      ),
    ),
    'input' => 
    array (
      'title' => 'Paste Base64 String',
      'desc' => 'Paste your code below to visualize the Imagen',
      'placeholder' => 'data:Imagen/png;base64,iVBORw0KGgo...',
      'btn_decode' => 'Decode Imagen',
    ),
    'result' => 
    array (
      'success' => 'Imagen Decoded Successfully',
      'btn_download' => 'Download Imagen',
      'btn_clear' => 'Clear Pattern',
      'image_alt' => 'Decoded Imagen',
    ),
    'js' => 
    array (
      'input_required' => 'Please paste a Base64 string first.',
      'invalid_error' => 'Invalid Base64 string or unsupported Imagen format.',
    ),
  ),
  'heic-to-jpg-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Convertidor de HEIC a JPG',
      'subtitle' => 'Convierta imágenes HEIC de Apple a formato JPG para compatibilidad universal',
      'title' => 'HEIC to JPG Convertirer - Convertir iPhone Photos Online | Optimizo',
      'description' => 'Convertir High Efficiency Imagen File (HEIC/HEIF) photos from iPhone to standard JPG format. Gratis, private, client-side Convertirer.',
    ),
    'content' => 
    array (
      'title' => 'Convertir HEIC a JPG Al Instante',
      'p1' => 'El Formato de Imagen de Alta Eficiencia (HEIC) de Apple es excelente para ahorrar espacio en tu iPhone, pero puede ser una pesadilla abrirlo en Windows, Android o software antiguo. Nuestro <strong>Convertidor de HEIC a JPG</strong> resuelve este problema al instante.',
      'p2' => 'Usamos capacidades de procesamiento local avanzadas para convertir tus fotos sin subirlas nunca a un servidor en la nube. Esta es la <strong>forma más segura</strong> de convertir fotos personales.',
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
          'desc' => 'Convertir HEIC and HEIF files from any iOS version (iPhone/iPad) to universally accepted JPGs.',
        ),
        'fast' => 
        array (
          'title' => 'Rápido & Gratis',
          'desc' => 'No software installation needed. Just drag, drop, and Convertir in seconds.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Convertir HEIC to JPG?',
        'list' => 
        array (
          0 => 'Drag your .heic or .heif file into the upload zone.',
          1 => 'The tool will automatically read and Convertir the file using advanced browser libraries.',
          2 => 'See a preview of your Convertired JPG Imagen immediately.',
          3 => 'Click the "Download JPG Imagen" button to save it to your computer.',
        ),
      ),
      'details' => 
      array (
        'title' => 'Technical Details',
        'p1' => 'HEIC (High Efficiency Imagen Container) uses modern compression methods to keep file sizes small. However, Windows and Android often struggle to open them.',
        'p2' => 'Our tool decodes the HEIC data and re-encodes it as a standardized JPEG Imagen with 90% quality retention, ensuring your photos look great while being accessible everywhere.',
      ),
      'faq' => 
      array (
        'title' => 'Common Questions',
        'q1' => 'Can I Convertir iPhone Live Photos?',
        'a1' => 'You can Convertir the still Imagen part of the Live Photo if you transfer the .HEIC file to your computer first.',
        'q2' => 'Is quality lost during conversion?',
        'a2' => 'We use a high-quality setting (0.9 out of 1.0) to ensure minimal visual difference. JPG is a lossy format, but the difference is usually negligible to the human eye.',
      ),
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
      'converted_to' => 'Convertired to:',
      'btn_download' => 'Download JPG Imagen',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'error' => 'Error Convertiring HEIC file: ',
    ),
  ),
  'ico-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Convertidor de ICO',
      'subtitle' => 'Cree archivos ICO favicon desde imágenes para sitios web y aplicaciones',
      'title' => 'ICO Convertirer - Create Favicons Online | Optimizo',
      'description' => 'Convertir Imagens to ICO format for website favicons. Supports custom sizing (32x32, 64x64). Gratis online favicon generator.',
    ),
    'content' => 
    array (
      'title' => 'Convertidor de ICO y Generador de Favicon Gratuito',
      'p1' => '¿Creando un sitio web? Necesitas un favicon: ese pequeño icono que aparece en las pestañas del navegador.',
      'p2' => 'Nuestro <strong>Convertidor de ICO</strong> transforma cualquier imagen PNG o JPG en un archivo estándar `.ico` de Microsoft. Soportamos todos los tamaños comunes de favicon para asegurar que tu marca se vea nítida en cada dispositivo.',
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
          0 => 'Use a square Imagen (PNG/JPG) for best results.',
          1 => '16x16 (Browser tabs), 32x32 (Taskbar), 48x48 (Desktop).',
          2 => 'See how it looks Instantáneoly.',
          3 => 'Get your `favicon.ico` file.',
        ),
      ),
      'why' => 
      array (
        'title' => 'Why .ICO format?',
        'p1' => 'While modern browsers support PNG favicons, the `.ico` format is still the standard for maximum compatibility across all operating systems and legacy browsers (like Internet Explorer).',
      ),
    ),
    'input' => 
    array (
      'title' => 'Upload Imagen to Convertir',
      'desc' => 'Drag & drop your PNG/JPG file',
      'drop_title' => 'Drop Imagen file here',
      'drop_desc' => 'Rápido conversion to .ico',
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
      'invalid_image' => 'Please upload a valid Imagen',
    ),
  ),
  'image-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Convertidor de Imágenes',
      'subtitle' => 'Convierta imágenes entre formatos: JPG, PNG, WebP, SVG y más al instante',
      'title' => 'Imagen Convertirer - Convertir Imagens Online Gratis | Optimizo',
      'description' => 'Convertir Imagens between multiple formats (PNG, JPG, WEBP) easily and for Gratis. Secure, client-side conversion requiring no uploads.',
    ),
    'content' => 
    array (
      'title' => 'El Mejor Convertidor de Imágenes en Línea Gratuito',
      'p1' => 'En el panorama digital actual, trabajar con imágenes requiere versatilidad. Ya seas un desarrollador web que necesita WEBP para rendimiento, un diseñador que necesita PNG para transparencia, o un fotógrafo que necesita compatibilidad universal JPG, nuestro <strong>Convertidor de Imágenes</strong> es la solución todo en uno.',
      'p2' => 'Olvídate de instalar software pesado o subir tus fotos privadas a servidores desconocidos. Nuestra herramienta se ejecuta completamente en tu navegador, asegurando <strong>100% privacidad y velocidades ultrarrápidas</strong>.',
      'features' => 
      array (
        'secure' => 
        array (
          'title' => 'Secure & Private',
          'desc' => 'Your files never leave your device. All processing happens locally in your browser.',
        ),
        'instant' => 
        array (
          'title' => 'Instantáneo Conversion',
          'desc' => 'No queuing or waiting. Powered by modern WebAssembly technology for speed.',
        ),
        'bulk' => 
        array (
          'title' => 'Bulk Processing',
          'desc' => 'Convertir unlimited Imagens one by one without any usage restrictions or costs.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Convertir Imagens?',
        'list' => 
        array (
          0 => 'Drag your Imagen file into the blue box or click to select from your device.',
          1 => 'Select your desired output format (PNG, JPG, or WEBP) from the dropdown.',
          2 => 'If choosing JPG or WEBP, use the slider to balance file size and quality.',
          3 => 'Click the "Convertir & Download" button to save your formatted Imagen Instantáneoly.',
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
        'q1' => 'Is this tool Gratis?',
        'a1' => 'Yes, absolutely. We don\'t charge anything, and there are no hidden premium features.',
        'q2' => 'Does it support transparency?',
        'a2' => 'Yes! If you Convertir to PNG or WEBP, transparency is preserved. For JPG, transparent areas become white.',
        'q3' => 'Are my Imagens uploaded?',
        'a3' => 'No. All conversion logic runs in your own browser using JavaScript and Canvas APIs. We count privacy as our top feature.',
        'q4' => 'What is the best format?',
        'a4' => 'Use <strong>JPG</strong> for photos, <strong>PNG</strong> for graphics with sharp edges/transparency, and <strong>WEBP</strong> for web performance.',
      ),
    ),
    'input' => 
    array (
      'title' => 'Upload Your Imagen',
      'desc' => 'Drag & drop or click to select an Imagen',
      'drop_title' => 'Drop your Imagen here',
      'drop_desc' => 'Supports PNG, JPG, WEBP (Max 10MB)',
    ),
    'editor' => 
    array (
      'note' => 'Note:',
      'note_text' => 'Transparent backgrounds will be filled with white color for JPG.',
      'target_format' => 'Target Format',
      'quality' => 'Quality (JPG/WEBP)',
      'btn_convert' => 'Convertir & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid Imagen file',
    ),
  ),
  'image-to-base64-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Convertidor de Imagen a Base64',
      'subtitle' => 'Codifique imágenes a cadenas Base64 para incrustar en HTML & CSS',
      'title' => 'Imagen to Base64 Convertirer - Convertir Imagen to String | Optimizo',
      'description' => 'Convertir Imagens to Base64 encoded strings for embedding in HTML or CSS. Gratis online tool supporting PNG, JPG, GIF.',
    ),
    'content' => 
    array (
      'title' => 'Convertir Imagen a Cadena Base64',
      'p1' => 'Los desarrolladores y diseñadores web a menudo necesitan incrustar imágenes directamente en archivos HTML o CSS para reducir las solicitudes HTTP.',
      'p2' => 'Nuestro <strong>Convertidor de Imagen a Base64</strong> codifica tu archivo de imagen en una larga cadena de caracteres que representa los datos binarios. Puedes pegar esta cadena directamente en tu código.',
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
          'desc' => 'Embedding small icons and logos as Base64 eliminates the network overhead of fetching external Imagen files.',
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
          0 => 'Select your Imagen file.',
          1 => 'The tool immediately Convertirs the file to a Data URI.',
          2 => 'Click "Copy to Clipboard" to grab the code.',
          3 => 'Insert it into your `src` attribute or CSS file.',
        ),
      ),
      'use_cases' => 
      array (
        'title' => 'When to use Base64?',
        'list' => 
        array (
          0 => 'Small Imagens: Best for icons, spinners, and small logos (under 10KB).',
          1 => 'Single-File Apps: When you need to bundle everything into one HTML file (e.g., email templates).',
          2 => 'Offline Access: Ensures Imagens load even without a network connection if the HTML is saved locally.',
        ),
      ),
    ),
    'input' => 
    array (
      'title' => 'Upload Imagen',
      'desc' => 'Drag & drop your Imagen file here',
      'drop_title' => 'Drop Imagen file here',
      'drop_desc' => 'Supports All Imagen Formats',
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
  ),
  'jpg-to-png-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Convertidor de JPG a PNG',
      'subtitle' => 'Convierta imágenes JPG a formato PNG con soporte de transparencia',
      'title' => 'JPG to PNG Convertirer - Convertir JPG Imagens to PNG Gratis | Optimizo',
      'description' => 'Convertir JPG Imagens to PNG format Instantáneoly. 100% Gratis, secure client-side conversion, no file size limits.',
    ),
    'content' => 
    array (
      'title' => 'Convertir JPG a PNG Al Instante',
      'p1' => 'JPG es el formato de imagen más popular del mundo, pero a menudo carece de la versatilidad necesaria para el diseño web moderno. Al convertir a PNG, obtienes acceso a compresión sin pérdida y soporte de transparencia.',
      'p2' => 'Nuestro <strong>Convertidor de JPG a PNG</strong> está diseñado para velocidad y privacidad, manejando todo directamente en tu navegador sin subir tus fotos sensibles a ningún servidor.',
      'features' => 
      array (
        'lossless' => 
        array (
          'title' => 'Lossless Quality',
          'desc' => 'Stop Imagen degradation. PNG uses lossless compression to keep every pixel perfect during edits.',
        ),
        'private' => 
        array (
          'title' => '100% Private',
          'desc' => 'Files are processed locally on your device. We never see, store, or upload your Imagens.',
        ),
        'transparency' => 
        array (
          'title' => 'Transparency Ready',
          'desc' => 'Convertir to the preferred format for logos, icons, and graphics that require transparent backgrounds.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Convertir JPG to PNG',
        'list' => 
        array (
          0 => 'Drag and drop your JPG file into the designated area.',
          1 => 'The tool immediately reads the file ready for conversion.',
          2 => 'See exactly how your Imagen looks before saving.',
          3 => 'Click "Convertir & Download" to save your new PNG Instantáneoly.',
        ),
      ),
      'faq' => 
      array (
        'title' => 'Frequently Asked Questions',
        'q1' => 'Is the quality better?',
        'a1' => 'Convertiring to PNG stops <em>future</em> quality loss. It\'s best for Imagens you plan to edit further or need to keep sharp.',
        'q2' => 'Are there file limits?',
        'a2' => 'Since we process files in your browser, the limit is determined by your device\'s memory, usually allowing files up to 50MB easily.',
      ),
    ),
    'input' => 
    array (
      'title' => 'Upload JPG Imagen',
      'desc' => 'Drag & drop your JPG/JPEG file here',
      'drop_title' => 'Drop JPG file here',
      'drop_desc' => 'Supports JPG, JPEG (Max 10MB)',
    ),
    'editor' => 
    array (
      'output_format' => 'Output Format:',
      'format_short' => 'PNG',
      'btn_convert' => 'Convertir to PNG & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid JPG Imagen',
      'converted_name' => 'Convertired-Imagen',
    ),
  ),
  'jpg-to-webp-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Convertidor de JPG a WEBP',
      'subtitle' => 'Convierta JPG a formato WebP para mejor rendimiento web y archivos más pequeños',
      'title' => 'JPG to WEBP Convertirer - Convertir Imagens to WebP | Optimizo',
      'description' => 'Convertir JPG Imagens to the modern WebP format for superior compression and web performance. Gratis online tool.',
    ),
    'content' => 
    array (
      'title' => 'Convertir JPG a WebP para Mejor Rendimiento',
      'p1' => 'WebP es un formato de imagen moderno que proporciona compresión superior con y sin pérdida para imágenes en la web. Al convertir JPG a WebP, los desarrolladores y webmasters pueden crear imágenes más pequeñas y ricas que hacen la web más rápida.',
      'p2' => 'Nuestro <strong>Convertidor de JPG a WebP</strong> te ayuda a optimizar tus imágenes al instante en el navegador, reduciendo el tamaño del archivo hasta un 30% comparado con JPEG sin pérdida de calidad estándar.',
      'features' => 
      array (
        'faster' => 
        array (
          'title' => 'Rápidoer Loading',
          'desc' => 'WebP Imagens are significantly smaller than JPGs, helping your website load Rápidoer and improving SEO scores.',
        ),
        'quality' => 
        array (
          'title' => 'High Quality',
          'desc' => 'Maintain visual fidelity while reducing file weight. Perfect for photographs and complex web graphics.',
        ),
        'secure' => 
        array (
          'title' => 'Secure Processing',
          'desc' => 'All conversions happen locally. Your sensitive Imagens never leave your computer.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Convertir JPG to WebP',
        'list' => 
        array (
          0 => 'Select or drag & drop your JPG Imagen.',
          1 => 'Use the quality slider to balance size vs quality.',
          2 => 'See the result in real-time.',
          3 => 'Save your optimized WebP Imagen.',
        ),
      ),
      'faq' => 
      array (
        'title' => 'Frequently Asked Questions',
        'q1' => 'Do all browsers support WebP?',
        'a1' => 'Yes, all modern browsers (Chrome, Firefox, Safari, Edge) fully support WebP Imagens.',
        'q2' => 'Is WebP better for SEO?',
        'a2' => 'Absolutely. Google prefers WebP because it loads Rápidoer, improving your Core Web Vitals score.',
      ),
    ),
    'input' => 
    array (
      'title' => 'Upload JPG Imagen',
      'desc' => 'Drag & drop your JPG file here',
      'drop_title' => 'Drop JPG file here',
      'drop_desc' => 'Supports JPG, JPEG (Max 10MB)',
    ),
    'editor' => 
    array (
      'output_format' => 'Output Format:',
      'quality' => 'Compression Quality',
      'format_short' => 'WEBP',
      'btn_convert' => 'Convertir to WEBP & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid JPG Imagen',
      'converted_name' => 'Convertired-Imagen',
    ),
  ),
  'png-to-jpg-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Convertidor de PNG a JPG',
      'subtitle' => 'Convierta imágenes PNG a formato JPG para reducir tamaño de archivo',
      'title' => 'PNG to JPG Convertirer - Convertir PNG to JPG Online | Optimizo',
      'description' => 'Convertir PNG Imagens to JPG format for smaller file sizes. Gratis online Convertirer.',
    ),
    'content' => 
    array (
      'title' => 'Comprimir PNG a JPG Al Instante',
      'p1' => 'Los archivos PNG son geniales para calidad, pero pueden ser masivos. Si estás subiendo fotos a un sitio web o enviándolas por correo electrónico, JPG es a menudo la mejor opción.',
      'p2' => 'Nuestro <strong>Convertidor de PNG a JPG</strong> reduce drásticamente el tamaño del archivo usando compresión JPEG. Manejamos automáticamente los fondos transparentes rellenándolos con blanco, asegurando que tus imágenes se vean perfectas.',
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
          'desc' => 'Intelligent background handling Convertirs transparency to a clean white matte.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'Steps to Convertir',
        'list' => 
        array (
          0 => 'Select a PNG Imagen from your device.',
          1 => 'The tool Instantáneoly processes the Imagen.',
          2 => 'Check the preview (transparent areas will now be white).',
          3 => 'Download your optimized JPG file.',
        ),
      ),
      'why' => 
      array (
        'title' => 'When to use JPG?',
        'list' => 
        array (
          0 => 'Photographs: JPG is designed for complex, real-world Imagens.',
          1 => 'Web Uploads: Many forms only accept .jpg or .jpeg.',
          2 => 'Saving Space: If you have thousands of Imagens, JPG saves GBs of storage.',
        ),
      ),
    ),
    'input' => 
    array (
      'title' => 'Upload PNG Imagen',
      'desc' => 'Drag & drop your PNG file here',
      'drop_title' => 'Drop PNG file here',
      'drop_desc' => 'Supports PNG (Max 10MB)',
    ),
    'editor' => 
    array (
      'note' => 'Note:',
      'note_text' => 'Transparent backgrounds will be Convertired to white.',
      'output_format' => 'Output Format:',
      'btn_convert' => 'Convertir to JPG & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid PNG Imagen',
    ),
  ),
  'png-to-webp-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Convertidor de PNG a WEBP',
      'subtitle' => 'Convierta PNG a WebP para optimización web moderna y mejor compresión',
      'title' => 'PNG to WEBP Convertirer - Compress PNG to WebP | Optimizo',
      'description' => 'Convertir PNG Imagens to WebP to reduce file size while maintaining transparency. Enhance your website loading speed.',
    ),
    'content' => 
    array (
      'title' => 'Optimizar Imágenes con PNG a WebP',
      'p1' => '¿Quieres tiempos de carga de sitio web más rápidos? Convertir tus PNGs a WebP es la recomendación #1 de Google PageSpeed Insights.',
      'p2' => 'Nuestra herramienta comprime tus imágenes PNG en el moderno formato WebP, reduciendo el tamaño del archivo en hasta <strong>30-50%</strong> mientras mantiene el fondo transparente y la calidad nítida.',
      'features' => 
      array (
        'smaller' => 
        array (
          'title' => 'Significantly Smaller',
          'desc' => 'WebP offers superior compression. Save bandwidth and storage space Instantáneoly.',
        ),
        'transparency' => 
        array (
          'title' => 'Transparency Kept',
          'desc' => 'Unlike Convertiring to JPG, switching from PNG to WebP preserves your alpha channel (background transparency).',
        ),
        'adjustable' => 
        array (
          'title' => 'Adjustable Quality',
          'desc' => 'You control the balance. Choose 90% for high quality or 70% for maximum savings.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Convertir?',
        'list' => 
        array (
          0 => 'Drag and drop your file.',
          1 => 'Use the slider. We recommend 80-90% for a good balance.',
          2 => 'Click the "Convertir" button.',
          3 => 'Your lighter .webp file is ready.',
        ),
      ),
      'why' => 
      array (
        'title' => 'Why WebP?',
        'p1' => 'WebP is a modern Imagen format developed by Google.',
        'list' => 
        array (
          0 => 'SEO Boost: Rápidoer sites rank better on Google.',
          1 => 'Mobile Friendly: Uses less data for mobile visitors.',
          2 => 'Support: Supported by Chrome, Firefox, Safari, Edge, and all modern browsers.',
        ),
      ),
    ),
    'input' => 
    array (
      'title' => 'Upload PNG Imagen',
      'desc' => 'Drag & drop your PNG file here',
      'drop_title' => 'Drop PNG file here',
      'drop_desc' => 'Supports PNG (Max 10MB)',
    ),
    'editor' => 
    array (
      'output_format' => 'Output Format:',
      'quality' => 'Compression Quality',
      'btn_convert' => 'Convertir to WEBP & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid PNG Imagen',
    ),
  ),
  'svg-to-jpg-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Convertidor de SVG a JPG',
      'subtitle' => 'Convierta gráficos vectoriales SVG a imágenes raster JPG con tamaño personalizado',
      'title' => 'SVG to JPG Convertirer - Vector to Raster Conversion | Optimizo',
      'description' => 'Convertir SVG vector files to JPG Imagens online. Auto-fills transparent backgrounds with white for perfect JPG output.',
    ),
    'content' => 
    array (
      'title' => 'Convertir SVG a Formato JPG',
      'p1' => '¿Necesitas usar un logo en un documento o en un sitio web que no acepta archivos vectoriales? Nuestro <strong>Convertidor de SVG a JPG</strong> es la respuesta.',
      'p2' => 'Crea un archivo de imagen sólido y de alta compatibilidad desde tu fuente vectorial. Manejamos automáticamente la transparencia agregando un fondo blanco limpio, asegurando que tu gráfico se vea profesional en cualquier medio.',
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
          2 => 'Observe the Imagen. Note that transparent backgrounds are now white.',
          3 => 'Click "Convertir to JPG & Download".',
        ),
      ),
      'why' => 
      array (
        'title' => 'Why choose JPG over PNG for Vectors?',
        'p1' => 'While PNG supports transparency, JPG generates smaller file sizes for complex, colorful Imagens.',
        'list' => 
        array (
          0 => 'Smaller Files: Better for emails and attachments.',
          1 => 'No Transparency Issues: Some viewers render transparency as black. JPG forces a white background, ensuring your logo is legible.',
        ),
      ),
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
      'btn_convert' => 'Convertir to JPG & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid SVG Imagen',
    ),
  ),
  'svg-to-png-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Convertidor de SVG a PNG',
      'subtitle' => 'Convierta archivos vectoriales SVG a imágenes raster PNG con transparencia',
      'title' => 'SVG to PNG Convertirer - Rasterize SVG Imagens | Optimizo',
      'description' => 'Convertir Scalable Vector Graphics (SVG) to PNG Imagens Instantáneoly. Perfect for ensuring compatibility with applications that don\'t support vector files.',
    ),
    'content' => 
    array (
      'title' => 'Rasterizar SVG a PNG Alta Res',
      'p1' => 'Los Gráficos Vectoriales Escalables (SVG) son perfectos para la web, pero imposibles de usar en redes sociales, en documentos de Word, o como adjuntos de correo electrónico.',
      'p2' => 'Nuestro <strong>Convertidor de SVG a PNG</strong> te permite convertir tu logo o icono vectorial en una imagen PNG transparente de alta calidad. Con nuestra característica única de <strong>escalado</strong>, puedes producir imágenes de ultra alta resolución sin pixelación.',
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
          'desc' => 'Rápido and secure. No files are uploaded to any server.',
        ),
      ),
      'how_to' => 
      array (
        'title' => 'How to Convertir SVG to PNG?',
        'list' => 
        array (
          0 => 'Drop your `.svg` file into the upload area.',
          1 => 'Select `1x`, `2x`, or `4x` from the dropdown. Higher is better for quality.',
          2 => 'Check the preview Imagen on the left. The checkerboard indicates transparency.',
          3 => 'Hit the button to generate and download your PNG.',
        ),
      ),
      'why' => 
      array (
        'title' => 'Why Convertir Vectors?',
        'p1' => 'Vectors are mathematical formulas, while PNGs are grids of pixels. You need pixels for:',
        'list' => 
        array (
          0 => 'Profile pictures (Twitter/LinkedIn often reject SVG).',
          1 => 'Embedding in emails (SVG support is poor).',
          2 => 'Using in video editors or simple graphic tools (Canva, Paint).',
        ),
      ),
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
      'btn_convert' => 'Convertir to PNG & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid SVG Imagen',
    ),
  ),
  'webp-to-jpg-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Convertidor de WEBP a JPG',
      'subtitle' => 'Convierta imágenes WebP a formato JPG para máxima compatibilidad',
      'title' => 'WEBP to JPG Convertirer - Convertir WebP to JPG Online | Optimizo',
      'description' => 'Convertir WebP Imagens to standard JPG format for broad compatibility. Gratis, Rápido, and secure Convertirer.',
    ),
    'content' => 
    array (
      'title' => 'WebP a JPG: El Solucionador de Compatibilidad',
      'p1' => 'WebP es fantástico para la velocidad del sitio web, pero es un dolor cuando intentas abrirlo en Photoshop, visores de imágenes antiguos, o subirlo a plataformas que solo aceptan JPG.',
      'p2' => 'Nuestro <strong>Convertidor de WebP a JPG</strong> une esta brecha. Toma tus imágenes WebP altamente optimizadas y las transforma en el formato JPEG universalmente compatible en milisegundos.',
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
          0 => 'Click the box or drag your WebP Imagen onto the page.',
          1 => 'The tool will display a preview of your Imagen.',
          2 => 'Click the "Convertir to JPG" button. The system handles transparency and compression automatically.',
          3 => 'Your new .jpg file will download Instantáneoly.',
        ),
      ),
      'why' => 
      array (
        'title' => 'Why Convertir WebP?',
        'list' => 
        array (
          0 => 'Editing: Many desktop editors typically don\'t support WebP out of the box.',
          1 => 'Email: Outlook and other email clients might not render WebP inline Imagens correctly.',
          2 => 'Printing: Print shops often require standard JPG or TIFF files.',
        ),
      ),
      'faq' => 
      array (
        'title' => 'FAQ',
        'q1' => 'What happens to transparent backgrounds?',
        'a1' => 'Since JPG doesn\'t support transparency, our tool replaces transparent areas with white. This is perfect for product photos and logos.',
        'q2' => 'Is it safe?',
        'a2' => 'Yes. Unlike other Convertirers that upload your file to a server, this tool runs 100% on your device. Your data remains private.',
      ),
    ),
    'input' => 
    array (
      'title' => 'Upload WEBP Imagen',
      'desc' => 'Drag & drop your WEBP file here',
      'drop_title' => 'Drop WEBP file here',
      'drop_desc' => 'Supports WEBP (Max 10MB)',
    ),
    'editor' => 
    array (
      'note' => 'Note:',
      'note_text' => 'Transparent backgrounds (common in WEBP) will be verified to white.',
      'output_format' => 'Output Format:',
      'btn_convert' => 'Convertir to JPG & Download',
      'image_alt' => 'Preview',
    ),
    'js' => 
    array (
      'invalid_image' => 'Please upload a valid WEBP Imagen',
    ),
  ),
);
