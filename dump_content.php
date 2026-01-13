<?php

$ru = require 'd:/workspace/optimizo/resources/lang/ru/tools/utilities.php';

$suspects = ['xml-formatter', 'url-encoder', 'user-agent-parser'];

foreach ($suspects as $slug) {
    echo "Tool: $slug\n";
    if (isset($ru[$slug])) {
        print_r($ru[$slug]);
    } else {
        echo "MISSING\n";
    }
    echo "-------------------\n";
}
