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
        ]);
    }
}
