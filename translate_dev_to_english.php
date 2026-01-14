<?php

// Simple approach: Copy Spanish structure and translate key fields to English

$esFile = 'resources/lang/es/tools/development.php';
$enFile = 'resources/lang/en/tools/development.php';

echo "Loading Spanish development.php...\n";
$esData = include $esFile;

if (!is_array($esData)) {
    die("Error: Could not load Spanish file\n");
}

echo "Translating to English...\n";

// Translation map for common Spanish to English terms
$translations = [
    // Meta translations
    'Convertidor de Color RGB a HEX' => 'RGB to HEX Color Converter',
    'Convierte colores entre formatos RGB y HEX' => 'Convert colors between RGB and HEX formats',
    'Formateador JSON' => 'JSON Formatter',
    'Formatea y valida tu JSON' => 'Format and validate your JSON data',
    'Codificador y Decodificador Base64' => 'Base64 Encoder & Decoder',
    'Codifica y decodifica datos Base64' => 'Encode and decode Base64 data',
    'Visor HTML' => 'HTML Viewer',
    'Previsualiza código HTML' => 'Preview HTML code in real-time',
    'Analizador y Validador JSON' => 'JSON Parser & Validator',
    'Analiza y valida estructura JSON' => 'Parse, validate, and visualize JSON structure',
    'Formateador de Código' => 'Code Formatter',
    'Embellece y formatea tu código' => 'Beautify and format your code instantly',
    'Minificador y Embellecedor CSS' => 'CSS Minifier & Beautifier',
    'Optimiza archivos CSS' => 'Optimize CSS files for faster page loads',
    'Minificador JavaScript' => 'JavaScript Minifier',
    'Comprime y optimiza tu código JavaScript' => 'Compress and optimize your JavaScript code',
    'Minificador y Embellecedor HTML' => 'HTML Minifier & Beautifier',
    'Comprime o formatea código HTML' => 'Compress or format HTML code instantly',
    'Formateador XML' => 'XML Formatter',
    'Formatea, embellece y minifica XML' => 'Format, beautify, and minify XML data',
    'Verificador de Diferencias de Archivos' => 'File Difference Checker',
    'Compara dos archivos de texto' => 'Compare two text files and find differences instantly',
    'Generador de Trabajos Cron' => 'Cron Job Generator',
    'Crea horarios cron fácilmente' => 'Create cron schedules easily with our visual generator',
    'Constructor de Comandos CURL' => 'CURL Command Builder',
    'Construye comandos cURL fácilmente' => 'Build cURL commands easily with our visual builder',

    // Common editor labels
    'Rojo' => 'Red',
    'Verde' => 'Green',
    'Azul' => 'Blue',
    'Color HEX' => 'HEX Color',
    'Color RGB' => 'RGB Color',
    'HEX a RGB' => 'HEX to RGB',
    'RGB a HEX' => 'RGB to HEX',
    'Entrada JSON' => 'JSON Input',
    'Salida Formateada' => 'Formatted Output',
    'Formatear' => 'Format',
    'Validar' => 'Validate',
    'Minificar' => 'Minify',
    'Copiar' => 'Copy',
    'Limpiar' => 'Clear',
    'Ejemplo' => 'Example',
    'Descargar' => 'Download',
    'Convertir' => 'Convert',
    'Comparar' => 'Compare',
    'Generar' => 'Generate',
    'Construir' => 'Build',

    // Error messages
    'HEX inválido' => 'Invalid HEX',
    'JSON inválido' => 'Invalid JSON',
    'Por favor ingresa' => 'Please enter',
    'Copiado al portapapeles' => 'Copied to clipboard',
    'Nada para copiar' => 'Nothing to copy',
];

// Recursive function to translate strings in array
function translateArray($data, $translations)
{
    if (is_string($data)) {
        // Check if this string needs translation
        foreach ($translations as $es => $en) {
            if (stripos($data, $es) !== false) {
                $data = str_ireplace($es, $en, $data);
            }
        }
        return $data;
    }

    if (is_array($data)) {
        foreach ($data as $key => $value) {
            $data[$key] = translateArray($value, $translations);
        }
    }

    return $data;
}

$enData = translateArray($esData, $translations);

// Write English file
$content = "<?php\n\nreturn " . var_export($enData, true) . ";\n";
file_put_contents($enFile, $content);

echo "✅ Created English development.php with translations\n";
echo "Tools translated: " . count($enData) . "\n";
