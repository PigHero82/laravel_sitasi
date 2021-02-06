<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanAnggota extends Model
{
    use HasFactory;

    protected $table = 'usulan_anggota';
    protected $fillable = ['usulan_id', 'dosen_id', 'peran_id', 'status'];

    static function destroyAnggota($id)
    {
        UsulanAnggota::whereId($id)->delete();
    }

    static function firstAnggota($usulanId, $dosenId)
    {
        $data = UsulanAnggota::where('usulan_id', $usulanId)
                                ->where('dosen_id', $dosenId)
                                ->first();
                                
        if ($data) {
            return $data;
        }
    }

    static function getAnggota($usulanId)
    {
        return UsulanAnggota::select('usulan_anggota.id', 'usulan_anggota.dosen_id', 'dosen.nidn', 'dosen.nama as dosen_nama', 'dosen.prodi_id', 'dosen.jabatan_id', 'jabatan.nama as jabatan_nama', 'usulan_anggota.peran_id', 'peran.nama as peran_nama', 'usulan_anggota.status')
                            ->selectRaw('CASE WHEN usulan_anggota.status="0" THEN "Belum disetujui" WHEN usulan_anggota.status="1" THEN "Disetujui" WHEN usulan_anggota.status="2" THEN "Ditolak" ELSE "Error" END as status_nama')
                            ->join('dosen', 'usulan_anggota.dosen_id', 'dosen.id')
                            ->join('jabatan', 'dosen.jabatan_id', 'jabatan.id')
                            ->join('peran', 'usulan_anggota.peran_id', 'peran.id')
                            ->where('usulan_anggota.usulan_id', $usulanId)->get();
    }

    static function storeAnggota($request)
    {
        $request->validate([
            'usulan_id' => 'numeric|required',
            'dosen_id'  => 'numeric|required',
            'peran_id'  => 'numeric|required'
        ]);

        UsulanAnggota::create([
            'usulan_id' => $request->usulan_id,
            'dosen_id'  => $request->dosen_id,
            'peran_id'  => $request->peran_id
        ]);
    }
}
