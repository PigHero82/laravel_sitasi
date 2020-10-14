<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanLuaran extends Model
{
    use HasFactory;

    protected $table = 'usulan_luaran';
    protected $fillable = ['usulan_id', 'tahun', 'luaran_kelompok_id', 'luaran_luaran_id', 'luaran_target_id', 'jumlah', 'keterangan'];
}
