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
            "kelas_id"   => 3,
            "jurusan_id"   => 1,
            "bem_id"   => 1,
            "bpm_id"   => 1,
            "hmj_id"   => 1,
            "pass" => "ryan",
            "password" => "ryan",
        ]);
        User::create([
            "nama" => "Hussain",
            "nim" => "4.33.22.0.09",
            "email" => "hussain@dummy.com",
            "nohp" => "08888888888",
            "kelas_id" => 5,
            "jurusan_id" => 3,
            "bem_id" => 1,
            "bpm_id" => 1,
            "hmj_id" => 1,
            "pass" => 123,
            "password" => 123
        ]);

        Calon::create([
            "no_urut" => 3,
            'jurusan_id' => 1,
            "type" => "bpm",
            "nama_ketua" => "Hussain Tamam Gucci Al Fauzan",
            "kelas_ketua_id" => 1,
            "nim_ketua" => "4.33.22.0.09",
            "visi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
            "misi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
            "nama_wakil" => "Bayu Tri Prayitno",
            "kelas_wakil_id" => 1,
            "nim_wakil" => "4.33.22.0.04",
        ]);
        Calon::create([
            "no_urut"    => 1,
            'jurusan_id' => 1,
            "type"      => "bem",
            "nama_ketua"=> "Valencia Dai Fahriyyan",
            "kelas_ketua_id"=> 1,
            "nim_ketua" => "4.42.21.0.29",
            "visi"      => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
            "misi"      => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quis, ex molestias sequi dolores, labore ipsum fugit a nam voluptates quo quisquam error quae. Vero enim voluptatum asperiores nobis! Facilis tempore facere hic sequi nulla esse fugiat cum explicabo repellendus, recusandae doloremque, temporibus modi totam? Possimus aliquam, a et fugiat nihil placeat. Officia ipsum voluptates neque maxime tempora fuga doloribus aliquam iste, eius tenetur ex unde odio necessitatibus dolor facere sint temporibus repudiandae ab mollitia aliquid explicabo molestias error, provident impedit! Doloribus voluptates possimus quasi praesentium, pariatur blanditiis sequi iste, architecto earum voluptatibus incidunt facilis expedita molestias numquam odio voluptate.",
            "nama_wakil"=> "Dinda Shinta Az-Zahra",
            "kelas_wakil_id"=> 1,
            "nim_wakil" => "4.42.21.0.09",
        ]);
        Calon::create([
            "no_urut" => 4,
            'jurusan_id' => 1,
            "type" => "hmj",
            "nama_ketua" => "Rakha Okta",
            "kelas_ketua_id" => 1,
            "nim_ketua" => "4.33.22.0.09",
            "visi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
            "misi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
            "nama_wakil" => "Salma Velita",
            "kelas_wakil_id" => 1,
            "nim_wakil" => "4.33.22.0.04",
        ]);
        Calon::create([
            "no_urut" => 4,
            'jurusan_id' => 1,
            "type" => "hmj",
            "nama_ketua" => "Mustaghfirin",
            "kelas_ketua_id" => 1,
            "nim_ketua" => "4.33.22.0.09",
            "visi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
            "misi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
            "nama_wakil" => "Zaqiya Alfrida",
            "kelas_wakil_id" => 1,
            "nim_wakil" => "4.33.22.0.04",
        ]);
        Calon::create([
            "no_urut" => 4,
            'jurusan_id' => 1,
            "type" => "hmj",
            "nama_ketua" => "Arif Setia",
            "kelas_ketua_id" => 1,
            "nim_ketua" => "4.33.22.0.09",
            "visi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
            "misi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
            "nama_wakil" => "Aslychatus Sulchay",
            "kelas_wakil_id" => 1,
            "nim_wakil" => "4.33.22.0.04",
        ]);
        Kelas::create([
            "nama_kelas" => "PS-1A",
            "jurusan_id" => 1,
        ]);
        Kelas::create([
            "nama_kelas" => "PS-2A",
            "jurusan_id" => 2,
        ]);
        Kelas::create([
            "nama_kelas" => "PS-3A",
            "jurusan_id" => 3,
        ]);
        Kelas::create([
            "nama_kelas" => "PS-4A",
            "jurusan_id" => 4,
        ]);
        Kelas::create([
            "nama_kelas" => "TI-2A",
            "jurusan_id" => 3,
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
