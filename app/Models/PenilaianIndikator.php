<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianIndikator extends Model
{
    use HasFactory;

    protected $table = 'penilaian_indikator';
    protected $fillable = ['penilaian_tahap_id', 'nama', 'deskripsi', 'jenis', 'bobot', 'status'];

    static function firstIndikator($id)
    {
        return PenilaianIndikator::whereId($id)->first();
    }

    static function getIndikator($jenis)
    {
        return PenilaianIndikator::where('jenis', $jenis)->get();
    }

    static function getIndikatorByTahap($penilaianTahapId)
    {
        return PenilaianIndikator::where('penilaian_tahap_id', $penilaianTahapId)
                                    ->orderBy('jenis')
                                    ->get();
    }

    static function storeIndikator($request)
    {
        PenilaianIndikator::create([
            'penilaian_tahap_id'    => $request->penilaian_tahap_id,
            'nama'                  => $request->nama,
            'deskripsi'             => $request->deskripsi,
            'jenis'                 => $request->jenis,
            'status'                => $request->status
        ]);
    }

    static function updateIndikator($request, $id)
    {
        PenilaianIndikator::whereId($id)->update([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'jenis'     => $request->jenis,
            'status'    => $request->status
        ]);
    }
}
