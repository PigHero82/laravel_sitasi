<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanLuaranBackup extends Model
{
    use HasFactory;

    protected $table = 'usulan_luaran_backups';
    protected $fillable = ['usulan_id', 'tahun', 'luaran_luaran_id', 'luaran_target_id', 'jumlah', 'keterangan', 'review'];

    static function latestLuaran($usulanId)
    {
        return UsulanLuaranBackup::where('usulan_id', $usulanId)
                                ->latest()
                                ->first();
    }

    static function storeLuaran($request, $revisi)
    {

        UsulanLuaranBackup::create([
            'usulan_id'         => $request->usulan_id,
            'tahun'             => $request->tahun,
            'luaran_luaran_id'  => $request->luaran_luaran_id,
            'luaran_target_id'  => $request->luaran_target_id,
            'jumlah'            => $request->jumlah,
            'keterangan'        => $request->keterangan,
            'review'            => $revisi
        ]);
    }
}
