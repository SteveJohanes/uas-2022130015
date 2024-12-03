<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class KategoriKursus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
    ];
    protected $table = 'kategori_kursuses';

    public function materis()
    {
        return $this->hasMany(Materi::class);
    }

    public function pendaftaranKursus()
    {
        return $this->hasMany(PendaftaranKursus::class, 'kategori_id');
    }

}
