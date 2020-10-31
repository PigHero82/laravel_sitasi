<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';
    protected $timestamp = false;

    static function allKecamatan()
    {
        return Kecamatan::all();
    }

    static function getKecamatan($id)
    {
        return Kecamatan::where('kabkota_id', $id)->get();
    }
}
