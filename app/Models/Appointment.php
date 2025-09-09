<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function up(): void
{
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->string('first_name', 100);
        $table->string('last_name', 100);
        $table->string('phone', 20);
        $table->string('email', 255);
        $table->timestamps();
    });
}

     use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
    ];
}
