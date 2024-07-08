<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class UserController extends Controller
{
    public function Pemesanan()
    {
        return view('user.pemesanan');
    }
    public function postTambahPemesanan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_user' => 'required',
            'id_laundry' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis' => 'required',
            'berat' => 'required',
            'total' => 'required|numeric'
        ]);

        $pemesanan = new Pemesanan;
        $pemesanan->fill([
            'nama' => $request->nama,
            'id_user' => $request->id_user,
            'id_laundry' => $request->id_laundry,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jenis' => $request->jenis,
            'berat' => $request->berat,
            'total' => $request->total,
            'status' => 'Pending',
        ]);

        $saved = $pemesanan->save();

        if ($saved) {
            return back()->with('success', 'Pesanan Sedang Di Proses!');
        } else {
            return back()->with('failed', 'Pesanan Gagal di Proses!');
        }
    }

    public function Priwayat()
    {
        // Ambil ID pengguna yang sedang masuk
        $id_user = auth()->user()->id;

        // Ambil data pemesanan berdasarkan id_user dengan paginasi
        $data = Pemesanan::where('id_user', $id_user)->paginate(10); // Sesuaikan jumlah item per halaman

        // Kirim data ke view
        return view('user.riwayat', compact('data'));
    }

    public function total_harga_seharusnya_terhitung_dengan_benar()
    {
        // Persiapan
        $jenisLayanan = 'Cuci Setrika (Kilat/ 3 jam)';
        $hargaPerKg = 8000;
        $berat = 5;

        // Eksekusi
        $totalHarga = Pemesanan::hitungTotalHarga($jenisLayanan, $hargaPerKg, $berat);

        // Perbandingan
        $this->assertEquals(40000, $totalHarga);
    }
}
