<?php
$en = include __DIR__ . '/resources/lang/en/tools/images.php';
$ru = include __DIR__ . '/resources/lang/ru/tools/images.php';

file_put_contents('en-image-keys.txt', implode("\n", array_keys($en)));
file_put_contents('ru-image-keys.txt', implode("\n", array_keys($ru)));

echo "EN keys saved to: en-image-keys.txt\n";
echo "RU keys saved to: ru-image-keys.txt\n";
