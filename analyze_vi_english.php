<?php

$viDir = 'resources/lang/vi/tools';
$files = glob($viDir . '/*.json');
$englishFound = [];
$detailedReport = [];

function checkForEnglish($data, $path = '')
{
    $items = [];
    foreach ($data as $key => $value) {
        $currentPath = $path ? $path . '.' . $key : $key;

        if (is_array($value)) {
            $items = array_merge($items, checkForEnglish($value, $currentPath));
        } elseif (is_string($value)) {
            // Check for common English words/patterns
            if (preg_match('/\b(the|and|or|is|are|was|were|have|has|had|do|does|did|will|would|should|could|can|may|might|must|shall|this|that|these|those|with|from|for|about|into|through|during|before|after|above|below|between|under|over|within|without|Enter|Click|Select|Choose|Upload|Download|Copy|Paste|Delete|Remove|Add|Create|Update|Edit|Save|Cancel|Submit|Reset|Clear|Search|Filter|Sort|Export|Import|Print|Share|Send|Receive|Open|Close|Start|Stop|Pause|Resume|Play|Record|Capture|Generate|Convert|Calculate|Analyze|Process|Validate|Verify|Confirm|Approve|Reject|Accept|Decline|Enable|Disable|Activate|Deactivate|Install|Uninstall|Configure|Settings|Options|Preferences|Help|Support|Documentation|Tutorial|Guide|FAQ|About|Contact|Privacy|Terms|License|Copyright|Version|Status|Error|Warning|Success|Info|Message|Notification|Alert|Confirmation|Question|Answer|Result|Output|Input|File|Folder|Directory|Path|URL|Link|Image|Video|Audio|Document|Text|Number|Date|Time|Email|Phone|Address|Name|Title|Description|Content|Value|Type|Format|Size|Length|Width|Height|Color|Style|Theme|Template|Layout|Design|Interface|User|Account|Profile|Login|Logout|Register|Sign|Password|Username|Remember|Forgot|Change|Verify)\b/i', $value)) {
                $items[] = [
                    'path' => $currentPath,
                    'value' => $value
                ];
            }
        }
    }
    return $items;
}

foreach ($files as $file) {
    $content = file_get_contents($file);
    $data = json_decode($content, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo 'JSON Error in ' . basename($file) . ': ' . json_last_error_msg() . PHP_EOL;
        continue;
    }

    $englishItems = checkForEnglish($data, '');

    if (!empty($englishItems)) {
        $englishFound[basename($file)] = count($englishItems);
        $detailedReport[basename($file)] = $englishItems;
    }
}

if (empty($englishFound)) {
    echo 'No English content detected in Vietnamese files.' . PHP_EOL;
} else {
    echo '=== FILES WITH POTENTIAL ENGLISH CONTENT ===' . PHP_EOL . PHP_EOL;
    foreach ($englishFound as $file => $count) {
        echo $file . ': ' . $count . ' items with English content' . PHP_EOL;
    }

    echo PHP_EOL . '=== DETAILED REPORT ===' . PHP_EOL . PHP_EOL;
    foreach ($detailedReport as $file => $items) {
        echo '--- ' . $file . ' ---' . PHP_EOL;
        foreach (array_slice($items, 0, 10) as $item) {
            echo '  Path: ' . $item['path'] . PHP_EOL;
            echo '  Value: ' . substr($item['value'], 0, 100) . (strlen($item['value']) > 100 ? '...' : '') . PHP_EOL;
            echo PHP_EOL;
        }
        if (count($items) > 10) {
            echo '  ... and ' . (count($items) - 10) . ' more items' . PHP_EOL;
        }
        echo PHP_EOL;
    }
}
