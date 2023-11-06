<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {
        if (auth::user()->role == 1) {
            return self::lurah();
        }
        if (auth::user()->role == 2) {
            return self::admin();
        }
        if (auth::user()->role == 3) {
            return self::kaling();
        }
    }

    public static function lurah(){
        $agendaterkini = Post::where('jenis', 4)->where('status', 1)->orderby('tanggal', 'desc')->take(4)->get();
        $periode = date ('Y-m-d');
        $periode2 = date('Y-m-d', strtotime('-30 days', strtotime($periode)));
        $kaling = Pengajuan::where('status',0)->whereBetween('tanggal', [$periode2, $periode])->count();
        $admin = Pengajuan::where('status',1)->whereBetween('tanggal', [$periode2, $periode])->count();
        $lurah = Pengajuan::where('status',2)->whereBetween('tanggal', [$periode2, $periode])->count();
        $email = Pengajuan::where('status',3)->whereBetween('tanggal', [$periode2, $periode])->count();
        $selesai = Pengajuan::where('status',4)->whereBetween('tanggal', [$periode2, $periode])->count();
        $tolak = Pengajuan::where('status', 5)->whereBetween('tanggal', [$periode2, $periode])->count();
        return view('lurah', compact('agendaterkini','kaling','admin','lurah','email','selesai','tolak'));
    }

    public static function admin(){
        $totalinfo = Post::whereIn('jenis', [2,3,4])->count();
        $totalgaleri = Post::where('jenis', 1)->count();
        $periode = date ('Y-m-d');
        $periode2 = date('Y-m-d', strtotime('-30 days', strtotime($periode)));
        $kaling = Pengajuan::where('status',0)->whereBetween('tanggal', [$periode2, $periode])->count();
        $admin = Pengajuan::where('status',1)->whereBetween('tanggal', [$periode2, $periode])->count();
        $lurah = Pengajuan::where('status',2)->whereBetween('tanggal', [$periode2, $periode])->count();
        $email = Pengajuan::where('status',3)->whereBetween('tanggal', [$periode2, $periode])->count();
        $selesai = Pengajuan::where('status',4)->whereBetween('tanggal', [$periode2, $periode])->count();
        $tolak = Pengajuan::where('status', 5)->whereBetween('tanggal', [$periode2, $periode])->count();
        return view('admin', compact('totalinfo','totalgaleri','kaling','admin','lurah','email','selesai','tolak'));
    }

    public static function kaling(){
        $lingk = 0;
        if (auth::user()->staf->idjabatan == 3){
            $lingk = 1;
        } else if (auth::user()->staf->idjabatan == 4){
            $lingk = 2;
        } else if (auth::user()->staf->idjabatan == 5){
            $lingk = 3;
        }
        $terbaru = Pengajuan::with(['penduduk','surat'])->where('lingkungan', $lingk)->orderby('created_at', 'desc')->take(5)->get();
        $proses = Pengajuan::where('lingkungan', $lingk)->get();
        $periode = date ('Y-m-d');
        $periode2 = date('Y-m-d', strtotime('-30 days', strtotime($periode)));
        $kaling = $proses->where('status',0)->whereBetween('tanggal', [$periode2, $periode])->count();
        $admin = $proses->where('status',1)->whereBetween('tanggal', [$periode2, $periode])->count();
        $lurah = $proses->where('status',2)->whereBetween('tanggal', [$periode2, $periode])->count();
        $email = $proses->where('status',3)->whereBetween('tanggal', [$periode2, $periode])->count();
        $selesai = $proses->where('status',4)->whereBetween('tanggal', [$periode2, $periode])->count();
        $tolak = $proses->where('status', 5)->whereBetween('tanggal', [$periode2, $periode])->count();
        return view('kaling',compact('terbaru','kaling','admin','lurah','email','selesai','tolak'));
    }
}
