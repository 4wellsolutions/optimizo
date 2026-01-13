<?php

/**
 * Add meta.subtitle to all 11 Document tools - SPANISH
 */

$esSubtitles = [
    'pdf-to-word' => 'Convierta documentos PDF a archivos Word editables al instante con alta precisión',
    'word-to-pdf' => 'Transforme documentos Word a formato PDF con formato perfecto preservado',
    'excel-to-pdf' => 'Convierta hojas de Excel a documentos PDF profesionales sin esfuerzo',
    'pdf-to-excel' => 'Extraiga datos de PDF a hojas de Excel editables con precisión',
    'ppt-to-pdf' => 'Convierta presentaciones PowerPoint a formato PDF para compartir fácilmente',
    'pdf-to-ppt' => 'Transforme documentos PDF en presentaciones PowerPoint editables',
    'jpg-to-pdf' => 'Convierta imágenes JPG a documentos PDF con configuración personalizada',
    'pdf-to-jpg' => 'Extraiga páginas de PDF como imágenes JPG de alta calidad al instante',
    'pdf-compressor' => 'Reduzca el tamaño de archivos PDF manteniendo calidad para compartir rápido',
    'pdf-merger' => 'Combine múltiples archivos PDF en un solo documento sin esfuerzo',
    'pdf-splitter' => 'Divida documentos PDF en páginas separadas o extraiga rangos específicos',
];

$esH1s = [
    'pdf-to-word' => 'Convertidor de PDF a Word',
    'word-to-pdf' => 'Convertidor de Word a PDF',
    'excel-to-pdf' => 'Convertidor de Excel a PDF',
    'pdf-to-excel' => 'Convertidor de PDF a Excel',
    'ppt-to-pdf' => 'Convertidor de PowerPoint a PDF',
    'pdf-to-ppt' => 'Convertidor de PDF a PowerPoint',
    'jpg-to-pdf' => 'Convertidor de JPG a PDF',
    'pdf-to-jpg' => 'Convertidor de PDF a JPG',
    'pdf-compressor' => 'Compresor de PDF',
    'pdf-merger' => 'Fusionador de PDF',
    'pdf-splitter' => 'Divisor de PDF',
];

// Spanish file
$esFile = __DIR__ . '/resources/lang/es/tools/document.php';
$esTranslations = include $esFile;

$updated = 0;

foreach ($esSubtitles as $slug => $subtitle) {
    if (isset($esTranslations[$slug])) {
        if (!isset($esTranslations[$slug]['meta'])) {
            $esTranslations[$slug]['meta'] = [];
        }
        if (!isset($esTranslations[$slug]['meta']['h1'])) {
            $esTranslations[$slug]['meta']['h1'] = $esH1s[$slug];
        }
        $esTranslations[$slug]['meta']['subtitle'] = $subtitle;
        echo "✓ Added ES subtitle for: $slug\n";
        $updated++;
    }
}

// Generate output
$output = "<?php\n\nreturn [\n";

foreach ($esTranslations as $toolSlug => $toolData) {
    $output .= "    // " . ucwords(str_replace('-', ' ', $toolSlug)) . "\n";
    $output .= "    '{$toolSlug}' => [\n";

    if (isset($toolData['meta'])) {
        $output .= "        'meta' => [\n";
        if (isset($toolData['meta']['h1'])) {
            $h1 = str_replace("'", "\\'", $toolData['meta']['h1']);
            $output .= "            'h1' => '{$h1}',\n";
        }
        if (isset($toolData['meta']['subtitle'])) {
            $subtitle = str_replace("'", "\\'", $toolData['meta']['subtitle']);
            $output .= "            'subtitle' => '{$subtitle}',\n";
        }
        $output .= "        ],\n";
    }

    if (isset($toolData['seo'])) {
        $output .= "        'seo' => [\n";
        foreach ($toolData['seo'] as $key => $value) {
            $escapedValue = str_replace("'", "\\'", $value);
            $output .= "            '{$key}' => '{$escapedValue}',\n";
        }
        $output .= "        ],\n";
    }

    if (isset($toolData['form'])) {
        $output .= "        'form' => [\n";
        foreach ($toolData['form'] as $key => $value) {
            $escapedValue = str_replace("'", "\\'", $value);
            $output .= "            '{$key}' => '{$escapedValue}',\n";
        }
        $output .= "        ],\n";
    }

    if (isset($toolData['content'])) {
        $output .= "        'content' => [\n";
        foreach ($toolData['content'] as $key => $value) {
            $escapedValue = str_replace("'", "\\'", $value);
            $output .= "            '{$key}' => '{$escapedValue}',\n";
        }
        $output .= "        ],\n";
    }

    $output .= "    ],\n\n";
}

$output .= "];\n";

file_put_contents($esFile, $output);

echo "\n✅ ES Document tools complete: {$updated}/11\n";
