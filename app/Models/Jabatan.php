<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';
    protected $fillable = ['nama', 'level', 'status'];

    static function getJabatan()
    {
        return Jabatan::orderBy('level')->get();
    }

    static function miniGetJabatan()
    {
        return Jabatan::select('id', 'nama', 'level')
                        ->where('status', 1)
                        ->orderBy('level')
                        ->get();
    }
    
    static function storeJabatan($request)
    {
        Jabatan::create([
            'nama'      => $request->nama,
            'level'     => $request->level,
            'status'    => $request->status
        ]);
    }
    
    static function updateJabatan($request)
    {
        Jabatan::whereId($request->id)->update([
            'nama'      => $request->nama,
            'level'     => $request->level,
            'status'    => $request->status
        ]);
    }
}
