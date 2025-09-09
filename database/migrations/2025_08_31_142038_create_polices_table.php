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
        Schema::create('polices', function (Blueprint $table) {
            $table->bigInteger('numepoli');
            $table->string('raissoci', 191);
            $table->date('dateeffe')->nullable();
            $table->date('dateeche')->nullable();
            $table->timestamps();
            $table->bigInteger('intermediaire_id')->index('polices_intermediaire_id_foreign');
            $table->bigInteger('contractante_id')->nullable()->index('polices_contractante_id_foreign');
            $table->softDeletes();

            $table->primary(['numepoli', 'intermediaire_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polices');
    }
};
