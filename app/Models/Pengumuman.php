<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'content';
    protected $fillable = ['jenis', 'judul', 'katakunci','foto','content','flag_delete'];

}
