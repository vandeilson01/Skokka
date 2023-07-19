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
        Schema::create('assinaturas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('id_acompanhante')->nullable();
            $table->string('id_anuncio')->nullable();
            $table->string('id_plan')->nullable();
            $table->string('days')->nullable();
            $table->string('expired')->nullable();
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
