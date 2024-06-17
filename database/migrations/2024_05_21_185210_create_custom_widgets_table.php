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
        Schema::create('custom_widgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('default_widget_id')->nullable()->constrained()->onDelete('set null');
            $table->string('Dashboards_id');
            $table->string('icon')->nullable();  
            $table->unsignedBigInteger('position');
            $table->foreignId('box')->constrained('boxes')->onDelete('cascade');
            $table->string('color');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_widgets');
    }
};
