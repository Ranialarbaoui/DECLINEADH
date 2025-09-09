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
        Schema::create('contractantes', function (Blueprint $table) {
            $table->bigInteger('code')->primary();
            $table->string('nom', 191);
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('client_id')->index('contr_client_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractantes');
    }
};
