<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function indexprofil(){
        return view('tentang.profil');
    }

    public function indexvisimisi(){
        return view('tentang.visimisi');
    }

    public function indexstruktur(){
        return view('tentang.struktur');
    }
}
