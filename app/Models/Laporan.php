<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function gurubk()
    {
        return $this->belongsTo(GuruBk::class, 'gurubk_id');
    }

    public function walikelas()
    {
        return $this->belongsTo(WaliKelas::class, 'walikelas_id');
    }
}
