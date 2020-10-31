<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    use HasFactory;

    protected $table = 'peran';
    protected $fillable = ['nama', 'status'];

    static function getActivePeran()
    {
        return Peran::where('status', 1)->get();
    }

    static function getPeran()
    {
        return Peran::all();
    }
}
