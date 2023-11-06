<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penduduk()
    {
        return $this->hasOne(Penduduk::class,'id','idpenduduk');
    }

    public function surat()
    {
        return $this->hasone(MdSurat::class,'id','idsurat');
    }

    public function detil()
    {
        return $this->hasone(KematianDetil::class,'id','idpengajuan');
    }
}

