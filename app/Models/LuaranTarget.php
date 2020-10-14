<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuaranTarget extends Model
{
    use HasFactory;

    protected $table = 'luaran_target';
    protected $fillable = ['nama', 'status'];
}
