
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_details', function (Blueprint $table) {

            $table->id('id_detail');

            $table->unsignedBigInteger('id_jadwal');

            $table->unsignedBigInteger('id_warga');

            $table->date('tanggal');

            $table->timestamps();

            // Relasi ke tabel jadwals
            $table->foreign('id_jadwal')
                ->references('id_jadwal')
                ->on('jadwals')
                ->onDelete('cascade');

            // Relasi ke tabel users
            $table->foreign('id_warga')
                ->references('id_warga')
                ->on('users')
                ->onDelete('cascade');

            // Mencegah warga terdaftar dua kali
            // pada satu periode jadwal
            $table->unique(['id_jadwal', 'id_warga']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_details');
    }
};
