<?php

namespace App\Http\Controllers;

use App\Helper;
use DataTables;
use Illuminate\Http\Request;
use App\Models\Kartukeluarga;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Auth;

class KartukeluargaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function indexkk()
    {
    return view('kartukeluarga.index');
    }

    public function dt(){
        $kk = Kartukeluarga::leftjoin('penduduks','penduduks.idkk','kartukeluargas.id')
        ->groupby('kartukeluargas.id')
        ->selectraw('kartukeluargas.*,count(penduduks.idkk) as jumlah');
        $data =$kk->get();
        if (auth::user()->can('kaling')) {
            if (auth::user()->staf->idjabatan == 3) {
                $data = $kk->where('kartukeluargas.lingkungan', 1)->get();
            } else if (auth::user()->staf->idjabatan == 4) {
                $data = $kk->where('kartukeluargas.lingkungan', 2)->get();
            } else if (auth::user()->staf->idjabatan == 5) {
                $data = $kk->where('kartukeluargas.lingkungan', 3)->get();
            }
        }
        return DataTables::of($data)
        ->addColumn('lingkungan', function($data) {
            return Helper::lingkungan($data->lingkungan);
            })
        ->addColumn('action', function($data) {
            $ubahkk = null;
            if (auth::user()->can('lurah') == false) {
                $ubahkk = '<button type="button" value="'.$data->id.'" class="btn btn-outline-info btn-sm waves-effect waves-float waves-light mx-25" name="button" id="editkk"  data-toggle="modal" data-target="#modal-kk" data-backdrop="static" data-keyboard="false""><i data-feather="edit"></i> Ubah</button>';
            }
            return '<div class="row mx-0 justify-content-center"><a class="btn btn-sm btn-outline-primary waves-effect waves-float waves-light" href="'.route("kk.detil",$data->id).'"  title="Detail Kartu Keluarga"><i data-feather="info"></i> Detail</a>'.$ubahkk.'</div>';

        })
        ->make(true);
    }

    public function store(Request $request){
        try {
            $ceknokk = Kartukeluarga::where('nokk', $request->nokk)->count();
            if ($ceknokk > 0) {
                return back()->with('notif', json_encode([
                    'title' => "TAMBAH KARTU KELUARGA",
                    'text' => "No KK yang dimasukan sudah terdaftar",
                    'type' => "info"
                ]));
            }

            Kartukeluarga::create([
                'nokk' => $request->nokk,
                'lingkungan' => $request->lingkungan,
            ]);
            return back()->with('notif', json_encode([
                'title' => "TAMBAH KARTU KELUARGA",
                'text' => "Berhasil menambah kartu keluarga.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "TAMBAH KARTU KELUARGA",
                'text' => "Gagal menambah kartu keluarga,".$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function get($id)
    {
        $data = Kartukeluarga::where('id',$id)->first();
        return $data;
    }

    public function detil($id)
    {
        $data = Kartukeluarga::where('id',$id)->first();
        $keluarga = Penduduk::with(['statuskeluarga'])->where('idkk',$id)->orderby('idstatuskeluarga')->get();
        return view('kartukeluarga.detil', compact('data','keluarga'));
    }
    public function update(Request $request)
    {
        try {
            $nokklama = $request->nokklama;
            if ($request->nokk != $nokklama) {
                $ceknokk = Kartukeluarga::where('nokk', $request->nokk)->count();
                if ($ceknokk > 0) {
                    return back()->with('notif', json_encode([
                        'title' => "UBAH KARTU KELUARGA",
                        'text' => "Gagal mengubah kartu keluarga, NOKK yang dimasukan sudah terdaftar",
                        'type' => "error"
                    ]));
                }
            }
            Kartukeluarga::where('id', $request->idkk)->update([
                'nokk' => $request->nokk,
                'lingkungan' => $request->lingkungan,
            ]);
            return back()->with('notif', json_encode([
                'title' => "UBAH KARTU KELUARGA",
                'text' => "Berhasil mengubah kartu keluarga.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "UBAH KARTU KELUARGA",
                'text' => "Gagal mengubah kartu keluarga,".$e->getMessage(),
                'type' => "error"
            ]));
        }
    }
}
