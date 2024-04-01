<?php

namespace App\Imports;

use App\Models\Calon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CalonImport implements ToModel, WithHeadingRow
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
            "type"          => $row["type"],
            "no_urut"       => $row["nourut"],
            "nama_ketua"    => $row["namaketua"],
            "nama_wakil"    => $row["namawakil"],
            "nim_ketua"     => $row["nimketua"],
            "nim_wakil"     => $row["nimwakil"],
            "kelas_ketua_id"=> $row["kelasketua"],
            "kelas_wakil_id"=> $row["kelaswakil"],
            "visi"          => $row["visi"],
            "misi"          => $row["misi"],
            "jurusan_id"    => $row["jurusan"],
        ]);
    }
}
