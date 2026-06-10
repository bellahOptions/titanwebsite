<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('inspection_days', function (Blueprint $table) {
            $table->id();
            $table->string('day_name'); // Monday, Tuesday, etc.
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('is_available')->default(true);
            $table->integer('max_bookings_per_slot')->default(5);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inspection_days');
    }
};