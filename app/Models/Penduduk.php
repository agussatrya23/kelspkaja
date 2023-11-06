<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kartukeluarga()
    {
        return $this->hasone(Kartukeluarga::class,'id','idkk');
    }

    public function statuskeluarga()
    {
        return $this->hasone(MdStatuskeluarga::class,'id','idstatuskeluarga');
    }
}
