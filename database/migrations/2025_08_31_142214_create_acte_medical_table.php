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
        Schema::create('acte_medical', function (Blueprint $table) {
            $table->string('codepres', 6)->primary();
            $table->string('libepres', 128);
            $table->string('type', 64);
            $table->integer('nbr_doc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acte_medical');
    }
};
