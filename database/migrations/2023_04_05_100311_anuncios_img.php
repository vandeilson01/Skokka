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
        //

        Schema::create('anuncios_img', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(true);
            $table->string('id_companhia')->nullable(true);
            $table->string('id_anuncio')->nullable(true);
            $table->string('file')->nullable(true);
            $table->string('img')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
