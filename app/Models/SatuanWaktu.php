<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanWaktu extends Model
{
    use HasFactory;

    protected $table = 'satuan_waktu';
    protected $fillable = ['nama', 'status'];
}
