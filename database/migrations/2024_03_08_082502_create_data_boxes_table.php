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
        Schema::create('data_boxes', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->integer('temp');
            $table->integer('lvh');
            $table->integer('ppm');
            $table->integer('co2');
            $table->integer('db');
            $table->integer('lumen');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_boxes');
    }
};
