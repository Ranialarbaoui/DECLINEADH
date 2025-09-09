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
        Schema::create('adherents', function (Blueprint $table) {
            $table->bigInteger('code_adh')->primary();
            $table->string('liberisq', 128);
            $table->date('date_enrg')->nullable();
            $table->date('datenais')->nullable();
            $table->string('sexerisq', 191)->nullable();
            $table->integer('numegrou');
            $table->string('numeimma', 15)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('intermediaire_id')->nullable()->index('adherents_intermediaire_id_foreign');
            $table->bigInteger('police_id')->nullable()->index('adherents_police_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adherents');
    }
};
