<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tool;
use App\Services\ToolData;

class ForceUpdateTools extends Command
{
    protected $signature = 'tools:force-update';
    protected $description = 'Force update all tools with data from ToolData service';

    public function handle()
    {
        $this->info('Starting force update of all tools...');

        $tools = ToolData::getTools();
        $updated = 0;
        $created = 0;

        foreach ($tools as $toolData) {
            if (!isset($toolData['slug'])) {
                continue;
            }

            $tool = Tool::where('slug', $toolData['slug'])->first();

            if ($tool) {
                // Force update all fields
                $tool->update($toolData);
                $updated++;
                $this->line("Updated: {$toolData['name']}");
            } else {
                // Create new tool
                Tool::create($toolData);
                $created++;
                $this->line("Created: {$toolData['name']}");
            }
        }

        $this->info("\nForce update completed!");
        $this->info("Updated: {$updated} tools");
        $this->info("Created: {$created} tools");

        return 0;
    }
}
