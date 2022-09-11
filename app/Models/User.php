<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nip', 'name', 'pangkat', 'golongan', 'esselon', 'password', 'image', 'jenis_kelamin'
    ];

    public function spt()
    {
        return $this->belongsToMany(Spt::class);
    }

    public function isAdmin()
    {
        return $this->role == 1 || 2;
    }
}
