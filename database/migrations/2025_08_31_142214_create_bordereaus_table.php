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
        Schema::create('bordereaus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_ouverture');
            $table->date('date_depot')->nullable();
            $table->enum('etat', ['0', '1', '2', '3']);
            $table->string('numero_reference', 191)->nullable();
            $table->json('etats_giss')->nullable();
            $table->string('type_bordereau', 191)->nullable();
            $table->bigInteger('crgc');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('user_id')->index('bordereaus_user_id_foreign');
            $table->bigInteger('contractante_id')->nullable()->index('bordereaus_contractante_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bordereaus');
    }
};
