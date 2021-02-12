<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianTahap extends Model
{
    use HasFactory;

    protected $table = 'penilaian_tahap';
    protected $fillable = ['nama', 'deskripsi', 'status'];
}
