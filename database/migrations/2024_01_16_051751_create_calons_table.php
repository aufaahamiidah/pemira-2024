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
            $table->enum('type' , ['BEM' , 'BPM' , 'HMJ'])->nullable();
            $table->string('no_urut');
            $table->string('nama_ketua')->nullable();
            $table->string('nama_wakil')->nullable();
            $table->string('nim_ketua')->nullable();
            $table->string('nim_wakil')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('kelas_ketua_id')->nullable();
            $table->string('kelas_wakil_id')->nullable();
            $table->string('foto_ketua')->nullable();
            $table->string('foto_wakil')->nullable();
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
