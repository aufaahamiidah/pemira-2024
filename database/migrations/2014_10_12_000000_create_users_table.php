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
            $table->string('nim');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nohp');
            $table->enum('gender' , ['P' , 'L']);
            $table->string('id_kelas');
            $table->string('id_sesi')->nullable();
            $table->string('id_bem')->nullable();
            $table->string('id_bpm')->nullable();
            $table->string('id_hmj')->nullable();
            $table->string('foto')->nullable();
            $table->enum('role' , ['mahasiswa' , 'panitia', 'admin'])->default('mahasiswa');
            $table->enum('status' , ['aktif' , 'susulan']);
            $table->enum('is_active' , [1 , 0])->default(1);
            $table->string('password');
            $table->string('hash_password');
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
