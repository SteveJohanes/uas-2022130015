<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran_kursuses', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('pending');
            $table->decimal('harga', 10, 2)->nullable();
            $table->timestamp('waktu_pendaftaran')->nullable();
            $table->foreignId('siswa_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategori_kursuses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_kursuses');
    }
};
