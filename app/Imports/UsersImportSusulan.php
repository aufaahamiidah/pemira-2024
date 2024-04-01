<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImportSusulan implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        set_time_limit(3000);
        $pass = Str::random(8);
        return new User([
            'nama' => $row['nama'],
            'nim' => $row['nim'],
            'email' => $row['email'],
            'nohp' => $row['nohp'],
            'pass' => $pass,
            'gender' => $row['gender'],
            'kelas_id' => $row['kelas'],
            'jurusan_id' => $row['jurusan'],
            'role' => 'mahasiswa',
            'status' => 'tidak aktif',
            'is_active' => 1,
            'password' => Hash::make($pass),
        ]);
    }
}
