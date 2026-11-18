
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id('id_jadwal');

            $table->unsignedTinyInteger('bulan');

            $table->year('tahun');

            $table->timestamps();

            // Satu jadwal untuk satu periode bulan dan tahun
            $table->unique(['bulan', 'tahun']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
