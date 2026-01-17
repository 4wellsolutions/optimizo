<?php
$dir = 'resources/views/tools';
$it = new RecursiveDirectoryIterator($dir);
foreach (new RecursiveIteratorIterator($it) as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) == 'blade') {
        $content = file_get_contents($file);
        if (preg_match_all("/route\(['\"]([^'\"\$]+)['\"]/", $content, $matches)) {
            foreach ($matches[1] as $routeName) {
                echo $file . ": " . $routeName . "\n";
            }
        }
    }
}
