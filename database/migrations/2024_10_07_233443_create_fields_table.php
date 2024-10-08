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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name',50);
            $table->boolean('required')->default(0);
            $table->json('options')->default(json_encode([])); // option are meant for select-like inputs
            $table->json('validation_rules')->default(json_encode([]));
            $table->string('value')->nullable();
            $table->string('placeholder')->nullable();
            $table->foreignId('id_field_type')->constrained('field_types')->onDelete('cascade');
            $table->foreignId('id_field_cat')->constrained('field_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
