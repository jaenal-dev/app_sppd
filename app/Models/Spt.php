<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spt extends Model
{
    use HasFactory;

    protected $id;

    protected $guarded = ['id'];

    public function spt_user()
    {
        return $this->belongsTo(SptUser::class, 'id', 'spt_id');
    }

    public function pejabat()
    {
        return $this->belongsTo(Pejabat::class);
    }

    public function rekening()
    {
        return $this->belongsTo(KodeRekening::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'spt_users', 'spt_id', 'user_id');
    }

    public function location()
    {
        return $this->belongsToMany(Locations::class, 'locations_spt', 'spt_id', 'locations_id');
    }

    public function transport()
    {
        return $this->belongsToMany(Transports::class, 'spt_transports', 'spt_id', 'transports_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->id = Sppd::orderBy('id')->max('id') + 1;
            $model->nomor = str_pad($model->id, 3, '0', STR_PAD_LEFT) . '/' . '622.96'. '/' . 'um' . '/' . '2891 - setwan' . '/' . '2022';
        });
    }
}
