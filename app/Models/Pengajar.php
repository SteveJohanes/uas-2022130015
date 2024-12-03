<?php

namespace App\Models;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{

    protected $table = 'pengajars';

    protected $fillable = [
        'nama',
        'materi',
        'kategori_id',
        'image',
        'pengajar_id',
    ];
    public function materis()
    {
        return $this->hasMany(Materi::class);
    }
}
