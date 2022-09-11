<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor', 'spt_id', 'user_id', 'tempat_berangkat', 'instansi', 'mata_anggaran', 'keterangan'
    ];

    public function spt_user()
    {
        return $this->belongsTo(SptUser::class, 'id', 'spt_id');
    }

    public function spt()
    {
        return $this->belongsTo(Spt::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->id = Sppd::orderBy('id')->max('id') + 1;
            $model->nomor = str_pad($model->id, 3, '0', STR_PAD_LEFT) . '/' . 'SPPD'. '/' . 'PNS' . '/' . 'setwan' . '/' . '2022';
        });
    }
}
