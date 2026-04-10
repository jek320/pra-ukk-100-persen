<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $fillable = ['siswa_id', 'isi', 'status'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
