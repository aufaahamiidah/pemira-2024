<?php

namespace App\Imports;

use App\Models\Calon;
use Maatwebsite\Excel\Concerns\ToModel;

class CalonImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Calon([
            //
            "type"          => $row[0],
            "no_urut"       => $row[1],
            "nama_ketua"    => $row[2],
            "nama_wakil"    => $row[3],
            "nim_ketua"     => $row[4],
            "nim_wakil"     => $row[5],
            "kelas_ketua_id"=> $row[6],
            "kelas_wakil_id"=> $row[7],
            "visi"          => $row[8],
            "misi"          => $row[9],
        ]);
    }
}
