<?php
// Fix controllers to use Tool model instead of DB::table()
$controllers = [
    'TextReverserController.php' => 'text-reverser',
    'TextToMorseController.php' => 'text-to-morse-converter',
    'MorseToTextController.php' => 'morse-to-text-converter',
];

$basePath = 'd:\workspace\optimizo\app\Http\Controllers\Tools\Utility\\';
$fixed = 0;

foreach ($controllers as $file => $slug) {
    $filePath = $basePath . $file;
    if (!file_exists($filePath)) {
        echo "Skipping $file - not found\n";
        continue;
    }

    $content = file_get_contents($filePath);

    // Replace use statement
    $content = str_replace(
        'use Illuminate\Support\Facades\DB;',
        'use App\Models\Tool;',
        $content
    );

    // Replace DB::table query with Tool model
    $content = preg_replace(
        "/\\\$tool = DB::table\('tools'\)->where\('slug', '[^']+'\)->first\(\);/",
        "\$tool = Tool::where('slug', '$slug')->firstOrFail();",
        $content
    );

    file_put_contents($filePath, $content);
    echo "Fixed: $file\n";
    $fixed++;
}

echo "\nTotal controllers fixed: $fixed\n";
