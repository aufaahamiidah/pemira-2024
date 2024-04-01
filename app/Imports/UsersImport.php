<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class UsersImport implements WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue, ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     $pass = Str::random(8);
    //     return new User([
    //         'nama' => $row['nama'],
    //         'nim' => $row['nim'],
    //         'email' => $row['email'],
    //         'nohp' => $row['nohp'],
    //         'pass' => $pass,
    //         'gender' => $row['gender'],
    //         'kelas_id' => $row['kelas'],
    //         'jurusan_id' => $row['jurusan'],
    //         'role' => 'mahasiswa',
    //         'status' => 'aktif',
    //         'is_active' => 1,
    //         'password' => Hash::make($pass),
    //     ]);
    // }

    
    public function collection(Collection $rows)
    {
        set_time_limit(3000);
        foreach ($rows as $row) 
        {
            $pass = Str::random(8);
            User::create([
                'nama' => $row['nama'],
                'nim' => $row['nim'],
                'email' => $row['email'],
                'nohp' => $row['nohp'],
                'pass' => $pass,
                'gender' => $row['gender'],
                'kelas_id' => $row['kelas'],
                'jurusan_id' => $row['jurusan'],
                'role' => 'mahasiswa',
                'status' => 'aktif',
                'is_active' => 1,
                'password' => Hash::make($pass),
            ]);
        }
    }
    
    public function batchSize(): int
    {
        return 10;
    }
    
    public function chunkSize(): int
    {
        return 10;
    }
}
