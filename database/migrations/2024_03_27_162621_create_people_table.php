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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->integer('postcode');
            $table->string('city',30);
            $table->string('street');
            $table->integer('number');
            $table->enum('type',['student', 'professor', 'fromElsewhere','other']);
            $table->string('contact');
            $table->integer('borrowCount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person');
    }
};
