<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $fillable = [
        'nama_siswa',
        'email',
        'password',
        'telepon',
    ];

    public function pendaftaranKursus()
{
    return $this->hasMany(PendaftaranKursus::class);
}

}
