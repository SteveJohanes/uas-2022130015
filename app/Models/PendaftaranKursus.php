<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class PendaftaranKursus extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_kursuses';

    protected $fillable = [
        'siswa_id',
        'kategori_id',
        'harga',
        'status',
        'waktu_pendaftaran',
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }


    public function kategori()
    {
        return $this->belongsTo(KategoriKursus::class, 'kategori_id');
    }

}
