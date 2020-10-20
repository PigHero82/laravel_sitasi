<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanBelanja extends Model
{
    use HasFactory;

    protected $table = 'usulan_belanja';
    protected $fillable = ['usulan_id', 'rab_jenis_id', 'uraian', 'jumlah'];

    static function getBelanja($id)
    {
        return UsulanBelanja::where('usulan_id', $id)->get();
    }
}
