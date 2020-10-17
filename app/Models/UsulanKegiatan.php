<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanKegiatan extends Model
{
    use HasFactory;

    protected $table = 'usulan_kegiatan';
    protected $fillable = ['usulan_id', 'nama', 'urutan_tahun', 'tanggal_mulai', 'tanggal_selesai'];

    static function getKegiatan($usulanId)
    {
        return UsulanKegiatan::where('usulan_id', $usulanId)->get();
    }
}
