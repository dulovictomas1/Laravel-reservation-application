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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->text('description')->nullable();
            $table->string('service_tag')->nullable();
            $table->text('times')->nullable(); // zatiaľ OK
            $table->timestamps();
            $table->unique('user_id'); // 🔥 1 user = 1 detail
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
