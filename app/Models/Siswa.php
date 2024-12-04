<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit
    protected $table = 'siswas'; // Mengganti dengan nama tabel yang sesuai

    protected $fillable = [
        'nis',
        'name',  // Pastikan kolom 'name' ada di tabel siswas
        'umur',
        'type',
    ];
}
