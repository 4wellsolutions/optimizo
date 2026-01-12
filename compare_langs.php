<?php
$en = include __DIR__ . '/resources/lang/en/tools/utilities.php';
$ru = include __DIR__ . '/resources/lang/ru/tools/utilities.php';

$enKeys = array_keys($en);
$ruKeys = array_keys($ru);

$missingInRu = array_diff($enKeys, $ruKeys);
$missingInEn = array_diff($ruKeys, $enKeys);

echo "EN count: " . count($en) . "\n";
echo "RU count: " . count($ru) . "\n";
echo "Missing in RU: " . implode(', ', $missingInRu) . "\n";


$deepErrors = [];
foreach ($en as $tool => $data) {
    if (!isset($ru[$tool])) {
        continue; // Already caught by top-level check
    }

    // Check for critical sub-sections
    $subSections = ['meta', 'editor', 'content', 'js'];
    foreach ($subSections as $section) {
        if (isset($data[$section]) && !isset($ru[$tool][$section])) {
            $deepErrors[] = "Tool '$tool' is missing subsection '$section' in RU.";
        }
    }
}

if (count($missingInRu) === 0 && count($deepErrors) === 0) {
    echo "SUCCESS: All keys and critical subsections from EN are present in RU.\n";
} else {
    echo "FAILURE: Issues found.\n";
    if (count($missingInRu) > 0)
        echo "Missing tools: " . implode(', ', $missingInRu) . "\n";
    if (count($deepErrors) > 0)
        echo implode("\n", $deepErrors) . "\n";
}
