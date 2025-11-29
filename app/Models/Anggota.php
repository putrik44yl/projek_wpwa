<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'no_hp',
        'tanggal_gabung',
        'status',

        // EXTRA FIELDS
        'foto',
        'bio',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI
    |--------------------------------------------------------------------------
    */

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Kehadiran
    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class);
    }

    // Relasi ke Iuran
    public function iuran()
    {
        return $this->hasMany(Iuran::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR STATUS
    |--------------------------------------------------------------------------
    */

    public function getStatusLabelAttribute()
    {
        if (strtolower($this->status) === 'aktif' || $this->status == '1') {
            return 'Aktif';
        }

        return 'Tidak Aktif';
    }

    public function getStatusBadgeAttribute()
    {
        if (strtolower($this->status) === 'aktif' || $this->status == '1') {
            return '<span class="badge bg-primary">Aktif</span>';
        }

        return '<span class="badge bg-secondary">Tidak Aktif</span>';
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR FOTO
    |--------------------------------------------------------------------------
    */

    public function getFotoUrlAttribute()
    {
        if (!$this->foto) {
            return asset('default/user.png'); // default avatar
        }

        return asset('storage/' . $this->foto);
    }
}
