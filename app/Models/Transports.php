<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transports extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function nppd()
    {
        return $this->belongsToMany(Nppd::class);
    }
}
