<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    protected $fillable = ['nama', 'kepala', 'status'];

    static function getProdi()
    {
        return Prodi::join('dosen', 'prodi.kepala', 'dosen.id')
                    ->select('dosen.nama as nama', 'prodi.nama as prodi', 'prodi.id')
                    ->get();
    }

    static function firstProdi($id)
    {
        return Prodi::select('prodi.id', 'prodi.nama', 'prodi.status', 'dosen.nama as dosen')
                    ->join('dosen', 'prodi.kepala', 'dosen.id')
                    ->where('prodi.id', $id)
                    ->first();
    }
}
