<?php

// Fill empty keys in development.json with SEO-optimized content

$file = 'resources/lang/en/tools/development.json';
$content = file_get_contents($file);
$data = json_decode($content, true);

// Define the content to fill
$fills = [
    'code-formatter.editor.indents.2' => '2 Spaces',
    'code-formatter.editor.indents.4' => '4 Spaces',
    'css-minifier.content.how_steps.5' => 'Download or copy the minified CSS and use it in your production website to reduce file size and improve load times.',
    'css-minifier.content.best_practices_list.5' => 'Keep an unminified version for development and debugging purposes.',
    'html-encoder-decoder.content.how_steps.4' => 'Copy the encoded/decoded result and use it in your HTML, XML, or web applications.',
    'html-encoder-decoder.content.examples.3.title' => 'Encoding Special Characters',
    'html-encoder-decoder.content.examples.3.code' => '&lt;script&gt;alert("XSS")&lt;/script&gt; → &amp;lt;script&amp;gt;alert(&amp;quot;XSS&amp;quot;)&amp;lt;/script&amp;gt;',
    'html-minifier.content.how_steps.4' => 'Use the minified HTML in your production environment to reduce bandwidth and improve page load speed.',
    'html-to-markdown-converter.content.features_list.6' => 'Preserves code blocks and syntax highlighting for technical documentation.',
    'html-viewer.content.how_steps.5' => 'Analyze the rendered output and DOM structure to debug layout issues or verify HTML rendering.',
    'json-formatter.content.how_steps.3.title' => 'Format or Minify',
    'json-formatter.content.how_steps.3.desc' => 'Choose to beautify (format with indentation) or minify (compress to single line) your JSON data based on your needs.'
];

// Function to set nested array value
function setNestedValue(&$array, $path, $value)
{
    $keys = explode('.', $path);
    $current = &$array;

    foreach ($keys as $key) {
        if (!isset($current[$key])) {
            $current[$key] = [];
        }
        $current = &$current[$key];
    }

    $current = $value;
}

// Fill the empty keys
foreach ($fills as $path => $value) {
    setNestedValue($data, $path, $value);
}

// Save the file
$json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
file_put_contents($file, $json);

echo "✅ development.json: Filled 12 empty keys\n";
echo "  - code-formatter indent labels (2 keys)\n";
echo "  - css-minifier steps and practices (2 keys)\n";
echo "  - html-encoder-decoder steps and examples (3 keys)\n";
echo "  - html-minifier, html-to-markdown, html-viewer (3 keys)\n";
echo "  - json-formatter steps (2 keys)\n";
