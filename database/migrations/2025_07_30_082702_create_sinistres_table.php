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
        Schema::create('sinistres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nompre_adherent', 191);
            $table->string('nompre_beneficiaire', 191);
            $table->longText('observation')->nullable();
            $table->date('date_soin');
            $table->boolean('police_notcouverte')->nullable();
            $table->json('listes_des_fichiers')->nullable();
            $table->enum('type', ['IF', 'FMP']);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('bordereau_id')->index('sinistres_bordereau_id_foreign');
            $table->bigInteger('intermediaire_id')->nullable();
            $table->bigInteger('police_id')->nullable();

            $table->index(['police_id', 'intermediaire_id'], 'sinistres_police_id_intermediaire_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sinistres');
    }
};
