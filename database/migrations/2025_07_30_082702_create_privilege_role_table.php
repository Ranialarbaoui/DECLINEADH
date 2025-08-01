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
        Schema::create('privilege_role', function (Blueprint $table) {
            $table->unsignedBigInteger('privilege_id');
            $table->unsignedBigInteger('role_id')->index('privilege_role_role_id_foreign');
            $table->timestamps();

            $table->primary(['privilege_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privilege_role');
    }
};
