<?php

// Fill empty keys in time.json with SEO-optimized content

$file = 'resources/lang/en/tools/time.json';
$content = file_get_contents($file);
$data = json_decode($content, true);

// Define the content to fill
$fills = [
    'epoch-time-converter.current_epoch.title' => 'Current Unix Timestamp',
    'epoch-time-converter.current_epoch.subtitle' => 'Live epoch time in seconds',
    'epoch-time-converter.click_to_copy' => 'Click to copy',
    'epoch-time-converter.timestamp_to_date.title' => 'Convert Timestamp to Date',
    'epoch-time-converter.timestamp_to_date.label' => 'Enter Unix Timestamp',
    'epoch-time-converter.timestamp_to_date.placeholder' => 'e.g., 1234567890',
    'epoch-time-converter.timestamp_to_date.button' => 'Convert to Date',
    'epoch-time-converter.timestamp_to_date.result_gmt' => 'GMT/UTC',
    'epoch-time-converter.timestamp_to_date.result_local' => 'Your Local Time',
    'epoch-time-converter.timestamp_to_date.result_relative' => 'Relative',
    'epoch-time-converter.date_to_timestamp.title' => 'Convert Date to Timestamp',
    'epoch-time-converter.date_to_timestamp.label' => 'Select Date and Time',
    'epoch-time-converter.date_to_timestamp.checkbox' => 'Use current time',
    'epoch-time-converter.date_to_timestamp.button' => 'Convert to Timestamp',
    'epoch-time-converter.date_to_timestamp.result_title' => 'Unix Timestamp',
    'epoch-time-converter.faq.q1' => 'What is Unix timestamp (epoch time)?',
    'epoch-time-converter.faq.a1' => 'Unix timestamp (also known as epoch time or POSIX time) is the number of seconds that have elapsed since January 1, 1970, 00:00:00 UTC. It\'s a widely used standard for representing time in computer systems and programming.',
    'epoch-time-converter.faq.q2' => 'Why use epoch time instead of regular dates?',
    'epoch-time-converter.faq.a2' => 'Epoch time is timezone-independent, making it perfect for storing dates in databases and APIs. It\'s a simple integer that\'s easy to compare, sort, and calculate time differences. Most programming languages have built-in functions to convert between epoch time and human-readable dates.'
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

echo "✅ time.json: Filled 19 empty keys\n";
echo "  - epoch-time-converter current epoch section (3 keys)\n";
echo "  - epoch-time-converter timestamp to date section (7 keys)\n";
echo "  - epoch-time-converter date to timestamp section (5 keys)\n";
echo "  - epoch-time-converter FAQ section (4 keys)\n";
