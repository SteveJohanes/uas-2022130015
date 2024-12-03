<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materis';
    protected $fillable = ['nama', 'materi', 'kategori_id', 'pengajar_id', 'image'];

    public function kategori()
    {
        return $this->belongsTo(KategoriKursus::class, 'kategori_id');
    }

    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class, 'pengajar_id');
    }
    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kursus_id');
    }

    public function pendaftaranKursus()
    {
        return $this->hasManyThrough(PendaftaranKursus::class, Kursus::class, 'id', 'kursus_id');
    }

    public function materiKursus()
    {
        return $this->belongsTo(MateriKursus::class, 'materikursus_id');
    }
}
