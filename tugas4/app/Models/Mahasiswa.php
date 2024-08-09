<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim', 'nama', 'ipk', 'kodejur'
    ];
    protected $table = 'mahasiswa';

    // public function jurusan()
    // {
    //     return $this->belongsTo(Jurusan::class, 'kodejur', 'kodejur');
    // }
}
