<?php

namespace App\Models;

use App\Models\User;
use App\Models\Calon;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama",
        "nama_kelas",
        "jurusan_id",
    ] ;
    // Membuat Realtionship Database HasMany BelongsTo
    public function user() : HasMany  {
        return $this->HasMany(User::class);
    }
    public function jurusan() : BelongsTo {
        return $this->BelongsTo(Jurusan::class);
    }
    public function calon() : HasMany {
        return $this->HasMany( Calon::class);
    }

    // membuat Query Scope Filter
    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama','like',"%$search%")
                    ->orWhere('nama_kelas', 'like', "%$search%");
        });
    }
}
