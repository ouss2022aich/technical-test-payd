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
        Schema::create('form_fields', function (Blueprint $table) {

            $table->unsignedBigInteger( 'id_form' );
            $table->unsignedBigInteger( 'id_field' );
            $table->primary([ 'id_form', 'id_field' ]);

            $table->timestamps();
            $table->foreign('id_form')->references('id')->on('forms')->onDelete('cascade');
            $table->foreign('id_field')->references('id')->on('fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_fields');
    }
};
