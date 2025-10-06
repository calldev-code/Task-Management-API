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
        Schema::create('discussions', function (Blueprint $table) {
            $table->id('discussion_id');

            // Foreign keys - eksplisit karena pk bukan 'id'
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('task_id');

            $table->text('pesan');
            $table->timestamp('tanggal')->useCurrent();

            // Relasi ke tabel users, projects, dan tasks
            $table->foreign('user_id')
                  ->references('user_id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('project_id')
                  ->references('project_id')->on('projects')
                  ->onDelete('cascade');

            $table->foreign('task_id')
                  ->references('task_id')->on('tasks')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discussions');
    }
};
