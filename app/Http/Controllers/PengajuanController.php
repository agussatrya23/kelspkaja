<?php

namespace App\Http\Controllers;

use App\Models\KematianDetil;
use DataTables;
use PDF;
use App\Models\Pengajuan;
use App\Models\Staf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index()
    {
        return view ('pengajuan.index');
    }

    public function dt($idsurat = null){
        if ($idsurat == 0) {
            $idsurat = null;
        }
        $data = Pengajuan::with(['penduduk','surat'])
        ->when(!empty($idsurat), function ($query) use ($idsurat) {
            return $query->where('idsurat',$idsurat);
        })->get();
        if (auth::user()->can('kaling')) {
            if (auth::user()->staf->idjabatan == 3) {
                $data = Pengajuan::with(['penduduk','surat'])->where('lingkungan', 1)
                ->when(!empty($idsurat), function ($query) use ($idsurat) {
                    return $query->where('idsurat',$idsurat);
                })->get();
            } else if (auth::user()->staf->idjabatan == 4) {
                $data = Pengajuan::with(['penduduk','surat'])->where('lingkungan', 2)
                ->when(!empty($idsurat), function ($query) use ($idsurat) {
                    return $query->where('idsurat',$idsurat);
                })->get();
            } else if (auth::user()->staf->idjabatan == 5) {
                $data = Pengajuan::with(['penduduk','surat'])->where('lingkungan', 3)
                ->when(!empty($idsurat), function ($query) use ($idsurat) {
                    return $query->where('idsurat',$idsurat);
                })->get();
            }
        }


        return DataTables::of($data)
        ->addColumn('dokumen', function($data){
            $status = $data->status;
            return $status;
        })
        ->addColumn('status', function($data){
            $status = $data->status;
            return $status;
        })
        ->addColumn('action', function($data) {
            $status = $data->status;
            $tglvalidasi = $data->tglvalidasi;
            if (auth::user()->can('kaling')) {
                if ($status == 0){
                    $validasi = '
                    <button type="button" value="'.$data->id.'" class="btn btn-outline-warning btn-sm waves-effect waves-float waves-light mx-25" name="button" id="btn-verifikasi"  data-toggle="modal" data-target="#nomor-surat" data-backdrop="static" data-keyboard="false""><i data-feather="check"></i> Verifikasi</button>';
                } else if ($status == 3) {
                    $validasi ='
                    <form action="'.route('pengajuan.validasi').'" method="post">
                    <input type="hidden" name="id" value="'.$data->id.'">
                    <input type="hidden" name="status" value="4">
                    <input type="hidden" name="tglvalidasi" value="'.$tglvalidasi.'">
                    <button type="submit" class="btn btn-outline-danger btn-sm waves-effect waves-float waves-light mx-25" name="button" id="btnvalidasi" data-backdrop="static" data-keyboard="false"><i data-feather="send"></i> Surat Terkirim</button>
                    '.csrf_field().'
                    </form>';
                } else {
                    $validasi = '';
                }
            } else if (auth::user()->can('admin')) {
                if ($status == 1){
                    $validasi='
                    <button type="button" value="'.$data->id.'" class="btn btn-outline-info btn-sm waves-effect waves-float waves-light mx-25" name="button" id="btn-nomor"  data-toggle="modal" data-target="#nomor-surat" data-backdrop="static" data-keyboard="false""><i data-feather="plus-circle"></i> Nomor Surat</button>';
                } else {
                    $validasi='';
                }
            } else if (auth::user()->can('lurah')) {
                if ($status == 2){
                    $tanggal = date('Y-m-d');
                    $validasi='
                    <form action="'.route('pengajuan.validasi').'" method="post">
                    <input type="hidden" name="id" value="'.$data->id.'">
                    <input type="hidden" name="status" value="3">
                    <input type="hidden" name="tglvalidasi" value="'.$tanggal.'">
                    <button type="submit" class="btn btn-outline-success btn-sm waves-effect waves-float waves-light mx-25" name="button" id="btnvalidasi" data-backdrop="static" data-keyboard="false"><i data-feather="check"></i> Validasi</button>
                    '.csrf_field().'
                    </form>';
                } else {
                    $validasi='';
                }
            }
            return '<div class="row mx-0 justify-content-center"><a class="btn btn-sm btn-outline-primary waves-effect waves-float waves-light" href="'.route("pengajuan.detil",$data->id).'" title="Detail Penduduk"><i data-feather="info"></i> Detail</a>'.$validasi.'</div>';

        })
        ->make(true);
    }

    public function validasi(Request $request)
    {
        try {
            $data = Pengajuan::where('id', $request->id)->first();
            $nopengantar = $data->nopengantar;
            if ($data->nopengantar == null) {
                $nopengantar = $request->nopengantar;
                if ($nopengantar != null) {
                    $nopengantar = $request->nopengantar.'/'.$request->jenissurat.'/'.$request->lingk.'/'.$request->kelurahan.'/'.$request->tahun;
                    $ceknopengantar = Pengajuan::where('nopengantar', $nopengantar)->count();
                    if ($ceknopengantar > 0) {
                        return back()->with('notif', json_encode([
                            'title' => "NOMOR SURAT",
                            'text' => "Nomor Surat sudah digunakan",
                            'type' => "warning"
                        ]));
                    }
                }
            }
            $nosurat = $data->nosurat;
            if ($data->nosurat == null) {
                $nosurat = $request->nosurat;
                if ($nosurat != null) {
                    $nosurat = $request->nojenis.'/'.$request->nosurat.'/'.$request->romawi.'/'.$request->kelurahan.'/'.$request->tahun;
                    $ceknosurat = Pengajuan::where('nosurat', $nosurat)->count();
                    if ($ceknosurat > 0) {
                        return back()->with('notif', json_encode([
                            'title' => "NOMOR SURAT",
                            'text' => "Nomor Surat sudah digunakan",
                            'type' => "warning"
                        ]));
                    }
                }
            }
            if ($request->tglverifikasi == null) {
                $tanggal= date('Y-m-d');
            } else {
                $tanggal= $request->tglverifikasi;
            }
            Pengajuan::where('id', $request->id)->update([
                'nopengantar' => $nopengantar,
                'nosurat' => $nosurat,
                'status' => $request->status,
                'tglverifikasi' => $tanggal,
                'tglvalidasi' => $request->tglvalidasi,
            ]);
            $status = $request->status;
            if ($status == 5){
                return back()->with('notif', json_encode([
                    'title' => "TOLAK PENGAJUAN",
                    'text' => "Tolak pengajuan surat keterangan berhasil",
                    'type' => "success"
                ]));
            } else {
                return back()->with('notif', json_encode([
                    'title' => "VALIDASI PENGAJUAN",
                    'text' => "Berhasil validasi pengajuan surat keterangan",
                    'type' => "success"
                ]));
            }
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "VALIDASI PENGAJUAN",
                'text' => "Gagal validasi pengajuan surat keterangan," .$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function detil($id)
    {
        $data = Pengajuan::with(['penduduk','surat'])->where('id', $id)->first();
        $detil = null;
        if ($data->idsurat == 4){
            $detil = KematianDetil::where('idpengajuan', $id)->first();
        }
        return view('pengajuan.detil', compact('data','detil'));
    }

    public function get($id)
    {
        $data = Pengajuan::with(['penduduk','surat'])->where('id', $id)->first();
        return $data;
    }

    public function update(Request $request)
    {
        try {
            $idsurat = $request->idsurat;
            Pengajuan::where('id', $request->id)->update([
                'keterangan' => $request->keterangan,
                'maksud' => $request->maksud,
            ]);
            if ($idsurat == 4) {
                KematianDetil::where('idpengajuan', $request->id)->update([
                    'nik' => $request->nikmeninggal,
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
            return back()->with('notif', json_encode([
                'title' => "UBAH DATA PENGAJUAN",
                'text' => "Berhasil menguah data pengajuan",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "UBAH DATA PENGAJUAN",
                'text' => "Gagal mengubah data pengajuan," .$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function pernyataan($id)
    {
        $data = Pengajuan::with(['penduduk','surat'])->where('id', $id)->first();
        $detil = null;
        if ($data->idsurat == 4){
            $detil = KematianDetil::where('idpengajuan', $id)->first();
        }
        $pdf=PDF::loadView('pengajuan.pernyataan', compact('data','detil'))->setPaper('A4','potrait');
        return $pdf->stream('Surat Pernyataan - '.$data->penduduk->nama.'.pdf');
    }

    public function pengantar($id)
    {
        $data = Pengajuan::with(['penduduk','surat'])->where('id', $id)->first();
        $detil = null;
        if ($data->idsurat == 4){
            $detil = KematianDetil::where('idpengajuan', $id)->first();
        }
        $ling = $data->lingkungan;
        if ($ling == 1) {
            $kaling = Staf::with(['jabatan'])->where('idjabatan', 3)->first();
        } elseif ($ling == 2) {
            $kaling = Staf::with(['jabatan'])->where('idjabatan', 4)->first();
        } elseif ($ling == 3) {
            $kaling = Staf::with(['jabatan'])->where('idjabatan', 5)->first();
        }
        $pdf=PDF::loadView('pengajuan.pengantar', compact('data','kaling','detil'))->setPaper('A4','potrait');
        return $pdf->stream('Surat Pengantar - '.$data->penduduk->nama.'.pdf');
    }

    public function keterangan($id)
    {
        $data = Pengajuan::with(['penduduk','surat','detil'])->where('id', $id)->first();
        $detil = null;
        if ($data->idsurat == 4){
            $detil = KematianDetil::where('idpengajuan', $id)->first();
        }
        $lurah = Staf::with(['jabatan'])->where('idjabatan', 1)->first();
        $pdf=PDF::loadView('pengajuan.keterangan', compact('data','detil','lurah'))->setPaper('A4','potrait');
        return $pdf->stream($data->surat->nama.' - '.$data->penduduk->nama.'.pdf');
    }


}
