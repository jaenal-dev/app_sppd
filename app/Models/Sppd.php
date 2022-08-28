<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'no_sppd', 'pejabat', 'location_id', 'tujuan', 'transport', 'lama', 'instansi', 'tgl_pergi', 'tgl_pulang', 'anggaran', 'ket'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
