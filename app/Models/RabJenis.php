<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RabJenis extends Model
{
    use HasFactory;

    protected $table = 'rab_jenis';
    protected $fillable = ['nama', 'deskripsi', 'status'];

    static function getJenis()
    {
        return RabJenis::where('status', 1)
                        ->get();
    }
}
