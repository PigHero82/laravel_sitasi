<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $fillable = ['nidn', 'nama', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'ktp', 'telepon', 'hp', 'email', 'web', 'jabatan_id', 'prodi_id', 'sinta_id', 'google_scholar_id', 'status'];
}
