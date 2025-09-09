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
        Schema::create('detail_sinistres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('etat')->nullable();
            $table->longText('observation')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('sinistre_id')->index('detail_sinistres_sinistre_id_foreign');
            $table->string('prestation_id', 191)->index('detail_sinistres_prestation_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_sinistres');
    }
};
