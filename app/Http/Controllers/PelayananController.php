<?php

namespace App\Http\Controllers;

use App\Models\KematianDetil;
use App\Models\Penduduk;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    // public function indexsurket(){
    //     return view('pelayanan.surat-keterangan.index');
    // }

    public function carinik(){
        return view('pelayanan.surat-keterangan.carinik');
    }

    public function pengajuaneksternal(){
        return view('pelayanan.surat-keterangan.eksternal');
    }

    public function indexpengajuan(Request $request){
        $carinik = $request->input('carinik');
        $data = Penduduk::with(['kartukeluarga'])->where('nik' , $carinik)->first();

        if (!empty($data)) {
            return view('pelayanan.surat-keterangan.pengajuan', compact('carinik','data'));
        }else{
            return back()->with('status', $carinik);
        }
    }

    public function indexcekpengajuan(){
        return view('pelayanan.surat-keterangan.cekpengajuan');
    }

    public function cekpengajuan(Request $request){
        $carinik = $request->input('carinik');
        $idsurat = $request->input('idsurat');
        $data = Pengajuan::leftjoin('penduduks','penduduks.id','pengajuans.idpenduduk')
            ->leftjoin('md_surats','md_surats.id','pengajuans.idsurat')
            ->where('penduduks.nik',$carinik)
            ->where('pengajuans.idsurat',$idsurat)
            ->orderBy('pengajuans.created_at','DESC')
            ->selectraw('penduduks.nama,pengajuans.status,pengajuans.nohp,md_surats.nama as surat')
            ->first();
        if (!empty($data)) {
            $status = $data->status;
            if ($status == 0) {
                return back()->with('status', 'Pengajuan '.$data->surat.' a/n '.$data->nama.' sedang dalam proses Verifikasi Kepala Lingkungan' );
            } else if ($status == 1) {
                return back()->with('status', 'Pengajuan '.$data->surat.' a/n '.$data->nama.' sedang dalam proses Penomoran Surat oleh Petugas Administrasi' );
            } else if ($status == 2) {
                return back()->with('status', 'Pengajuan '.$data->surat.' a/n '.$data->nama.' sedang dalam proses Validasi Lurah' );
            } else if ($status == 3) {
                return back()->with('status', 'Pengajuan '.$data->surat.' a/n '.$data->nama.' sedang dalam proses Pengiriman Melalui WhatsApp' );
            } else if ($status == 4) {
                return back()->with('status', 'Pengajuan '.$data->surat.' a/n '.$data->nama.' sudah dikirimkan melalui No WhatsApp +'.$data->nohp );
            } else if ($status == 5) {
                return back()->with('error', 'Pengajuan '.$data->surat.' a/n '.$data->nama.' ditolak! Harap melakukan pengajuan ulang' );
            }
        } else {
            return back()->with('error', 'Pengajuan surat keterangan tidak ditemukan');
        }


        // try {
        //     $nik = $request->carinik;
        //     $idsurat = $request->idsurat;
        //     $data = Pengajuan::leftjoin('penduduks','penduduks.id','pengajuans.idpenduduk')
        //     ->leftjoin('md_surats','md_surats.id','pengajuans.idsurat')
        //     ->where('penduduks.nik',$nik)
        //     ->where('pengajuans.idsurat',$idsurat)
        //     ->orderBy('pengajuans.created_at','DESC')
        //     ->selectraw('penduduks.nama,pengajuans.status,pengajuans.nohp,md_surats.nama as surat')
        //     ->first();
        //     $status = $data->status;
        //     if ($status == 0) {
        //         $proses = 'sedang dalam proses Verifikasi Kepala Lingkungan';
        //     } elseif ($status == 1 ) {
        //         $proses = 'sedang dalam proses Penomoran Surat oleh Petugas Administrasi';
        //     } elseif ($status == 2 ) {
        //         $proses = 'sedang dalam proses Validasi Lurah';
        //     } elseif ($status == 3 ) {
        //         $proses = 'sedang dalam proses Pengiriman Melalui WhatsApp';
        //     } elseif ($status == 4) {
        //         $proses = 'sudah dikirimkan melalui No WhatsApp +'.$data->nohp;
        //     } elseif ($status == 5) {
        //         $proses = 'ditolak! Harap melakukan pengajuan ulang';
        //     }

        //     return back()->with('notif', json_encode([
        //         'title' => "TELUSURI PENGAJUAN",
        //         'text' => "Pengajuan $data->surat a/n $data->nama  $proses",
        //         'type' => "warning"
        //     ]));
        // } catch (\Throwable $e) {
        //     return back()->with('notif', json_encode([
        //         'title' => "TELUSURI PENGAJUAN",
        //         'text' => "Pengajuan surat keterangan tidak ditemukan",
        //         'type' => "error"
        //     ]));
        // }

    }

    public function store(Request $request)
    {
        try {
            $idpenduduk = $request->idpenduduk;
            $idsurat = $request->idsurat;
            $cekpengajuan = Pengajuan::where('idpenduduk',$idpenduduk)->where('idsurat',$idsurat)->whereIn('status', [0,1,2,3])->count();
            if($cekpengajuan > 0){
                return redirect('pelayanan/surat-keterangan')->with('notif', json_encode([
                    'title' => "PENGAJUAN SURAT KETERANGAN GAGAL",
                    'text' => "Tidak dapat melakukan pengajuan, masih terdapat pengajuan yang sedang di proses",
                    'type' => "info"
                ]));
            }
            $ktp = null;
            if ($request->file('ktp') != null) {
                $ktp = $request->file('ktp')->store('pengajuan/ktp', ['disk' => 'public']);
            }
            $photo = null;
            if ($request->file('photo') != null) {
                $photo = $request->file('photo')->store('pengajuan/photo', ['disk' => 'public']);
            }
            $tanggal = date('Y-m-d');
            $pengajuan = Pengajuan::create([
            'idsurat' => $request->idsurat,
            'idpenduduk' => $request->idpenduduk,
            'lingkungan' => $request->lingkungan,
            'nohp' => '62'.$request->nohp,
            'email' => $request->email,
            'keterangan' => $request->keterangan,
            'maksud' => $request->maksud,
            'tanggal' => $tanggal,
            'status' => 0,
            'ktp' => $ktp,
            'photo' => $photo,
            ]);
            if ($idsurat == 4) {
                $detil = KematianDetil::create([
                    'idpengajuan' => $pengajuan->id,
                    'nik' => $request->nikmeniggal,
                    'nama' => $request->namameninggal,
                    'tempatlahir' => $request->tempatlahirmeninggal,
                    'tgllahir' => $request->tgllahirmeninggal,
                    'jk' => $request->jkmeninggal,
                    'agama' => $request->agamameninggal,
                    'alamat' => $request->alamatmeninggal,
                    'tglmeninggal' => $request->tglmeninggal,
                    'tempatmeninggal' => $request->tempatmeninggal,
                    'penyebab' => $request->penyebabmeninggal,
                    'hubungan' => $request->hubungan,
                ]);
            }
            return redirect('pelayanan/surat-keterangan')->with('notif', json_encode([
                'title' => "PENGAJUAN SURAT KETERANGAN",
                'text' => "Berhasil melakukan pengajuan surat keterangan. Surat Keterangan akan dikirimkan melalu email yang telah diinputkan. Mohon menunggu!",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "PENGAJUAN SURAT KETERANGAN",
                'text' => "Gagal melakukan pengajuan surat keterangan, ".$e->getMessage(),
                'type' => "error"
            ]));
        }

    }
}
