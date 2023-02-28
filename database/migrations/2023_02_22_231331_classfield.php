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
        Schema::create('classfields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreignId('categorie_id')->references('id')->on('categories')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('state_id')->references('id')->on('states');
            $table->string('city');
            $table->string('address');
            $table->string('zipcode');
            $table->string('neighborhood');
            $table->string('title');
            $table->text('description');
            $table->integer('age');
            $table->string('mobile')->unique();
            $table->enum('type',array('free','top','premium'))->default('free');
            $table->foreignId('photosId')->references('id')->on('photos')->onDelete('cascade')->nullable(true);
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
