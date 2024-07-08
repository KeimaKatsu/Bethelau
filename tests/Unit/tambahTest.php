<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User; // Sesuaikan dengan model yang digunakan untuk user
use Illuminate\Foundation\Testing\RefreshDatabase;

class TambahTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_dapat_menambah_data_akun()
    {
        // Arrange
        $newUserData = [
            'name' => 'Test User', // Sesuaikan dengan data yang ingin ditambahkan
            'email' => 'test@example.com',
            'level' => 'Admin',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        // Act
        $response = $this->post('/postTambahAdmin', $newUserData); // Ganti '/postTambahAdmin' dengan URL yang sesuai dengan endpoint untuk menambah data akun
        $response->assertStatus(302); // Memastikan request berhasil diarahkan (redirect) setelah data berhasil ditambahkan

        // Assert
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']); // Memastikan data user baru tersimpan di database
    }

    /** @test */
    public function tidak_bisa_menambah_data_akun_jika_input_tidak_lengkap()
    {
        // Arrange
        $incompleteUserData = [
            'name' => '', // Input tidak lengkap, semuanya kosong
            'email' => '',
            'level' => '',
            'password' => '',
            'password_confirmation' => '',
        ];

        // Act
        $response = $this->post('/postTambahAdmin', $incompleteUserData); // Ganti '/postTambahAdmin' dengan URL yang sesuai dengan endpoint untuk menambah data akun

        // Assert
        $response->assertSessionHasErrors(['name', 'email', 'level', 'password', 'password_confirmation']); // Memastikan pesan kesalahan muncul jika input tidak lengkap
    }

    /** @test */
    public function tidak_bisa_menambah_data_akun_dengan_email_yang_sudah_ada()
    {
        // Arrange
        $existingUser = User::factory()->create(); // Membuat user dengan email yang sudah ada di database
        $duplicateEmailData = [
            'name' => 'Test User', // Data baru dengan email yang sudah ada
            'email' => $existingUser->email,
            'level' => 'Admin',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        // Act
        $response = $this->post('/postTambahAdmin', $duplicateEmailData); // Ganti '/postTambahAdmin' dengan URL yang sesuai dengan endpoint untuk menambah data akun

        // Assert
        $response->assertSessionHasErrors(['email']); // Memastikan pesan kesalahan muncul jika email sudah ada di database
        $this->assertDatabaseHas('users', ['email' => 'ibal@gmail.com']); // Memastikan data user baru tersimpan di database
}
    }


Berikut adalah kode pengujian untuk dua skenario yang Anda sebutkan:

php
Copy code
<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TambahTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_dapat_menambah_data_akun()
    {
        // Arrange
        $newUserData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'level' => 'Admin'
        ];

        // Act
        $response = $this->post('/postTambahAdmin', $newUserData); // Ganti '/postTambahAdmin' dengan URL yang sesuai dengan endpoint untuk menambah data akun

        // Assert
        $response->assertStatus(302); // Memastikan request berhasil diarahkan (redirect) setelah data berhasil ditambahkan
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']); // Memastikan data user baru tersimpan di database
    }

    /** @test */
    public function tidak_bisa_menambah_data_akun_jika_input_tidak_lengkap()
    {
        // Arrange
        $incompleteUserData = [];

        // Act
        $response = $this->post('/postTambahAdmin', $incompleteUserData); // Ganti '/postTambahAdmin' dengan URL yang sesuai dengan endpoint untuk menambah data akun

        // Assert
        $response->assertSessionHasErrors(['name', 'email', 'level', 'password', 'password_confirmation']); // Memastikan pesan kesalahan muncul jika input tidak lengkap
    }
}