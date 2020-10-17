<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanWaktu extends Model
{
    use HasFactory;

    protected $table = 'satuan_waktu';
    protected $fillable = ['nama', 'status'];

    static function getSatuan()
    {
        return SatuanWaktu::where('status', 1)->get();
    }
}
