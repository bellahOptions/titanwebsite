<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['active', 'maintenance']);
            $table->string('admin_email')->default('admin@titanresources.com');
            $table->string('currency')->default('Naira');
            $table->string('currency_symbol')->default('₦');
            $table->string('site_name');
            $table->string('facebook_url');
            $table->string('x_url');
            $table->string('instagram_url');
            $table->string('youtube_url');
            $table->string('map_url');
            $table->string('company_address');
            $table->string('auto_approve_properies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
