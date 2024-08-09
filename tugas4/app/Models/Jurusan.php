<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodejur', 'namajur'
    ];

    protected $table = 'jurusan';

    // public function mahasiswa()
    // {
    //     return $this->hasMany(Mahasiswa::class, 'kodejur', 'kodejur');
    // }
}
