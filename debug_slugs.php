<?php
require 'vendor/autoload.php';
use Illuminate\Support\Str;

$subs = [
    'Encoding & Decoding Tools',
    'Text Content Tools',
    'Generator Tools',
    'Network Tools',
    'Unit Converters'
];

foreach ($subs as $sub) {
    echo $sub . " -> " . Str::slug($sub, '_') . "\n";
}
