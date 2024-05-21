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
            $table->string('email');
            $table->string('toCloneDiv');
            $table->string('color');
            $table->string('name');
            $table->string('source');
            $table->string('clonedDiv');
            $table->timestamp('created_at')->nullable();
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
