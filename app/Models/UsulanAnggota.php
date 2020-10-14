<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanAnggota extends Model
{
    use HasFactory;

    protected $table = 'usulan_anggota';
    protected $fillable = ['usulan_id', 'dosen_id', 'peran_id', 'waktu', 'status'];
}
