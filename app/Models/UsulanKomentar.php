<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanKomentar extends Model
{
    use HasFactory;

    protected $table = 'usulan_komentar';
    protected $fillable = ['usulan_id', 'penilaian_tahap_id', 'komentar'];
}
