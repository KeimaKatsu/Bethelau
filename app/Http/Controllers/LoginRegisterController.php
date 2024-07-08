<?php

namespace App\Http\Controllers;

use App\Models\Dlaundry;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginRegisterController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function userHome(Request $request)
    {
        $search = $request->input('search');
        $data = Dlaundry::where(function ($query) use ($search) {
            $query->where('nama_laundry', 'LIKE', '%' . $search . '%');
        })->paginate(5);

        return view('user.home', compact('data'));
    }

    public function adminHome(Request $request)
    {
        $search = $request->input('search');

        $data = User::where('level', 'admin')
            ->orWhere('level', 'cabang')
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->paginate(5);

        return view('admin.home', compact('data'));
    }

    public function cabangHome()
    {
        return view('cabang.home');
    }
    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:20|confirmed'
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = 'user'; // Atur level default, bisa diubah sesuai kebutuhan

        $user->save();

        if ($user) {
            return redirect('/auth/login')->with('success', 'Akun berhasil dibuat, silahkan melakukan proses login!');
        } else {
            return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
        }
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:20'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if ($user->level == 'user') {
                return redirect('/user/home');
            } elseif ($user->level == 'admin') {
                return redirect('/admin/home');
            } elseif ($user->level == 'cabang') {
                return redirect('/cabang/home');
            }
        }

        return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
