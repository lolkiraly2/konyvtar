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
        Schema::create('book', function (Blueprint $table) {
            $table->integer('inventorynumber')->primary();
            $table->integer('isbn');
            $table->timestamps();
            $table->foreign('isbn')->references('isbn')->on('isbn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book', function (Blueprint $table) {
            $table->dropForeign('book_isbn_foreign');
            $table->dropIndex('book_isbn_index');
            $table->dropColumn('isbn');
        });
    }
};
