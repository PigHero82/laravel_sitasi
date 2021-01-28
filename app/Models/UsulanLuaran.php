<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanLuaran extends Model
{
    use HasFactory;

    protected $table = 'usulan_luaran';
    protected $fillable = ['usulan_id', 'tahun', 'luaran_luaran_id', 'luaran_target_id', 'jumlah', 'keterangan'];

    static function firstLuaran($usulanId)
    {
        return UsulanLuaran::firstWhere('usulan_id', $usulanId);
    }

    static function updateLuaran($request)
    {
        $request->validate([
            'usulan_id'             => 'numeric|required',
            'tahun'                 => 'numeric|required',
            'luaran_luaran_id'      => 'numeric|required',
            'luaran_target_id'      => 'numeric|required',
            'jumlah'                => 'numeric|required'
        ]);
        
        UsulanLuaran::updateOrCreate(['usulan_id' => $request->usulan_id], [
            'usulan_id'             => $request->usulan_id,
            'tahun'                 => $request->tahun,
            'luaran_luaran_id'      => $request->luaran_luaran_id,
            'luaran_target_id'      => $request->luaran_target_id,
            'jumlah'                => $request->jumlah,
            'keterangan'            => $request->keterangan
        ]);
    }
}
