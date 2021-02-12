<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianIndikator extends Model
{
    use HasFactory;

    protected $table = 'penilaian_indikator';
    protected $fillable = ['penilaian_tahap_id', 'nama', 'deskripsi', 'jenis', 'status'];

    static function getIndikator($jenis)
    {
        return PenilaianIndikator::where('jenis', $jenis)->get();
    }
}
