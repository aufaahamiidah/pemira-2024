<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calon extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "no_urut",
        "nama_ketua",
        "nama_wakil",
        "nim_ketua",
        "nim_wakil",
        "kelas_ketua_id",
        "kelas_wakil_id",
        "visi",
        "misi",
    ] ;

    // Membuat Realtionship Database HasMany BelongsTo
    public function user() : HasMany {
        return $this->HasMany(User::class);
    }
    public function kelas_ketua() : BelongsTo {
        return $this->BelongsTo(Kelas::class, 'kelas_ketua_id');
    }
    public function kelas_wakil() : BelongsTo {
        return $this->BelongsTo(Kelas::class, 'kelas_wakil_id');
    }
    public function kelas() : BelongsTo {
        return $this->BelongsTo(Kelas::class);
    }

    // membuat Query Scope Filter
    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama_ketua','like',"%$search%")
                    ->orWhere('nama_wakil', 'like', "%$search%")
                    ->orWhere('nim_ketua', 'like', "%$search%")
                    ->orWhere('nim_wakil', 'like', "%$search%");
        });
        $query->when($filters["kelas"] ?? false, function($query, $search){
            return $query->where('kelas_ketua_id', $search)
                    ->orWhere('kelas_wakil_id', $search);
        });
    }
}
