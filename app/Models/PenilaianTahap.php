<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianTahap extends Model
{
    use HasFactory;

    protected $table = 'penilaian_tahap';
    protected $fillable = ['nama', 'deskripsi', 'status'];

    static function firstPenilaian($id)
    {
        $penilaian = PenilaianTahap::whereId($id)->first();

        if (isset($penilaian)) {   
            $data = [];     
            $data = PenilaianTahap::whereId($id)->first();
            $data['indikator'] = PenilaianIndikator::getIndikatorByTahap($id);

            return $data;
        }

        return $penilaian;
    }

    static function getPenilaian()
    {
        return PenilaianTahap::all();
    }

    static function storePenilaian($request)
    {
        PenilaianTahap::create([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status'    => $request->status
        ]);
    }

    static function updatePenilaian($request, $id)
    {
        PenilaianTahap::whereId($id)->update([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status'    => $request->status
        ]);
    }
}
