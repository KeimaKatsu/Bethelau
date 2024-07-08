<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('id_user')->constrained('users');
            $table->foreignId('id_laundry')->constrained('dlaundry');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('jenis')->constrained('layanan');
            $table->integer('berat');
            $table->decimal('total', 10, 2);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
};
