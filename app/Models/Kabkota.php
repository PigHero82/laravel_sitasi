<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabkota extends Model
{
    use HasFactory;

    protected $table = 'kabkota';
    protected $timestamp = false;

    static function allKabkota()
    {
        return Kabkota::all();
    }

    static function getKabkota($id)
    {
        return Kabkota::where('provinsi_id', $id)->get();
    }
}
