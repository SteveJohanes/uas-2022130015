<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class Kursus extends Model
{

    use HasFactory;

    protected $table = 'kursuses';

    protected $fillable = [
        'judul',
        'deskripsi',
        'pengajar_id',
    ];

    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class);
    }

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }

    public function pendaftaranKursus()
    {
        return $this->hasMany(PendaftaranKursus::class, 'kursus_id');
    }


}
