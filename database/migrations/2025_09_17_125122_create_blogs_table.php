<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('blogs', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('slug')->unique();
        $table->text('excerpt');
        $table->longText('content');
        $table->string('image_url')->nullable();
        $table->string('public_id')->nullable();
        $table->foreignId('user_id')->constrained();
        $table->boolean('published')->default(false);
        $table->timestamp('published_at')->nullable();
        $table->timestamps();
        
        // Indexes for better performance
        $table->index('slug');
        $table->index('published');
        $table->index('published_at');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
