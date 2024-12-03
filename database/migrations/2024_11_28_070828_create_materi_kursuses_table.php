<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materi_kursuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_kursuses')->onDelete('cascade');

            $table->foreignId('pengajar_id')->constrained('pengajars')->onDelete('cascade');
            $table->string('nama');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materi_kursuses');
    }
};
