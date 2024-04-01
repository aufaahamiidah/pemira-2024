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
            "nama" => "admin1",
            "nim"   => "123451",
            "email"   => "admin1@dummy.com",
            "nohp"   => 0,
            "kelas_id"   => 3,
            "jurusan_id"   => 1,
            "pass" => "admin1",
            "role" => "admin",
            "password" => "admin1",
        ]);
        User::create([
            "nama" => "admin2",
            "nim" => "123452",
            "email" => "admin@dummy.com",
            "nohp" => "08888888888",
            "kelas_id" => 5,
            "jurusan_id" => 1,
            "pass" => 'admin2',
            "role" => "admin",
            "password" => 'admin2'
        ]);
        User::create([
            "nama" => "HMJAkuntansi",
            "nim" => "01",
            "email" => "hmjakuntansi@dummy.com",
            "nohp" => "",
            "kelas_id" => 1,
            "jurusan_id" => 1,
            "pass" => 01010101,
            "role" => "panitia",
            "password" => 01010101
        ]);
        User::create([
            "nama" => "HMJAdbis",
            "nim" => "02",
            "email" => "hmjadbis@dummy.com",
            "nohp" => "",
            "kelas_id" => 1,
            "jurusan_id" => 2,
            "pass" => 02020202,
            "role" => "panitia",
            "password" => 02020202
        ]);
        User::create([
            "nama" => "HMJSipil",
            "nim" => "03",
            "email" => "hmjsipil@dummy.com",
            "nohp" => "",
            "kelas_id" => 1,
            "jurusan_id" => 3,
            "pass" => 03030303,
            "role" => "panitia",
            "password" => 03030303
        ]);
        User::create([
            "nama" => "HMJelektro",
            "nim" => "04",
            "email" => "hmjelektro@dummy.com",
            "nohp" => "",
            "kelas_id" => 1,
            "jurusan_id" => 4,
            "pass" => 04040404,
            "role" => "panitia",
            "password" => 04040404
        ]);
        User::create([
            "nama" => "HMJmesin",
            "nim" => "05",
            "email" => "hmjmesin@dummy.com",
            "nohp" => "",
            "kelas_id" => 1,
            "jurusan_id" => 5,
            "pass" => 05050505,
            "role" => "panitia",
            "password" => 05050505
        ]);

        // Calon::create([
        //     "no_urut" => 3,
        //     'jurusan_id' => 1,
        //     "type" => "bpm",
        //     "nama_ketua" => "Hussain Tamam Gucci Al Fauzan",
        //     "kelas_ketua_id" => 1,
        //     "nim_ketua" => "4.33.22.0.09",
        //     "visi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "misi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "nama_wakil" => "Bayu Tri Prayitno",
        //     "kelas_wakil_id" => 1,
        //     "nim_wakil" => "4.33.22.0.04",
        // ]);
        // Calon::create([
        //     "no_urut" => 4,
        //     'jurusan_id' => 3,
        //     "type" => "bpm",
        //     "nama_ketua" => "Aufa Hamiidah",
        //     "kelas_ketua_id" => 3,
        //     "nim_ketua" => "4.33.22.0.09",
        //     "visi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "misi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "nama_wakil" => "Aoki Takeshi",
        //     "kelas_wakil_id" => 3,
        //     "nim_wakil" => "4.33.22.0.04",
        // ]);
        // Calon::create([
        //     "no_urut" => 5,
        //     'jurusan_id' => 2,
        //     "type" => "bpm",
        //     "nama_ketua" => "Muhammad Wahyu Anggoro",
        //     "kelas_ketua_id" => 5,
        //     "nim_ketua" => "4.33.22.0.09",
        //     "visi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "misi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "nama_wakil" => "Violeta Chaitra",
        //     "kelas_wakil_id" => 5,
        //     "nim_wakil" => "4.33.22.0.04",
        // ]);
        // Calon::create([
        //     "no_urut" => 4,
        //     'jurusan_id' => 5,
        //     "type" => "bpm",
        //     "nama_ketua" => "Muhammad Naufal Syarifuddin",
        //     "kelas_ketua_id" => 2,
        //     "nim_ketua" => "4.33.22.0.09",
        //     "visi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "misi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "nama_wakil" => "Gladisa Widadining Tyas",
        //     "kelas_wakil_id" => 2,
        //     "nim_wakil" => "4.33.22.0.04",
        // ]);
        // Calon::create([
        //     "no_urut" => 4,
        //     'jurusan_id' => 5,
        //     "type" => "bpm",
        //     "nama_ketua" => "Muhammad Ar Rafi",
        //     "kelas_ketua_id" => 2,
        //     "nim_ketua" => "3.12.22.2.14",
        //     "visi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "misi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "nama_wakil" => "Rizal Apriyanto",
        //     "kelas_wakil_id" => 2,
        //     "nim_wakil" => "4.12.22.0.20",
        // ]);
        // Calon::create([
        //     "no_urut" => 4,
        //     'jurusan_id' => 2,
        //     "type" => "bpm",
        //     "nama_ketua" => "Rizal Apriyanto",
        //     "kelas_ketua_id" => 2,
        //     "nim_ketua" => "3.12.22.2.14",
        //     "visi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "misi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "nama_wakil" => "Daud Budi Wicaksono",
        //     "kelas_wakil_id" => 2,
        //     "nim_wakil" => "4.12.22.0.20",
        // ]);
        // Calon::create([
        //     "no_urut" => 4,
        //     'jurusan_id' => 2,
        //     "type" => "bpm",
        //     "nama_ketua" => "Muchamad Farel Gibran",
        //     "kelas_ketua_id" => 2,
        //     "nim_ketua" => "3.12.22.2.14",
        //     "visi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "misi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "nama_wakil" => "Muhammad Doni Ananta",
        //     "kelas_wakil_id" => 2,
        //     "nim_wakil" => "4.12.22.0.20",
        // ]);
        // Calon::create([
        //     "no_urut"    => 1,
        //     'jurusan_id' => 1,
        //     "type"      => "bem",
        //     "nama_ketua"=> "Valencia Dai Fahriyyan",
        //     "kelas_ketua_id"=> 1,
        //     "nim_ketua" => "4.42.21.0.29",
        //     "visi"      => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "misi"      => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quis, ex molestias sequi dolores, labore ipsum fugit a nam voluptates quo quisquam error quae. Vero enim voluptatum asperiores nobis! Facilis tempore facere hic sequi nulla esse fugiat cum explicabo repellendus, recusandae doloremque, temporibus modi totam? Possimus aliquam, a et fugiat nihil placeat. Officia ipsum voluptates neque maxime tempora fuga doloribus aliquam iste, eius tenetur ex unde odio necessitatibus dolor facere sint temporibus repudiandae ab mollitia aliquid explicabo molestias error, provident impedit! Doloribus voluptates possimus quasi praesentium, pariatur blanditiis sequi iste, architecto earum voluptatibus incidunt facilis expedita molestias numquam odio voluptate.",
        //     "nama_wakil"=> "Dinda Shinta Az-Zahra",
        //     "kelas_wakil_id"=> 1,
        //     "nim_wakil" => "4.42.21.0.09",
        // ]);
        // Calon::create([
        //     "no_urut"    => 2,
        //     'jurusan_id' => 2,
        //     "type"      => "bem",
        //     "nama_ketua"=> "Shofiyyah Atikah Kusuma",
        //     "kelas_ketua_id"=> 2,
        //     "nim_ketua" => "4.42.21.0.27",
        //     "visi"      => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "misi"      => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quis, ex molestias sequi dolores, labore ipsum fugit a nam voluptates quo quisquam error quae. Vero enim voluptatum asperiores nobis! Facilis tempore facere hic sequi nulla esse fugiat cum explicabo repellendus, recusandae doloremque, temporibus modi totam? Possimus aliquam, a et fugiat nihil placeat. Officia ipsum voluptates neque maxime tempora fuga doloribus aliquam iste, eius tenetur ex unde odio necessitatibus dolor facere sint temporibus repudiandae ab mollitia aliquid explicabo molestias error, provident impedit! Doloribus voluptates possimus quasi praesentium, pariatur blanditiis sequi iste, architecto earum voluptatibus incidunt facilis expedita molestias numquam odio voluptate.",
        //     "nama_wakil"=> "Salma Velita",
        //     "kelas_wakil_id"=> 2,
        //     "nim_wakil" => "4.42.21.0.26",
        // ]);
        // Calon::create([
        //     "no_urut" => 4,
        //     'jurusan_id' => 1,
        //     "type" => "hmj",
        //     "nama_ketua" => "Rakha Okta",
        //     "kelas_ketua_id" => 1,
        //     "nim_ketua" => "4.33.22.0.09",
        //     "visi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "misi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "nama_wakil" => "Salma Velita",
        //     "kelas_wakil_id" => 1,
        //     "nim_wakil" => "4.33.22.0.04",
        // ]);
        // Calon::create([
        //     "no_urut" => 4,
        //     'jurusan_id' => 1,
        //     "type" => "hmj",
        //     "nama_ketua" => "Mustaghfirin",
        //     "kelas_ketua_id" => 1,
        //     "nim_ketua" => "4.33.22.0.09",
        //     "visi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "misi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "nama_wakil" => "Zaqiya Alfrida",
        //     "kelas_wakil_id" => 1,
        //     "nim_wakil" => "4.33.22.0.04",
        // ]);
        // Calon::create([
        //     "no_urut" => 4,
        //     'jurusan_id' => 1,
        //     "type" => "hmj",
        //     "nama_ketua" => "Arif Setia",
        //     "kelas_ketua_id" => 1,
        //     "nim_ketua" => "4.33.22.0.09",
        //     "visi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "misi" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi omnis necessitatibus asperiores, delectus doloremque repellendus doloribus nulla possimus blanditiis ipsa aliquam sequi ad eos. Repudiandae.",
        //     "nama_wakil" => "Aslychatus Sulchay",
        //     "kelas_wakil_id" => 1,
        //     "nim_wakil" => "4.33.22.0.04",
        // ]);
        // Kelas::create([
        //     'nama'       => 'Perbankan Syariah',
        //     "nama_kelas" => "PS-1A",
        //     "jurusan_id" => 1,
        // ]);
        // Kelas::create([
        //     'nama'       => 'Perbankan Syariah',
        //     "nama_kelas" => "PS-2A",
        //     "jurusan_id" => 2,
        // ]);
        // Kelas::create([
        //     'nama'       => 'Perbankan Syariah',
        //     "nama_kelas" => "PS-3A",
        //     "jurusan_id" => 3,
        // ]);
        // Kelas::create([
        //     'nama'       => 'Perbankan Syariah',
        //     "nama_kelas" => "PS-4A",
        //     "jurusan_id" => 4,
        // ]);
        // Kelas::create([
        //     'nama'       => 'Teknologi Informasi',
        //     "nama_kelas" => "TI-2A",
        //     "jurusan_id" => 3,
        // ]);

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
