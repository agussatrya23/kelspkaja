<?php

namespace App\Http\Controllers;

use App\Models\MdJabatan;
use DataTables;
use App\Models\Staf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StafController extends Controller
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

    public function indexstaf()
    {
        return view('staf.index');
    }

    public function createstaf()
    {
        return view('staf.create');
    }

    public function dt()
    {
        $data = Staf::with(['jabatan','user'])
                ->get();
        return DataTables::of($data)
        ->addColumn('action', function($data) {
            $user = null;
            if (auth::user()->can('kaling') == false) {
                if ($data->user == null){
                    $user ='<button type="button" value="'.$data->id.'" class="btn btn-outline-success btn-sm waves-effect waves-float waves-light mx-25" name="button" id="btnuser"  data-toggle="modal" data-target="#modal-user" data-backdrop="static" data-keyboard="false";"><i data-feather="user-plus"></i> Buat User</button>';
                } else {
                    // $user ='<button type="button" value="'.$data->id.'" class="btn btn-outline-info btn-sm waves-effect waves-float waves-light mx-25" name="button" id="edituser"  data-toggle="modal" data-target="#modal-user" data-backdrop="static" data-keyboard="false";"><i data-feather="user"></i> Ubah User</button>
                    // ';
                    $user ='
                    <form action="'.route('user.delete').'" method="post">
                    <input type="hidden" name="iduser" value="'.$data->user->id.'">
                    <button type="submit" class="btn btn-sm btn-outline-danger btnhapus waves-effect waves-float waves-light" title="Hapus User"><i data-feather="trash"></i> Hapus User</button>
                    '.csrf_field().'
                </form>';
                }
            }
            return '<div class="row mx-0 justify-content-center"><a class="btn btn-sm btn-outline-primary waves-effect waves-float waves-light" href="'.route("staf.detil",$data->id).'"  title="Detail Aparatur"><i data-feather="info"></i> Detail</a>'.$user.'</div>';

        })
        ->make(true);
    }

    public function store(Request $request)
    {
        try {
            $ceknip = Staf::where('nip',$request->nip)->count();
            // $cekemail = Staf::where('email',$request->email)->count();
            if($ceknip > 0) {
                return back()->with('notif', json_encode([
                    'title' => "TAMBAH APARATUR",
                    'text' => "NIP yang dimasukan sudah terdaftar",
                    'type' => "info"
                ]));
            }

            // if($cekemail > 0) {
            //     return back()->with('notif', json_encode([
            //         'title' => "TAMBAH APARATUR",
            //         'text' => "Email yang dimasukan sudah terdaftar",
            //         'type' => "info"
            //     ]));
            // }

            $photo = null;
            if ($request->file('photo') != null) {
                $photo = $request->file('photo')->store('staf/photo', ['disk' => 'public']);
            }

            Staf::create([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'idjabatan' => $request->idjabatan,
                'jk' => $request->jk,
                'tempatlahir' => $request->tempatlahir,
                'tgllahir' => $request->tgllahir,
                'agama' => $request->agama,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'statuskawin' => $request->statuskawin,
                'photo' => $photo,
            ]);
            return redirect('staf')->with('notif', json_encode([
              'title' => "TAMBAH APARATUR",
              'text' => "Berhasil menambah data aparatur",
              'type' => "success"
        ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
              'title' => "TAMBAH APARATUR",
              'text' => "Gagal menambah data aparatur".$e->getMessage(),
              'type' => "error"
            ]));
        }
    }

    public function get($id)
    {
        $data = Staf::with(['jabatan','user'])->where('id',$id)->first();
        return $data;
    }

    public function detil($id)
    {
        $data = Staf::with(['jabatan'])->where('id',$id)->first();
        $jabatan = MdJabatan::get();
        return view('staf.detil',compact('data','jabatan'));
    }

    public function update(Request $request)
    {
        try {
            $data = Staf::where('id',$request->id)->first();
            $niplama = $request->niplama;
            if($request->nip != $niplama){
                $ceknip = Staf::where('nip',$request->nip)->count();
                if($ceknip > 0) {
                    return back()->with('notif', json_encode([
                        'title' => "UBAH APARATUR",
                        'text' => "Gagal mengubah aparatur, NIP yang dimasukan sudah terdaftar",
                        'type' => "error"
                    ]));
                }
            }
            $photo = $data->photo;
            if ($request->file('photo') != null) {
                $photo = $request->file('photo')->store('staf/photo', ['disk' => 'public']);
            }
            Staf::where('id',$request->id)->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'idjabatan' => $request->idjabatan,
                'jk' => $request->jk,
                'tempatlahir' => $request->tempatlahir,
                'tgllahir' => $request->tgllahir,
                'agama' => $request->agama,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'statuskawin' => $request->statuskawin,
                'photo' => $photo,
            ]);
            return back()->with('notif', json_encode([
                'title' => "UBAH APARATUR",
                'text' => "Berhasil mengubah data aparatur.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "TAMBAH APARATUR",
                'text' => "Gagal mengubah data aparatur".$e->getMessage(),
                'type' => "error"
              ]));
        }
    }
}
