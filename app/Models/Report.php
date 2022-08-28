<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'nomor', 'laporan', 'nppd_id', 'user_id'
    ];

    public function nppd_get()
    {
        return $this->belongsTo(Nppd::class, 'nppd_id', 'id');
    }
}
