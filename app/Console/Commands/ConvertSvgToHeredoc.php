<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConvertSvgToHeredoc extends Command
{
    protected $signature = 'tools:convert-svg-heredoc';
    protected $description = 'Convert SVG icons from escaped quotes to heredoc syntax';

    public function handle()
    {
        $filePath = base_path('app/Services/ToolData.php');
        $content = file_get_contents($filePath);

        // Pattern to match icon_svg with escaped quotes
        $pattern = "/'icon_svg'\s*=>\s*'([^']+)'/";

        $count = 0;
        $content = preg_replace_callback($pattern, function ($matches) use (&$count) {
            $svgContent = $matches[1];

            // Unescape the quotes
            $svgContent = str_replace('\\"', '"', $svgContent);
            $svgContent = str_replace("\\'", "'", $svgContent);

            // Convert to heredoc syntax
            $heredoc = "'icon_svg' => <<<'SVG'\n" . $svgContent . "\nSVG";

            $count++;
            return $heredoc;
        }, $content);

        file_put_contents($filePath, $content);

        $this->info("Converted {$count} SVG icons to heredoc syntax!");

        return 0;
    }
}
