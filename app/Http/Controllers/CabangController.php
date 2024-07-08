<?php

namespace App\Http\Controllers;

use App\Models\Dlaundry;
use App\Models\Layanan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Spatie\Backtrace\File as SpatieFile;
use Illuminate\Support\Facades\File;

class CabangController extends Controller
{
    public function cabangLaundry(Request $request)
    {
        $search = $request->input('search');
        $id_user = auth()->user()->id; // Ambil ID pengguna yang sedang masuk

        $data = Dlaundry::where('id_user', $id_user)
            ->when($search, function ($query) use ($search) {
                $query->where('nama_laundry', 'LIKE', '%' . $search . '%');
            })
            ->paginate(5);

        return view('cabang.laundry', compact('data'));
    }


    public function tambahLaundry()
    {
        return view('cabang.tambahLaundry');
    }

    public function postTambahLaundry(Request $request)
{
    $request->validate([
        'id_user' => 'required',
        'kode_laundry' => 'required',
        'nama_laundry' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'required|image|max:5120', // Menambahkan validasi untuk memastikan file adalah gambar
        'alamat' => 'required',
        'no_hp' => 'required',
    ], [
        'gambar.required' => 'File gambar wajib diunggah.',
        'gambar.image' => 'File yang diunggah harus berupa gambar.',
        'gambar.max' => 'Ukuran gambar tidak boleh melebihi 5 MB.',
    ]);

    $dlaundry = new Dlaundry;
    $dlaundry->id_user = $request->id_user;
    $dlaundry->kode_laundry = $request->kode_laundry;
    $dlaundry->nama_laundry = $request->nama_laundry;
    $dlaundry->deskripsi = $request->deskripsi;
    $dlaundry->alamat = $request->alamat;
    $dlaundry->no_hp = $request->no_hp;

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
    } else {
        return back()->with('failed', 'File gambar wajib diunggah.'); // Menambahkan pesan jika file gambar tidak diunggah
    }

    if ($dlaundry->save()) {
        return back()->with('success', 'Laundry baru berhasil ditambahkan!'); // Pesan keberhasilan yang lebih informatif
    } else {
        return back()->with('failed', 'Data gagal ditambahkan!'); // Pesan kegagalan yang lebih informatif
    }
}
    public function editLaundry($id)
    {
        $data = Dlaundry::find($id);

        return view('cabang.editLaundry', compact('data'));
    }

    public function postEditLaundry(Request $request, $id)
    {
        $request->validate([
            'kode_laundry' => 'required',
            'nama_laundry' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|max:5120',
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

    public function pemesananLaundry($id)
    {
    }

    public function layananLaundry(Request $request)
    {
        $search = $request->input('search');
        $id_user = auth()->user()->id; // Ambil ID pengguna yang sedang masuk

        $data = Layanan::where('id_user', $id_user)
            ->when($search, function ($query) use ($search) {
                $query->where('harga', 'LIKE', '%' . $search . '%');
            })
            ->paginate(5);
        return view('cabang.layanan', compact('data'));
    }

    public function tambahLayanan()
    {
        return view('cabang.tambahLayanan');
    }

    public function postTambahLayanan(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'jenis' => 'required',
            'durasi' => 'required',
            'harga' => 'required',
        ]);

        $layanan = new Layanan;
        $layanan->id_user = $request->id_user;
        $layanan->jenis = $request->jenis;
        $layanan->durasi = $request->durasi;
        $layanan->harga = $request->harga;

        $layanan->save();

        if ($layanan) {
            return back()->with('success', 'Layanan baru berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Data gagal ditambahkan!');
        }
    }

    public function editLayanan($id)
    {

        $data = Layanan::find($id);
        return view('cabang/editLayanan', compact('data'));
    }

    public function postEditLayanan(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required',
            'durasi' => 'required',
            'harga' => 'required',
        ]);

        $layanan = Layanan::find($id);

        if (!$layanan) {
            return back()->with('failed', 'Layanan tidak ditemukan!');
        }

        // Hanya perbarui field yang sesuai
        $layanan->jenis = $request->jenis;
        $layanan->durasi = $request->durasi;
        $layanan->harga = $request->harga;

        $layanan->save();

        if ($layanan) {
            return back()->with('success', 'Layanan berhasil diupdate!');
        } else {
            return back()->with('failed', 'Layanan gagal diupdate!');
        }
    }
    public function delete($id)
    {
        $layanan = Layanan::find($id);
        $layanan->delete();

        return redirect('/layanan')->with('success', 'Layanan berhasil dihapus');
    }

    public function CabangPemesanan(Request $request)
    {
        $search = $request->input('search');
        $id_user = auth()->user()->id;

        $data = Pemesanan::where('id_user', $id_user);

        // Tambahkan kondisi pencarian jika search tidak kosong
        if ($search) {
            $data->where('jenis', 'LIKE', '%' . $search . '%');
        }

        $data = $data->paginate(5);

        return view('cabang.pemesanan', compact('data'));
    }

    public function EditPemesanan($id)
    {
        $data = Pemesanan::find($id);

        return view('cabang/editPemesanan', compact('data'));
    }


    public function postEditPemesanan(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'id_user' => 'required',
            'id_laundry' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis' => 'required',
            'berat' => 'required',
            'total' => 'required|numeric',
            'status' => 'required'
        ]);
        $pemesanan = Pemesanan::find($id);
        $pemesanan->nama = $request->nama;
        $pemesanan->id_user = $request->id_user;
        $pemesanan->id_laundry = $request->id_laundry;
        $pemesanan->alamat = $request->alamat;
        $pemesanan->no_hp = $request->no_hp;
        $pemesanan->jenis = $request->jenis;
        $pemesanan->berat = $request->berat;
        $pemesanan->total =  $request->total;
        $pemesanan->status = $request->status;

        $pemesanan->save();
        if ($pemesanan) {
            return back()->with('success', 'Data pemesanan berhasil di update!');
        } else {
            return back()->with('failed', 'Gagal mengupdate data pemesanan!');
        }
    }
    public function deletePemesanan($id){
        $data = Pemesanan::find($id);
            
        if ($data) {
            $data->delete();
            return back()->with('success', 'Data Pemesanan berhasil dihapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data Pemesanan. Data tidak ditemukan.');
        }
    }
}
