<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nisn','nama','password'];

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }

    public function aspirasi()
    {
        return $this->hasMany(Aspirasi::class);
    }
}
