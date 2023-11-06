<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function indexberita(Request $request) {
        $pencarian = $request->input('pencarian');
        $kategori = $request->input('kategori');

        if ($kategori == 'berita') {
            $kategori = 2;
        }
        elseif ($kategori == 'pengumuman'){
            $kategori = 3;
        }
        elseif ($kategori == 'agenda'){
            $kategori = 4;
        }else {
            $kategori = $kategori;
        }

        $dataterkini = Post::where('status', 1)
        ->whereIn('jenis', [2, 3, 4])
        ->orderBy('tanggal', 'desc')
        ->take(3)
        ->get();


        $totalinformasi = Post::where('status', 1)
        ->selectRaw('jenis, count(*) as total_jenis')
        ->groupBy('jenis')
        ->get();

        $totalberita = 0;
        $totalpengumuman = 0;
        $totalagenda = 0;
        foreach($totalinformasi as $item){
            if ($item->jenis == 2){
                $totalberita = $item->total_jenis;
            } else if ($item->jenis == 3){
                $totalpengumuman = $item->total_jenis;
            } else if ($item->jenis == 4){
                $totalagenda = $item->total_jenis;
            }
        }

        $informasi = Post::where('status', 1)
        ->whereNotIn('jenis', [1]);

        $totalsemua = $informasi->count();

        if (!empty($pencarian)) {
            $informasi->where('judul', 'like', '%'.$pencarian.'%');
        }

        if ($kategori != 'semua') {
            $informasi->where('jenis', 'like', '%'.$kategori.'%');
        }

        $datainfo = $informasi->orderby('tanggal', 'desc')->paginate(4);

        return view('informasi.index', compact('dataterkini','datainfo','totalsemua','totalberita','totalpengumuman','totalagenda'));
    }

    public function detilberita($slug) {
        $dataterkini = Post::where('status', 1)
        ->whereIn('jenis', [2, 3, 4])
        ->orderBy('tanggal', 'desc')
        ->take(3)
        ->get();

        $totalinformasi = Post::where('status', 1)
        ->selectRaw('jenis, count(*) as total_jenis')
        ->groupBy('jenis')
        ->get();

        $totalberita = 0;
        $totalpengumuman = 0;
        $totalagenda = 0;
        foreach($totalinformasi as $item){
            if ($item->jenis == 2){
                $totalberita = $item->total_jenis;
            } else if ($item->jenis == 3){
                $totalpengumuman = $item->total_jenis;
            } else if ($item->jenis == 4){
                $totalagenda = $item->total_jenis;
            }
        }
        $informasi = Post::where('status', 1)
        ->whereNotIn('jenis', [1]);
        $totalsemua = $informasi->count();

        $detil = Post::where('slug',$slug)->first();
        $klik = $detil->klik;
        $klik += 1;
        Post::where('slug',$slug)->update(['klik' => $klik]);
        return view('informasi.detil', compact('dataterkini','detil','totalsemua','totalberita','totalpengumuman','totalagenda'));
    }
}
