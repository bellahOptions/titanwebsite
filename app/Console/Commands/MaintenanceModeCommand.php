<?php

namespace App\Console\Commands;

use App\Models\Settings;
use Illuminate\Console\Command;

class MaintenanceModeCommand extends Command
{
    protected $signature = 'maintenance {status? : enable or disable}';
    protected $description = 'Enable or disable maintenance mode';

    public function handle()
    {
        $status = $this->argument('status');
        $settings = Settings::first();

        if ($status === 'enable') {
            $settings->update(['status' => 'maintenance']);
            $this->info('Maintenance mode enabled.');
        } elseif ($status === 'disable') {
            $settings->update(['status' => 'active']);
            $this->info('Maintenance mode disabled.');
        } else {
            $this->info('Current status: ' . $settings->status);
        }

        return 0;
    }
}