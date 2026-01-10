<?php
/**
 * Script to bulk update all document converter Blade files
 * Adds form IDs, action URLs, and includes universal AJAX script
 */

$files = [
    'pdf-to-excel' => 'd:/workspace/optimizo/resources/views/tools/document/pdf-to-excel.blade.php',
    'word-to-pdf' => 'd:/workspace/optimizo/resources/views/tools/document/word-to-pdf.blade.php',
    'pdf-to-word' => 'd:/workspace/optimizo/resources/views/tools/document/pdf-to-word.blade.php',
    'ppt-to-pdf' => 'd:/workspace/optimizo/resources/views/tools/document/ppt-to-pdf.blade.php',
    'pdf-to-ppt' => 'd:/workspace/optimizo/resources/views/tools/document/pdf-to-ppt.blade.php',
    'jpg-to-pdf' => 'd:/workspace/optimizo/resources/views/tools/document/jpg-to-pdf.blade.php',
    'pdf-to-jpg' => 'd:/workspace/optimizo/resources/views/tools/document/pdf-to-jpg.blade.php',
    'pdf-compressor' => 'd:/workspace/optimizo/resources/views/tools/document/pdf-compressor.blade.php',
    'pdf-merger' => 'd:/workspace/optimizo/resources/views/tools/document/pdf-merger.blade.php',
    'pdf-splitter' => 'd:/workspace/optimizo/resources/views/tools/document/pdf-splitter.blade.php',
];

foreach ($files as $toolName => $filePath) {
    echo "Processing: $toolName\n";

    $content = file_get_contents($filePath);

    // Step 1: Add form ID and action URL
    // Replace <form action="#" with <form id="converterForm" action="{{ route('utility.xxx.process') }}"
    $content = preg_replace(
        '/<form\s+(id="converterForm"\s+)?action="[^"]*"/i',
        '<form id="converterForm" action="{{ route(\'utility.' . $toolName . '.process\') }}"',
        $content
    );

    // Step 2: Replace @push('scripts') blocks with universal script include
    // Find and remove the entire @push('scripts')...@endpush block
    $content = preg_replace(
        '/@push\([\'"]scripts[\'"]\)\s*<script>.*?<\/script>\s*@endpush/s',
        "@push('scripts')\n        <script src=\"{{ asset('js/document-converter-ajax.js') }}\"></script>\n    @endpush",
        $content
    );

    // Write updated content
    file_put_contents($filePath, $content);
    echo "✓ Updated: $toolName\n";
}

echo "\n✓✓✓ All 10 files updated successfully!\n";
