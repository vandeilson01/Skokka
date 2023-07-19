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
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(true);
            $table->string('id_acompanhante')->nullable(true);
            $table->string('id_plan')->nullable(true);
            $table->string('categoria')->nullable(true);
            $table->string('endereco')->nullable(true);
            $table->string('estado')->nullable(true);
            $table->string('cidade')->nullable(true);
            $table->string('postal')->nullable(true);
            $table->string('distrito')->nullable(true);

            $table->string('idade')->nullable(true);
            $table->string('titulo_anuncio')->nullable(true);
            $table->string('texto')->nullable(true);

            $table->string('tipo_contato')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('telefone')->nullable(true);
            $table->string('whatsapp')->nullable(true);

            $table->string('suas_fotos')->nullable(true);
            $table->string('termos')->nullable(true);
            $table->string('status')->nullable(true);
            $table->string('collection_id')->nullable(true);
            $table->string('plan_time')->nullable(true);
            $table->string('expired')->nullable(true);

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
