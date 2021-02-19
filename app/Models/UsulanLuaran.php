<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanLuaran extends Model
{
    use HasFactory;

    protected $table = 'usulan_luaran';
    protected $fillable = ['usulan_id', 'tahun', 'luaran_luaran_id', 'luaran_target_id', 'jumlah', 'keterangan'];

    static function destroyLuaran($id)
    {
        UsulanLuaran::whereId($id)->delete();
    }

    static function firstLuaran($id)
    {
        return UsulanLuaran::select('usulan_luaran.*', 'luaran_luaran.nama as nama_luaran', 'luaran_target.nama as nama_target')
                            ->join('luaran_luaran', 'usulan_luaran.luaran_luaran_id', 'luaran_luaran.id')
                            ->join('luaran_target', 'usulan_luaran.luaran_target_id', 'luaran_target.id')
                            ->where('usulan_luaran.id', $id)
                            ->first();
    }

    static function getLuaran($usulanId)
    {
        return UsulanLuaran::select('usulan_luaran.*', 'luaran_luaran.nama as nama_luaran', 'luaran_target.nama as nama_target')
                            ->join('luaran_luaran', 'usulan_luaran.luaran_luaran_id', 'luaran_luaran.id')
                            ->join('luaran_target', 'usulan_luaran.luaran_target_id', 'luaran_target.id')
                            ->where('usulan_luaran.usulan_id', $usulanId)
                            ->get();
    }

    static function storeLuaran($request)
    {
        UsulanLuaran::create([
            'usulan_id'             => $request->usulan_id,
            'tahun'                 => $request->tahun,
            'luaran_luaran_id'      => $request->luaran_luaran_id,
            'luaran_target_id'      => $request->luaran_target_id,
            'jumlah'                => $request->jumlah,
            'keterangan'            => $request->keterangan
        ]);
    }

    static function updateLuaranRevisi($request, $usulanId){
        
        foreach ($request->item as $key => $value) {
            
            UsulanLuaran::create([
            'usulan_id'             => $usulanId,
            'tahun'                 => $value['tahun'],
            'luaran_luaran_id'      => $value['luaran_luaran_id'],
            'luaran_target_id'      => $value['luaran_target_id'],
            'jumlah'                => $value['jumlah'],
            'keterangan'            => $value['keterangan']
        ]);       
        }
    }

    static function updateLuaran($request, $id)
    {
        UsulanLuaran::whereId($id)->update([
            'tahun'                 => $request->tahun,
            'luaran_luaran_id'      => $request->luaran_luaran_id,
            'luaran_target_id'      => $request->luaran_target_id,
            'jumlah'                => $request->jumlah,
            'keterangan'            => $request->keterangan
        ]);
    }
}
