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
        Schema::create('beneficiaires', function (Blueprint $table) {
            $table->bigInteger('code_benef')->primary();
            $table->string('nom_memb', 128);
            $table->string('lienpare', 1);
            $table->date('datenais')->nullable();
            $table->date('date_enrg')->nullable();
            $table->string('flagscol', 1)->nullable();
            $table->integer('src')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('adherent_id')->index('beneficiaires_adherent_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaires');
    }
};
