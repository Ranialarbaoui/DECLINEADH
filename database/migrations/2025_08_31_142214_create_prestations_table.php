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
        Schema::create('prestations', function (Blueprint $table) {
            $table->string('codepres', 191)->primary();
            $table->string('libepres', 191)->nullable();
            $table->string('codfampr', 191)->nullable();
            $table->string('code_cle', 191)->nullable();
            $table->integer('nume_lot')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestations');
    }
};
