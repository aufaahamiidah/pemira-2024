<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Calon;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "nama" => "Ryan",
            "nim"   => "4.42.21.0.29",
            "email"   => "dfahriyyan@gmail.com",
            "nohp"   => "088216542226",
            "kelas_id"   => 1,
            "jurusan_id"   => 1,
            "bem_id"   => 1,
            "bpm_id"   => 1,
            "hmj_id"   => 1,
            "pass" => "ryan",
            "password" => "ryan",
        ]);

        Calon::create([
            "nama"=> "Valencia Dai Fahriyyan",
            "noUrut"    => 1,
            "type"      => "bem",
            "kelas_id"=> 1,
            "jabatan"=> "ketua",
        ]);
        Calon::create([
            "nama"=> "Dinda Shinta Az-Zahra",
            "noUrut"    => 1,
            "type"      => "bem",
            "kelas_id"=> 1,
            "jabatan"=> "wakil",
        ]);

        Kelas::create([
            "nama_kelas" => "PS3A",
            "jurusan_id" => 1,
        ]);

        Jurusan::create([
            "nama_jurusan"   => "Akuntansi",
            "hmj"           => 1,
            "bem"           => 1,
            "bpm"           => 1,
        ]);
        Jurusan::create([
            "nama_jurusan"   => "Administrasi Bisnis",
            "hmj"           => 2,
            "bem"           => 2,
            "bpm"           => 2,
        ]);
        Jurusan::create([
            "nama_jurusan"   => "Teknik Elektro",
            "hmj"           => 3,
            "bem"           => 3,
            "bpm"           => 3,
        ]);
        Jurusan::create([
            "nama_jurusan"   => "Teknik Sipil",
            "hmj"           => 4,
            "bem"           => 4,
            "bpm"           => 4,
        ]);
        Jurusan::create([
            "nama_jurusan"   => "Teknik Mesin",
            "hmj"           => 5,
            "bem"           => 5,
            "bpm"           => 5,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
