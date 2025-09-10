<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_author'); // like WordPress author ID
            $table->dateTime('post_date')->default(now());
            $table->dateTime('post_date_gmt')->default(now());
            $table->longText('post_content');
            $table->text('post_title');
            $table->text('post_excerpt')->nullable();
            $table->string('post_status', 20)->default('publish'); // publish, draft, etc.
            $table->string('comment_status', 20)->default('open'); // open, closed
            $table->string('ping_status', 20)->default('open');
            $table->string('post_password')->nullable();
            $table->string('post_name', 200)->unique(); // slug
            $table->longText('post_content_filtered')->nullable();
            $table->unsignedBigInteger('post_parent')->default(0);
            $table->string('guid', 255)->nullable();
            $table->integer('menu_order')->default(0);
            $table->string('post_type', 20)->default('post'); // post, page, custom
            $table->string('post_mime_type', 100)->nullable();
            $table->bigInteger('comment_count')->default(0);
            $table->dateTime('post_modified')->default(now());
            $table->dateTime('post_modified_gmt')->default(now());

            $table->foreign('post_author')->references('id')->on('users')->onDelete('cascade');
        });
    Schema::create('blogs', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content');
        $table->string('slug')->unique();
        $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
        $table->string('status')->default('draft');
        $table->timestamps();
    });

    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
