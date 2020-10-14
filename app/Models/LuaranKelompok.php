<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuaranKelompok extends Model
{
    use HasFactory;

    protected $table = 'luaran_kelompok';
    protected $fillable = ['nama', 'status'];
}
