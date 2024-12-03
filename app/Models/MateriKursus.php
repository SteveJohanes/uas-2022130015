<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class MateriKursus extends Model
{
    protected $table = 'materi_kursuses';
    protected $fillable = ['nama', 'kategori_id', 'kursus_id', 'pengajar_id'];

    public function kategori()
    {
        return $this->belongsTo(KategoriKursus::class, 'kategori_id');
    }

    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kursus_id');
    }

    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class, 'pengajar_id');
    }

    public function materis()
    {
        return $this->hasMany(Materi::class, 'materikursus_id');
    }
}
