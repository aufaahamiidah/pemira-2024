<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Calon;
use App\Models\Kelas;
use App\Models\Jurusan;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'nim',
        'email',
        'nohp',
        'pass',
        'gender',
        'kelas_id',
        'jurusan_id',
        'calon_id',
        'role',
        'status',
        'isActive',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Membuat Realtionship Database BelongsTo
    // BelongsTo Fungsinya untuk Menerima Umpan Balik dari Suatu Model atau Table Database. 
    // Sebelum Mengidentifikasikan BelongsTo harus Mengidentifikasikan HasOne atau HasMany dari Model Terkait dahulu.
    public function jurusan() : BelongsTo{
        return $this->BelongsTo(Jurusan::class);
    }

    public function calon() : BelongsTo{
        return $this->BelongsTo(Calon::class);
    }

    public function kelas() : BelongsTo{
        return $this->BelongsTo(Kelas::class);
    }

    // membuat Query Scope Filter
    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama','like',"%$search%")
                    ->orWhere('nim', 'like', "%$search%");
        });
        $query->when($filters["kelas"] ?? false, function($query, $search){
            return $query->where('kelas_id', $search);
        });
    }
}
