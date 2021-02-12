<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanNilai extends Model
{
    use HasFactory;

    protected $table = 'usulan_nilai';
    protected $fillable = ['usulan_id', 'penilaian_indikator_id', 'nilai'];
}
