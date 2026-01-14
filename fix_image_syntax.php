<?php
// Fix the closing parentheses in image.php files

$files = [
    'resources/lang/ru/tools/image.php',
    'resources/lang/es/tools/image.php'
];

foreach ($files as $file) {
    echo "Fixing $file...\n";

    $content = file_get_contents($file);

    // The file ends with:
    //             ),
    //         ),
    //     ),
    // );
    // But it should end with:
    //             ),
    //         ),
    //     ),
    // );

    // Replace the end pattern - we need to add one more closing parenthesis before the final );
    $content = preg_replace(
        '/(\s+)\),\s*\);(\s*)$/s',
        "$1    ),\r\n);$2",
        $content
    );

    file_put_contents($file, $content);
    echo "Fixed $file\n";
}

echo "\nVerifying syntax...\n";
foreach ($files as $file) {
    $output = shell_exec("php -l $file 2>&1");
    echo "$file: $output\n";
}
