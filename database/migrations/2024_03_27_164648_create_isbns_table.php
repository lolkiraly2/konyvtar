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
        Schema::create('isbns', function (Blueprint $table) {
            $table->char('isbn',13)->primary();
            $table->string('writer',50);
            $table->string('title');
            $table->string('publisher',50);
            $table->integer('publishedAt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isbn');
    }
};
