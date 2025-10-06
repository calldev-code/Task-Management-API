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
        Schema::create('kalenders', function (Blueprint $table) {
            $table->id('jadwal_id');

            // Foreign keys (harus eksplisit karena pk bukan 'id')
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tim_id');

            $table->string('judul_kegiatan');
            $table->date('tanggal');
            $table->text('keterangan')->nullable();

            // Relasi ke tabel users dan tims
            $table->foreign('user_id')
                  ->references('user_id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('tim_id')
                  ->references('tim_id')->on('tims')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kalenders');
    }
};
