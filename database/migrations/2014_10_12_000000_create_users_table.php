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
            $table->id();
            $table->string('nama');
            $table->string('nim')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nohp')->nullable();
            $table->enum('gender' , ['P' , 'L'])->nullable();
            $table->string('kelas_id')->nullable();
            $table->string('jurusan_id')->nullable();
            $table->string('bem_id')->nullable();
            $table->string('bpm_id')->nullable();
            $table->string('hmj_id')->nullable();
            $table->string('foto')->nullable();
            $table->enum('role' , ['mahasiswa' , 'panitia', 'admin'])->default('mahasiswa');
            $table->enum('status' , ['aktif' , 'tidak aktif'])->default('aktif');
            $table->enum('is_active' , [1 , 0])->default(0);
            $table->string('pass');
            $table->string('password')->nullable();
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
    }
};
