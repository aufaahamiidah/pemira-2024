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
        Schema::create('calons', function (Blueprint $table) {
            $table->id();
            $table->enum('type' , ['bem' , 'bpm' , 'hmj']);
            $table->string('noUrut');
            $table->string('nama_ketua')->nullable();
            $table->string('nama_waketu')->nullable();
            $table->string('nim_ketua')->nullable();
            $table->string('nim_waketu')->nullable();
            $table->string('visi')->nullable();
            $table->string('misi')->nullable();
            $table->string('idKelas_ketua')->nullable();
            $table->string('idKelas_waketu')->nullable();
            $table->string('foto_ketua')->nullable();
            $table->string('foto_waketu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calons');
    }
};
