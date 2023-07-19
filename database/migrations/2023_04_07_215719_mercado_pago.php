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

        Schema::create('mercado_pago_acesse', function (Blueprint $table) {
            $table->id();
            $table->string('cod')->nullable(true);
            $table->string('token_1')->nullable(true);
            $table->string('token_2')->nullable(true);
            $table->string('token_3')->nullable(true);
            $table->string('token_teste')->nullable(true);
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
