<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dlaundry', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned(); // unsigned menunjukkan bahwa nilainya selalu positif
            $table->string('gambar');
            $table->string('kode_laundry')->unique();
            $table->string('nama_laundry');
            $table->longText('deskripsi');
            $table->string('alamat');
            $table->string('no_hp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dlaundry');
    }
};
