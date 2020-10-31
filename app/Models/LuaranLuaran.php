<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuaranLuaran extends Model
{
    use HasFactory;

    protected $table = 'luaran_luaran';
    protected $fillable = ['nama', 'status'];

    static function getActiveLuaran()
    {
        return LuaranLuaran::where('status', 1)->get();
    }

    static function getLuaran()
    {
        return LuaranLuaran::all();
    }
}
