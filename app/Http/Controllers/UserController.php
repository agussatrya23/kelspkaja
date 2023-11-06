<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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

    public function store(Request $request)
    {
        $email = User::where('email',$request->email)->count();
        if ($email > 0) {
            return back()->with('notif', json_encode([
            'title' => "BUAT USER",
            'text' => "Username sudah terdaftar.",
            'type' => "error"
            ]));
        }

        try {
           User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'link' => $request->link,
            'role' => $request->role,
            'remember_token' => Str::random(40),
           ]);

           return back()->with('notif', json_encode([
            'title' => "BUAT USER",
            'text' => "Berhasil menambah user",
            'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "BUAT USER",
                'text' => "Gagal menambah user".$e->getMessage(),
                'type' => "error"
              ]));
        }
    }

    public function update(Request $request)
    {
        try {
            User::where('id', $request->iduser)->update([
                'role' => $request->role,
            ]);
            return back()->with('notif', json_encode([
                'title' => "UBAH USER",
                'text' => "Berhasil mengubah user.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "BUAT USER",
                'text' => "Gagal mengubah user".$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function ubahpassword(Request $request)
    {
      try {
        if (Hash::check($request->passwordlama, Auth::user()->password)) {
          User::where('id',Auth::user()->id)->update([
            'password' => bcrypt($request->passwordbaru),
            'remember_token' => Str::random(40)
          ]);
        }else {
          return back()->with('notif', json_encode([
            'title' => "UBAH PASSWORD",
            'text' => "Password lama tidak sesuai.",
            'type' => "error"
          ]));
        }
        return back()->with('notif', json_encode([
          'title' => "USER",
          'text' => "Berhasil mengubah password. ",
          'type' => "success"
      ]));
      } catch (\Exception $e) {
        return back()->with('notif', json_encode([
          'title' => "USER",
          'text' => "Gagal mengubah password. ".$e->getMessage(),
          'type' => "error"
        ]));
      }

    }

    public function delete(Request $request)
    {
        try {
            User::where('id', $request->iduser)->delete();
            return redirect('staf')->with('notif', json_encode([
                'title' => "HAPUS USER",
                'text' => "Berhasil menghapus user.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "HAPUS USER",
                'text' => "Gagal menghapus user," .$e->getMessage(),
                'type' => "error"
            ]));
        }
    }
}
