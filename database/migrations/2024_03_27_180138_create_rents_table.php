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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('inumber');
            $table->date('rentdate');
            $table->date('expiredate');
            $table->date('tookback')->nullable();
            $table->timestamps();
            $table->foreign('inumber')->references('inventorynumber')->on('books')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent');
    }
};
