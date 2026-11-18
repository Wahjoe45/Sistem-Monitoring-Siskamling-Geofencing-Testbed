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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_warga');
            $table->string('nama', 100);
            $table->string('username', 100)->unique();
            $table->timestamp('username_verified_at')->nullable();
            $table->string('password', 255);
            $table->enum('role', ['pengurus', 'warga'])->default('warga');
            $table->string('no_telepon', 20);
            $table->string('blok', 10);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
