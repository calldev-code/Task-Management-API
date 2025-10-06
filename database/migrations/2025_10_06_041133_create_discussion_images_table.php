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
        Schema::create('discussion_images', function (Blueprint $table) {
            $table->id('image_id');

            // Foreign key manual agar sesuai dengan PK tabel discussions
            $table->unsignedBigInteger('discussion_id');

            $table->string('image_url');
            $table->text('keterangan')->nullable();

            $table->foreign('discussion_id')
                  ->references('discussion_id')->on('discussions')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discussion_images');
    }
};
