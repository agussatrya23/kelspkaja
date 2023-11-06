<?php
namespace App;

use App\Models\MdBulan;


class Helper
{
    public static function tanggal($tgl)
    {
        if ($tgl == null) {
        return '';
        }
        $bulan = date('n',strtotime($tgl));
        $b = MdBulan::where('id',$bulan)->pluck('nama')->first();
        $t = date('d',strtotime($tgl));
        $ta = date('Y',strtotime($tgl));
        return $t.' '.$b.' '.$ta;
    }

    public static function periode($tgl)
    {
        if ($tgl == null) {
        return '';
        }
        $bulan = date('n',strtotime($tgl));
        $b = MdBulan::where('id',$bulan)->pluck('nama')->first();
        $ta = date('Y',strtotime($tgl));
        return $b.' '.$ta;
    }

    public static function jenispost($jenis)
    {
        if ($jenis == 1){
            return 'Galeri';
        }else if ($jenis == 2){
            return 'Berita';
        }else if ($jenis == 3){
            return 'Pengumuman';
        }else if ($jenis == 4){
            return 'Agenda';
        }else{
            return '';
        }
    }

    public static function lingkungan($lingkungan)
    {
        if ($lingkungan == 1) {
            return 'Besang Kawan';
        } else if ($lingkungan == 2) {
            return 'Besang Tengah';
        } else if ($lingkungan == 3) {
            return 'Besang Kangin';
        } else{
            return '';
        }
    }

    public static function agama($agama)
    {
        if ($agama == 1){
            return 'Galeri';
        }else if ($agama == 2){
            return 'Berita';
        }else if ($agama == 3){
            return 'Pengumuman';
        }else if ($agama == 4){
            return 'Agenda';
        }else{
            return '';
        }
    }
}

?>
