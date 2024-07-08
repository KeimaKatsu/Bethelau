<?php

namespace App\Http\Controllers;

use App\Models\Dlaundry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Spatie\Backtrace\Backtrace;

class AdminController extends Controller
{
    public function tambah()
    {
        return view('admin.tambah');
    }

    public function postTambahAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required',
            'level' => 'required'
        ]);

        $user = new User;
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();

        if ($user) {
            return back()->with('success', 'Akun Baru Berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Gagal Menambahkan Akun Baru!');
        }
    }
    public function editAdmin($id)
    {
        $data = User::find($id);

        return view('admin.edit', compact('data'));
    }

    public function postEditAdmin(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required'
        ]);

        $user = User::find($id);

        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->level = $request->level;
            $user->save();

            return back()->with('success', 'Akun Berhasil di Update!');
        } else {
            return back()->with('failed', 'Gagal Mengupdate Data Akun!');
        }
    }

    public function deleteAdmin($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return back()->with('success', 'Data berhasil di hapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data!');
        }
    }

    public function adminLaundry(Request $request)
    {
        $search = $request->input('search');

        $data = Dlaundry::where(function ($query) use ($search) {
            $query->where('nama_laundry', 'LIKE', '%' . $search . '%');
        })->paginate(5);

        return view('admin.laundry', compact('data'));
    }

    public function tambahLaundry()
    {
        return view('admin.tambahLaundry');
    }
    public function postTambahLaundry(Request $request)
    {
        $request->validate([
            'kode_laundry' => 'required',
            'nama_laundry' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|max:5120', // validasi file gambar
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $dlaundry = new Dlaundry;

        $dlaundry->kode_laundry = $request->input('kode_laundry');
        $dlaundry->nama_laundry = $request->input('nama_laundry');
        $dlaundry->deskripsi = $request->input('deskripsi');
        $dlaundry->alamat = $request->input('alamat');
        $dlaundry->no_hp = $request->input('no_hp');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            if ($file->isValid()) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('images/', $filename);
                $dlaundry->gambar = $filename;
            } else {
                return back()->with('failed', 'File gambar tidak valid.');
            }
        }

        $dlaundry->save();

        if ($dlaundry) {
            return back()->with('success', 'Laundry baru berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Data gagal ditambahkan!');
        }
    }

    public function editLaundry($id)
    {
        $data = Dlaundry::find($id);

        return view('admin.editLaundry', compact('data'));
    }


    public function postEditLaundry(Request $request, $id)
    {
        $request->validate([
            'kode_laundry' => 'required',
            'nama_laundry' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|max:5120', // Hapus "required" di sini
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $dlaundry = Dlaundry::find($id);

        $dlaundry->kode_laundry = $request->kode_laundry;
        $dlaundry->nama_laundry = $request->nama_laundry;
        $dlaundry->deskripsi = $request->deskripsi;
        $dlaundry->alamat = $request->alamat;
        $dlaundry->no_hp = $request->no_hp;

        if ($request->hasFile('gambar')) {
            $filepath = 'images/' . $dlaundry->gambar;
            if (File::exists($filepath)) {
                File::delete($filepath);
            }

            $file = $request->file('gambar');
            if ($file->isValid()) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('images/', $filename);
                $dlaundry->gambar = $filename;
            } else {
                return back()->with('failed', 'File gambar tidak valid.');
            }
        }

        $dlaundry->save();

        if ($dlaundry) {
            return back()->with('success', 'Laundry berhasil diupdate!');
        } else {
            return back()->with('failed', 'Laundry gagal diupdate!');
        }
    }


    public function deleteLaundry($id)
    {
        $dlaundry = Dlaundry::find($id);

        $filepath = 'images/' . $dlaundry->gambar;

        if (File::exists($filepath)) {
            File::delete($filepath);
        }

        $dlaundry->delete();

        if ($dlaundry) {
            return back()->with('success', 'Data laundry berhasil dihapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data laundry!');
        }
    }
}
