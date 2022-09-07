<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->id = Sppd::orderBy('id')->max('id') + 1;
            $model->nomor = str_pad($model->id, 3, '0', STR_PAD_LEFT) . '/' . '622.96'. '/' . 'um' . '/' . '2891 - setwan' . '/' . '2022';
        });
    }
}
