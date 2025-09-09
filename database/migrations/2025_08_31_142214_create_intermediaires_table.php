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
        Schema::create('intermediaires', function (Blueprint $table) {
            $table->bigInteger('codeinte')->primary();
            $table->string('raisocin', 30)->nullable();
            $table->string('adreinte', 60)->nullable();
            $table->integer('numepate')->nullable();
            $table->integer('numeimpo')->nullable();
            $table->integer('nume_tva')->nullable();
            $table->integer('numecnss')->nullable();
            $table->integer('capisoci')->nullable();
            $table->string('teleinte', 40)->nullable();
            $table->string('telexint', 20)->nullable();
            $table->string('faxinter', 40)->nullable();
            $table->string('numeagre', 6)->nullable();
            $table->date('datenomi')->nullable();
            $table->integer('regicomm')->nullable();
            $table->string('codtypin', 1)->nullable();
            $table->integer('codevill')->nullable();
            $table->integer('codecomp')->nullable();
            $table->string('flagtimb', 1)->nullable();
            $table->date('datfinac')->nullable();
            $table->integer('lieninte')->nullable();
            $table->integer('nume_lot')->nullable();
            $table->string('jourreas', 3)->nullable();
            $table->integer('lieintre')->nullable();
            $table->string('flagtest', 1)->nullable();
            $table->integer('lienregroupe')->nullable();
            $table->integer('nature_reseau')->nullable();
            $table->integer('type_region')->nullable();
            $table->string('rib_bancaire', 1)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intermediaires');
    }
};
