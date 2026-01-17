<?php
$slug = 'rgb-hex-converter';
$viewContent = <<<'EOD'
@section('title', __tool('rgb-hex-converter', 'meta.title'))
<h3 class="text-xl font-bold text-gray-900 mb-4">{{ __tool('rgb-hex-converter', 'editor.rgb_to_hex', 'RGB to HEX') }}</h3>
EOD;

$pattern = '/__tool\s*\(\s*[\'"]' . preg_quote($slug) . '[\'"]\s*,\s*[\'"]([^\'"]+?)[\'"](?:\s*,\s*[\'"](.*?)[\'"]\s*)?\)/s';

if (preg_match_all($pattern, $viewContent, $matches)) {
    print_r($matches);
} else {
    echo "No matches found\n";
}
