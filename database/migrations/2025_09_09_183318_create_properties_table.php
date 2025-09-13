<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
{
    Schema::create('properties', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description');
        $table->text('features')->nullable();
        $table->string('property_type'); // FIXED: was "type"
        $table->decimal('listing_price', 15, 2);
        $table->decimal('sale_lease_price', 15, 2)->nullable(); // FIXED: was "sale_price"
        $table->string('lease_term')->nullable();
        $table->string('address');
        $table->string('featured_image')->nullable();
        $table->json('additional_images')->nullable(); // FIXED: store multiple paths in JSON
        $table->boolean('featured')->default(0);
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
