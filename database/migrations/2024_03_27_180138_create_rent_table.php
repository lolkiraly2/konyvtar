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
        Schema::create('rent', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id');
            $table->integer('in');
            $table->date('rentdate');
            $table->date('expiredate');
            $table->date('tookback')->nullable();
            $table->timestamps();
            $table->foreign('person_id')->references('id')->on('person');
            $table->foreign('in')->references('inventorynumber')->on('book');
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
