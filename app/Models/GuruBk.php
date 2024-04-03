<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruBk extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jadwal()
    {
        return $this->hasOne(JadwalBimbingan::class, 'gurubk_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'gurubk_id');
    }
}
