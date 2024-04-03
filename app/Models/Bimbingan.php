<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    public function gurubk()
    {
        return $this->belongsTo(GuruBk::class, 'gurubk_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(JadwalBimbingan::class, 'jadwal_id');
    }
}
