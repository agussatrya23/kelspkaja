<?php

namespace App\Http\Controllers;

use App\Helper;
use DataTables;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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
    public function indexinformasi(){
        return view('post.informasi.index');
    }

    public function indexgaleri(){
        return view('post.galeri.index');
    }

    public function dtinformasi(){
        $data = Post::whereNotIn('jenis', [1])->get();
        return DataTables::of($data)
        ->addColumn('tanggal', function($data) {
            return Helper::tanggal($data->tanggal);
          })
        ->addColumn('action', function($data) {
            $confirm='Lanjutkan proses hapus data informasi '.$data->judul.'?';
            $delete='
            <form action="'.route('informasi.delete').'" method="post">
                <input type="hidden" name="id" value="'.$data->id.'">
                <button type="submit" class="btn btn-sm btn-outline-danger btnhapus waves-effect waves-float waves-light" title="Hapus Informasi"><i data-feather="trash"></i> Hapus</button>
                '.csrf_field().'
            </form>';
            return '<div class="row mx-0 justify-content-center"><a class="btn btn-sm btn-outline-primary waves-effect waves-float waves-light" href="'.route("informasi.detil",$data->id).'"  title="Detail Informasi"><i data-feather="info"></i> Detail</a>'.$delete.'</div>';
            })
        ->make(true);
    }

    public function dtgaleri(){
        $data = Post::where('jenis', 1)->get();
        return DataTables::of($data)
        ->addColumn('tanggal', function($data) {
            return Helper::tanggal($data->tanggal);
          })
          ->addColumn('action', function($data) {

            $delete='
            <form action="'.route('galeri.delete').'" method="post">
                <input type="hidden" name="id" value="'.$data->id.'">
                <button type="submit" class="btn btn-sm btn-outline-danger btnhapus waves-effect waves-float waves-light" title="Hapus Galeri"><i data-feather="trash"></i> Hapus</button>
                '.csrf_field().'
            </form>';
            return '<div class="row mx-0 justify-content-center"><a class="btn btn-sm btn-outline-primary waves-effect waves-float waves-light" href="'.route("galeri.detil",$data->id).'"  title="Detail Galeri"><i data-feather="info"></i> Detail</a>'.$delete.'</div>';
            })
        ->make(true);
    }

    public function createinformasi(){
        return view('post.informasi.create');
    }

    public function creategaleri(){
        return view('post.galeri.create');
    }

    public function detilinformasi($id)
    {
        $data = Post::where('id',$id)->first();
        return view('post.informasi.detil',compact('data'));
    }

    public function detilgaleri($id)
    {
        $data = Post::where('id',$id)->first();
        return view('post.galeri.detil',compact('data'));
    }


    public function storeinformasi(Request $request){
        try {
            $gambar = $request->file('gambar')->store('post/informasi', ['disk' => 'public']);

            Post::create([
                'jenis' => $request->jenis,
                'tanggal' => $request->tanggal,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul, '-'),
                'isi' => $request->isi,
                'gambar' => $gambar,
                'status' => $request->status,
            ]);

            return redirect('post/informasi')->with('notif', json_encode([
                'title' => "TAMBAH INFORMASI",
                'text' => "Berhasil menambah informasi.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "TAMBAH INFORMASI",
                'text' => "Gagal menambah informasi," .$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function storegaleri(Request $request){
        try {
            $gambar = $request->file('gambar')->store('post/galeri', ['disk' => 'public']);
            Post::create([
                'jenis' => 1,
                'tanggal' => $request->tanggal,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul, '-'),
                'gambar' => $gambar,
                'status' => $request->status,
            ]);

            return redirect('post/galeri')->with('notif', json_encode([
                'title' => "TAMBAH GALERI",
                'text' => "Berhasil menambah galeri.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "TAMBAH GALERI",
                'text' => "Gagal menambah galeri," .$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function updateinformasi(Request $request)
    {
        try {
            $data = Post::where('id',$request->id)->first();
            $gambar = $data->gambar;
            if ($request->file('gambar') != null) {
                $gambar = $request->file('gambar')->store('post/informasi', ['disk' => 'public']);
            }
            Post::where('id',$request->id)->update([
                'jenis' => $request->jenis,
                'tanggal' => $request->tanggal,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul, '-'),
                'isi' => $request->isi,
                'gambar' => $gambar,
                'status' => $request->status,
            ]);
            return back()->with('notif', json_encode([
                'title' => "UBAH INFORMASI",
                'text' => "Berhasil mengubah informasi.",
                'type' => "success"
            ]));

        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "UBAH INFORMASI",
                'text' => "Gagal mengubah informasi," .$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function updategaleri(Request $request)
    {
        try {
            $data = Post::where('id',$request->id)->first();
            $gambar = $data->gambar;
            if ($request->file('gambar') != null) {
                $gambar = $request->file('gambar')->store('post/galeri', ['disk' => 'public']);
            }
            Post::where('id',$request->id)->update([
                'tanggal' => $request->tanggal,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul, '-'),
                'gambar' => $gambar,
                'status' => $request->status,
            ]);
            return back()->with('notif', json_encode([
                'title' => "UBAH GALERI",
                'text' => "Berhasil mengubah galeri.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "UBAH GALERI",
                'text' => "Gagal mengubah galeri," .$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function deleteinformasi(Request $request)
    {
        try {
            $data = Post::where('id', $request->id)->first();
            Storage::delete($data->gambar);
            Post::where('id',$request->id)->delete();
            return redirect('post/informasi')->with('notif', json_encode([
                'title' => "HAPUS INFORMASI",
                'text' => "Berhasil menghapus informasi.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "HAPUS INFORMASI",
                'text' => "Gagal menghapus informasi," .$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function deletegaleri(Request $request)
    {
        try {
            $data = Post::where('id', $request->id)->first();
            Storage::delete($data->gambar);
            Post::where('id',$request->id)->delete();
            return redirect('post/galeri')->with('notif', json_encode([
                'title' => "HAPUS GALERI",
                'text' => "Berhasil menghapus galeri.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "HAPUS GALERI",
                'text' => "Gagal menghapus galeri," .$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

}
