<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calon extends Model
{
    use HasFactory;

    // Membuat Realtionship Database HasMany BelongsTo
    public function user() : HasMany {
        return $this->HasMany(User::class);
    }
    public function kelas() : BelongsTo {
        return $this->BelongsTo(Kelas::class);
    }
}
