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
        Schema::create('default_passwords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('password', 191);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('user_id')->index('default_passwords_user_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_passwords');
    }
};
