<?php

// Comprehensive translation script for development.php

$esFile = 'resources/lang/es/tools/development.php';
$enFile = 'resources/lang/en/tools/development.php';

echo "Loading Spanish development.php...\n";
$esData = include $esFile;

if (!is_array($esData)) {
    die("Error: Could not load Spanish file\n");
}

echo "Applying comprehensive English translations...\n";

// Comprehensive translation map
$translations = [
    // Titles and headers
    'Convertidor de Color RGB a HEX' => 'RGB to HEX Color Converter',
    'Formateador JSON' => 'JSON Formatter',
    'Base64 Codificarr & Decodificarr' => 'Base64 Encoder & Decoder',
    'Codificador y Decodificador Base64' => 'Base64 Encoder & Decoder',
    'Visor HTML' => 'HTML Viewer',
    'Analizador y Validador JSON' => 'JSON Parser & Validator',
    'Formateador de Código en Línea' => 'Code Formatter',
    'Formateador de CÃ³digo en LÃ­nea' => 'Code Formatter',
    'Minificador y Embellecedor CSS' => 'CSS Minifier & Beautifier',
    'Minificador de JavaScript' => 'JavaScript Minifier',
    'Minificador y Embellecedor HTML' => 'HTML Minifier & Beautifier',
    'Formateador de XML' => 'XML Formatter',
    'Verificador de Diferencias de Archivos' => 'File Difference Checker',
    'Generador de Tareas Cron' => 'Cron Job Generator',
    'Constructor de Comandos CURL' => 'CURL Command Builder',

    // Descriptions - these are the ones showing in the image
    'Convert colors between RGB and HEX formats al instante con nuestra herramienta gratuita de conversión de colores en línea.' => 'Convert colors between RGB and HEX formats instantly',
    'Convierte colores entre formatos RGB y HEX al instante con nuestra herramienta gratuita de conversión de colores en línea.' => 'Convert colors between RGB and HEX formats instantly',
    'Convierte colores entre formatos RGB y HEX al instante con nuestra herramienta gratuita de conversiÃ³n de colores en lÃ­nea.' => 'Convert colors between RGB and HEX formats instantly',

    'Formatea, valida y minifica tus datos JSON' => 'Format, validate and minify your JSON data',
    'Formatea, valida y minifica tus datos JSON.' => 'Format, validate and minify your JSON data',

    'Codificar and Decodificar Base64 data instantÃ¡neoly' => 'Encode and decode Base64 data instantly',
    'Codificar y Decodificar datos Base64 al instante' => 'Encode and decode Base64 data instantly',
    'Codifica y decodifica datos Base64 al instante' => 'Encode and decode Base64 data instantly',

    'Previsualiza código HTML en tiempo real' => 'Preview HTML code in real-time',
    'Previsualiza cÃ³digo HTML en tiempo real' => 'Preview HTML code in real-time',

    'Analiza, valida y visualiza la estructura JSON' => 'Parse, validate, and visualize JSON structure',

    'Embellece y formatea tu código al instante' => 'Beautify and format your code instantly',
    'Embellece y formatea tu cÃ³digo al instante' => 'Beautify and format your code instantly',

    'Optimize CSS files for faster page loads para cargas más rápidas' => 'Optimize CSS files for faster page loads',
    'Optimiza archivos CSS para cargas de página más rápidas' => 'Optimize CSS files for faster page loads',
    'Optimiza archivos CSS para cargas mÃ¡s rÃ¡pidas' => 'Optimize CSS files for faster page loads',

    'Comprime y optimiza tu código JavaScript' => 'Compress and optimize your JavaScript code',
    'Comprime y optimiza tu cÃ³digo JavaScript' => 'Compress and optimize your JavaScript code',

    'Comprime o formatea código HTML al instante' => 'Compress or format HTML code instantly',
    'Comprime o formatea cÃ³digo HTML al instante' => 'Compress or format HTML code instantly',

    'Formatea, embellece y minifica datos XML' => 'Format, beautify, and minify XML data',

    'Calcula diferencias de precios y cambios porcentuales al instante' => 'Compare two text files and find differences instantly',
    'Compara dos archivos de texto y encuentra diferencias al instante' => 'Compare two text files and find differences instantly',

    'Crea programaciones cron fácilmente con nuestro generador visual' => 'Create cron schedules easily with our visual generator',
    'Crea programaciones cron fÃ¡cilmente con nuestro generador visual' => 'Create cron schedules easily with our visual generator',

    'Construye comandos cURL fácilmente con nuestro constructor visual' => 'Build cURL commands easily with our visual builder',
    'Construye comandos cURL fÃ¡cilmente con nuestro constructor visual' => 'Build cURL commands easily with our visual builder',

    // Common phrases
    'al instante' => 'instantly',
    'con nuestra' => 'with our',
    'herramienta gratuita' => 'free tool',
    'en línea' => 'online',
    'en lÃ­nea' => 'online',
    'más rápidas' => 'faster',
    'mÃ¡s rÃ¡pidas' => 'faster',
    'fácilmente' => 'easily',
    'fÃ¡cilmente' => 'easily',
];

// Recursive function to translate strings
function translateText($data, $translations)
{
    if (is_string($data)) {
        // Apply all translations
        foreach ($translations as $es => $en) {
            $data = str_replace($es, $en, $data);
        }
        return $data;
    }

    if (is_array($data)) {
        foreach ($data as $key => $value) {
            $data[$key] = translateText($value, $translations);
        }
    }

    return $data;
}

$enData = translateText($esData, $translations);

// Write English file
$content = "<?php\n\nreturn " . var_export($enData, true) . ";\n";
file_put_contents($enFile, $content);

echo "✅ Created English development.php\n";
echo "Tools translated: " . count($enData) . "\n";

// Verify a few translations
echo "\nVerifying translations:\n";
echo "RGB tool subtitle: " . $enData['rgb-hex-converter']['meta']['subtitle'] . "\n";
echo "JSON tool subtitle: " . $enData['json-formatter']['meta']['subtitle'] . "\n";
echo "Base64 tool subtitle: " . $enData['base64-encoder-decoder']['meta']['subtitle'] . "\n";
