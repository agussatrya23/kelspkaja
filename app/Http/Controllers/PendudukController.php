<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Models\Kartukeluarga;
use App\Models\MdStatuskeluarga;
use DataTables;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendudukController extends Controller
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

    public function index(){
        return view('penduduk.index');
    }

    public function create(){
        return view('penduduk.create');
    }

    public function dt(){

        $data = Penduduk::get();
        if (auth::user()->can('kaling')) {
            if (auth::user()->staf->idjabatan == 3) {
                $data = Penduduk::where('lingkungan', 1)->get();
            } else if (auth::user()->staf->idjabatan == 4) {
                $data = Penduduk::where('lingkungan', 2)->get();
            } else if (auth::user()->staf->idjabatan == 5) {
                $data = Penduduk::where('lingkungan', 3)->get();
            }
        }
        return DataTables::of($data)
        ->addColumn('lingkungan', function($data) {
            return Helper::lingkungan($data->lingkungan);
          })
        ->addColumn('action', function($data) {
            return '<div class="row mx-0 justify-content-center"><a class="btn btn-sm btn-outline-primary waves-effect waves-float waves-light" href="'.route("penduduk.detil",$data->id).'"  title="Detail Penduduk"><i data-feather="info"></i> Detail</a></div>';

        })
        ->make(true);
    }

    public function store(Request $request){
        try {
            $ceknik = Penduduk::where('nik',$request->nik)->count();
            if($ceknik > 0) {
                return back()->with('notif', json_encode([
                    'title' => "TAMBAH PENDUDUK",
                    'text' => "NIK yang dimasukan sudah terdaftar",
                    'type' => "info"
                ]));
            }
            Penduduk::create([
                'nik' => $request->nik,
                'idkk' => $request->idkk,
                'nama' =>$request->nama,
                'jk' =>$request->jk,
                'tempatlahir' =>$request->tempatlahir,
                'tgllahir' =>$request->tgllahir,
                'lingkungan' =>$request->lingkungan,
                'agama' =>$request->agama,
                'idstatuskeluarga' =>$request->idstatuskeluarga,
                'statuspenduduk' =>$request->statuspenduduk,
                'statuskawin' =>$request->statuskawin,
                // 'wn' =>$request->wn,
                'pekerjaan' =>$request->pekerjaan,
                'alamat' =>$request->alamat,
            ]);
            return redirect('kependudukan/penduduk')->with('notif', json_encode([
                'title' => "TAMBAH PENDUDUK",
                'text' => "Berhasil menambah penduduk.",
                'type' => "success"
            ]));
        } catch (\Throwable $th) {
            return back()->with('notif', json_encode([
                'title' => "TAMBAH PENDUDUK",
                'text' => "Gagal menambah penduduk, ".$th->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function detil($id)
    {
        $data = Penduduk::with(['kartukeluarga'])->where('id', $id)->first();
        $keluarga = Penduduk::with(['statuskeluarga'])->where('idkk',$data->idkk)->orderby('idstatuskeluarga')->get();
        $kk = Kartukeluarga::get();
        $status = MdStatuskeluarga::get();
        return view('penduduk.detil',compact('data','keluarga','kk','status'));
    }

    public function update(Request $request)
    {
        try {
            $niklama = $request->niklama;
            if($request->nik != $niklama){
                $ceknik = Penduduk::where('nik',$request->nik)->count();
                if($ceknik > 0) {
                    return back()->with('notif', json_encode([
                        'title' => "UBAH PENDUDUK",
                        'text' => "Gagal mengubah penduduk, NIK yang dimasukan sudah terdaftar",
                        'type' => "error"
                    ]));
                }
            }
            Penduduk::where('id',$request->id)->update([
                'nik' => $request->nik,
                'idkk' => $request->idkk,
                'nama' =>$request->nama,
                'jk' =>$request->jk,
                'tempatlahir' =>$request->tempatlahir,
                'tgllahir' =>$request->tgllahir,
                'lingkungan' =>$request->lingkungan,
                'agama' =>$request->agama,
                'idstatuskeluarga' =>$request->idstatuskeluarga,
                'statuspenduduk' =>$request->statuspenduduk,
                'statuskawin' =>$request->statuskawin,
                // 'wn' =>$request->wn,
                'pekerjaan' =>$request->pekerjaan,
                'alamat' =>$request->alamat,
            ]);
            return back()->with('notif', json_encode([
                'title' => "UBAH PENDUDUK",
                'text' => "Berhasil mengubah penduduk.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "UBAH PENDUDUK",
                'text' => "Gagal mengubah penduduk, ".$e->getMessage(),
                'type' => "error"
            ]));
        }
    }
}
