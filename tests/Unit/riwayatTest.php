<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Pemesanan; // Sesuaikan dengan model yang digunakan untuk pemesanan
use Illuminate\Foundation\Testing\RefreshDatabase;

class RiwayatTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function riwayat_pemesanan_ditampilkan_dengan_benar()
    {
        // Arrange
        $pemesanan = Pemesanan::factory()->create(); // Membuat data pemesanan secara acak
        $expectedData = [
            'id' => $pemesanan->id_user,
            'Nama' => $pemesanan->nama,
            'Alamat' => $pemesanan->alamat,
            'Nomor Handphone' => $pemesanan->no_hp,
            'Jenis Layanan' => $pemesanan->jenis,
            'Total' => $pemesanan->total,
            'Status' => $pemesanan->status
        ];

        // Act
        $response = $this->get('views/user/riwayat.blade.php'); // Ganti '/riwayat' dengan URL yang sesuai dengan riwayat pemesanan
        $response->assertStatus(200); // Memastikan halaman riwayat berhasil diakses
        $response->assertSeeTextInOrder(array_values($expectedData)); // Memastikan data pemesanan ditampilkan sesuai dengan yang diharapkan
    }
}
