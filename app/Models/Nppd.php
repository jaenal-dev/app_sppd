<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nppd extends Model
{
    use HasFactory;

    protected $id;

    protected $guarded = ['id'];

    public function nppd_user()
    {
        return $this->belongsTo(NppdUser::class, 'id', 'nppd_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'nppd_user', 'nppd_id', 'user_id');
    }

    public function location()
    {
        return $this->belongsToMany(Locations::class, 'location_nppd', 'nppd_id', 'location_id');
    }

    public function transport()
    {
        return $this->belongsToMany(Transports::class, 'nppd_transport', 'nppd_id', 'transport_id');
    }

    public function anggaran()
    {
        return $this->belongsTo(Anggaran::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->id = Nppd::orderBy('id')->max('id') + 1;
            $model->nomor = str_pad($model->id, 3, '0', STR_PAD_LEFT) . '/' . 'SPT-PNS'. '/' . '2022';
        });
    }
}
