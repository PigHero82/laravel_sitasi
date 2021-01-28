<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuaranTarget extends Model
{
    use HasFactory;

    protected $table = 'luaran_target';
    protected $fillable = ['nama', 'status'];

    static function getActiveTarget()
    {
        return LuaranTarget::where('status', 1)->get();
    }

    static function getTarget()
    {
        return LuaranTarget::all();
    }

    static function getTargetByLuaran($id)
    {
        if ($id >= 1 && $id <= 3) {
            return LuaranTarget::whereBetween('id', [1, 5])
                                ->get();
        } elseif ($id >= 4 && $id <= 20) {
            return LuaranTarget::where('id', 1)
                                ->orWhereBetween('id', [6, 7])
                                ->get();
        } elseif ($id == 21) {
            return LuaranTarget::where('id', 1)
                                ->orWhere('id', 6)
                                ->orWhere('id', 8)
                                ->get();
        } elseif ($id == 22) {
            return LuaranTarget::where('id', 1)
                                ->orWhereBetween('id', [9, 10])
                                ->get();
        } elseif ($id == 23) {
            return LuaranTarget::where('id', 1)
                                ->orWhereBetween('id', [11, 12])
                                ->get();
        }
    }
}
