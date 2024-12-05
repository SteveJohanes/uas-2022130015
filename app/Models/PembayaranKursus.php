<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranKursus extends Model
{
    protected $table = 'pembayaran_kursuses';
    protected $fillable = ['pendaftaran_kursus_id', 'jumlah', 'waktu_pembayaran'];

    public function pendaftaranKursus()
    {
        return $this->belongsTo(PendaftaranKursus::class);
    }
}
