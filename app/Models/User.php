<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Field yang boleh diisi.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // admin / pengurus / anggota
    ];

    /**
     * Field yang disembunyikan saat return JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Cast otomatis
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Timestamp ON
     */
    public $timestamps = true;

    /*
    |---------------------------------------------------------------------------
    | RELASI
    |---------------------------------------------------------------------------
    */

    // Role Anggota → 1 user = 1 anggota
    public function anggota()
    {
        return $this->hasOne(\App\Models\Anggota::class, 'user_id');
    }

    // Role Pengurus → 1 user = 1 pengurus
    public function pengurus()
    {
        return $this->hasOne(\App\Models\Pengurus::class, 'user_id');
    }

    // Relasi opsional jika mau tarik data kehadiran melalui anggota
    public function kehadiran()
    {
        return $this->hasMany(\App\Models\Kehadiran::class, 'user_id');
    }

    // Relasi opsional jika mau tarik iuran
    public function iuran()
    {
        return $this->hasMany(\App\Models\Iuran::class, 'user_id');
    }
}
