<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jenis'];

    static function getSkema()
    {
        return Skema::all();
    }

    static function firstSkema($id)
    {
        return Skema::whereId($id)->findOrFail();
    }
}
