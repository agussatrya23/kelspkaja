<?php

namespace App\Http\Controllers;

use App\Models\Kartukeluarga;
use App\Models\MdJabatan;
use App\Models\MdStatuskeluarga;
use App\Models\MdSurat;
use Illuminate\Http\Request;

class Select2Controller extends Controller
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

    public function jabatan(Request $request)
    {
       $term = trim($request->q);
       $datas = MdJabatan::when(!empty($term), function ($query) use ($term) {
             return $query->where('nama', 'LIKE', '%'. $term .'%');
         })->get();
       $ta  = array();
       foreach ($datas as $data) {
           $ta[] = ['id' => $data->id, 'text' => $data->nama];
       }
       return response()->json($ta);
    }

    public function nokk(Request $request)
    {
       $term = trim($request->q);
       $datas = Kartukeluarga::when(!empty($term), function ($query) use ($term) {
             return $query->where('nokk', 'LIKE', '%'. $term .'%');
         })->get();
       $ta  = array();
       foreach ($datas as $data) {
           $ta[] = ['id' => $data->id, 'text' => $data->nokk];
       }
       return response()->json($ta);
    }

    public function statuskeluarga(Request $request)
    {
       $term = trim($request->q);
       $datas = MdStatuskeluarga::when(!empty($term), function ($query) use ($term) {
             return $query->where('nama', 'LIKE', '%'. $term .'%');
         })->get();
       $ta  = array();
       foreach ($datas as $data) {
           $ta[] = ['id' => $data->id, 'text' => $data->nama];
       }
       return response()->json($ta);
    }

    public function surat(Request $request)
    {
       $term = trim($request->q);
       $datas = MdSurat::when(!empty($term), function ($query) use ($term) {
             return $query->where('nama', 'LIKE', '%'. $term .'%');
         })->get();
       $ta  = array();
       foreach ($datas as $data) {
           $ta[] = ['id' => $data->id, 'text' => $data->nama];
       }
       return response()->json($ta);
    }
}
