<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitraJenis extends Model
{
    use HasFactory;

    protected $table = 'mitra_jenis';
    protected $fillable = ['nama', 'status'];

    static function getActiveJenis()
    {
        return MitraJenis::where('status', 1)->get();
    }

    static function getJenis()
    {
        return MitraJenis::all();
    }
}
