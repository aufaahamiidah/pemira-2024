<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $pass = Str::random(8);
        return new User([
            //
            'nama' => $row[0],
            'nim' => $row[1],
            'email' => $row[2],
            'nohp' => $row[3],
            'pass' => $pass,
            'gender' => $row[4],
            'kelas_id' => $row[5],
            'jurusan_id' => $row[6],
            'role' => 'mahasiswa',
            'status' => 'aktif',
            'is_active' => 1,
            'password' => Hash::make($pass),
        ]);
    }
}
