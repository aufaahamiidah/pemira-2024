<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory;

    // Membuat Realtionship Database HasMany 
    public function user() : HasMany {
        return $this->HasMany(User::class);
    }
    public function kelas() : HasMany {
        return $this->HasMany(Kelas::class);
    }
}
