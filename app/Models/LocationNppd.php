<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationNppd extends Model
{
    use HasFactory;

    protected $table = 'location_nppd';

    public function location()
    {
        return $this->belongsTo(Locations::class);
    }

    public function nppd()
    {
        return $this->belongsTo(Nppd::class);
    }
}
