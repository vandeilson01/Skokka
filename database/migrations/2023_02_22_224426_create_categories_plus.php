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
        Schema::create('category_pluses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categories_id')->references('id')->on('categories')->onDelete('CASCADE');
            $table->text('name');
            $table->text('details');
            $table->text('link');
            $table->enum('status',array('active','inative'))->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_pluses');
    }
};
