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
        Schema::create('pelanggan_files', function (Blueprint $table) {
        $table->id();
        // Sesuaikan tipe data dengan primary key di tabel pelanggan (biasanya bigInteger / integer)
        $table->unsignedBigInteger('pelanggan_id'); 
        $table->string('filename');
        $table->timestamps();

        // Foreign key agar jika pelanggan dihapus, file ikut terhapus (opsional)
        $table->foreign('pelanggan_id')->references('pelanggan_id')->on('pelanggan')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan_files');
    }
};
