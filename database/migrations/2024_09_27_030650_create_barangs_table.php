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
    Schema::create('barangs', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->constrained('users')->onDelete('cascade');
        $table->json('bayar');
        $table->string('nama_barang');
        $table->bigInteger('harga');
        $table->bigInteger('stock');
        $table->string('gambar'); // Kolom untuk menyimpan gambar, bisa null
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
