<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ToolData;

class CheckMissingIcons extends Command
{
    protected $signature = 'tools:check-icons';
    protected $description = 'Check which tools are missing icon_svg';

    public function handle()
    {
        $tools = ToolData::getTools();
        $missing = [];
        $withIcons = 0;

        foreach ($tools as $tool) {
            if (empty($tool['icon_svg']) || trim($tool['icon_svg']) === '') {
                $missing[] = [
                    'name' => $tool['name'] ?? 'Unknown',
                    'slug' => $tool['slug'] ?? 'unknown',
                    'category' => $tool['category'] ?? 'unknown',
                ];
            } else {
                $withIcons++;
            }
        }

        $this->info("Tools with icons: {$withIcons}");
        $this->info("Tools missing icons: " . count($missing));

        if (!empty($missing)) {
            $this->newLine();
            $this->warn("Tools missing icon_svg:");
            foreach ($missing as $tool) {
                $this->line("  - {$tool['name']} ({$tool['slug']}) [{$tool['category']}]");
            }
        }

        return 0;
    }
}
