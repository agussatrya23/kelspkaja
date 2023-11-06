<?php

namespace App\Http\Controllers;

use App\Models\Kartukeluarga;
use App\Models\Penduduk;
use App\Models\Post;
use Illuminate\Http\Request;
use PDF;

class WelcomeController extends Controller
{
    public function index(){
        $info = Post::where('status',1)->whereIn('jenis', [2,3,4])->orderBy('tanggal', 'desc')->take(9)->get();
        $galeri = Post::where('status',1)->where('jenis',1)->orderBy('tanggal', 'desc')->get();

        $totalpenduduk = Penduduk::whereIn('statuspenduduk', [1,2])->count();
        $totallaki = Penduduk::whereIn('statuspenduduk', [1,2])->where('jk',1)->count();
        $totalperempuan = Penduduk::whereIn('statuspenduduk', [1,2])->where('jk',2)->count();
        $totalkk = Kartukeluarga::count();
        return view('index', compact('info','galeri','totalpenduduk','totallaki','totalperempuan','totalkk'));

        // $pdf=PDF::loadView('agik')->setPaper('A4','potrait');
        // return $pdf->stream('agik.pdf');
    }
    

    public function indexkontak(){
        return view('kontak.index');
    }
}
