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
        Schema::create('pembayaran_kursuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_kursus_id')->constrained('pendaftaran_kursuses')->onDelete('cascade');
            $table->decimal('jumlah', 10, 2);
            $table->timestamp('waktu_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_kursuses');
    }
};
