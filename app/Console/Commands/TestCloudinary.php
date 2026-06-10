<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class TestCloudinary extends Command
{
    protected $signature = 'test:cloudinary';
    protected $description = 'Test Cloudinary upload manually';

    public function handle()
    {
        try {
            $url = Cloudinary::uploadFile(public_path('test.jpg'))->getSecurePath();
            $this->info('✅ Upload successful: ' . $url);
        } catch (\Exception $e) {
            $this->error('❌ Error: ' . $e->getMessage());
        }
    }
}

