<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanKegiatan extends Model
{
    use HasFactory;

    protected $table = 'usulan_kegiatan';
    protected $fillable = ['usulan_id', 'nama', 'tanggal_mulai', 'tanggal_selesai'];

    static function destroyKegiatan($id)
    {
        UsulanKegiatan::findOrFail($id)->delete();
    }

    static function getKegiatan($usulanId)
    {
        return UsulanKegiatan::where('usulan_id', $usulanId)
                                ->orderBy('tanggal_mulai')
                                ->get();
    }

    static function storeKegiatan($request)
    {
        $request->validate([
            'usulan_id'         => 'numeric|required',
            'nama'              => 'required',
            'tanggal_mulai'     => 'date|required',
            'tanggal_selesai'   => 'date|required'
        ]);

        UsulanKegiatan::create([
            'usulan_id'         => $request->usulan_id,
            'nama'              => $request->nama,
            'tanggal_mulai'     => $request->tanggal_mulai,
            'tanggal_selesai'   => $request->tanggal_selesai
        ]);
    }
}
