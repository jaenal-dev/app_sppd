<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NppdUser extends Model
{
    use HasFactory;

    protected $table = 'nppd_user';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nppd()
    {
        return $this->belongsTo(Nppd::class);
    }
}
