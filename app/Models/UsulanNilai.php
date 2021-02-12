<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanNilai extends Model
{
    use HasFactory;

    protected $table = 'usulan_nilai';
    protected $fillable = ['usulan_id', 'penilaian_indikator_id', 'nilai'];

    static function getNilai($usulanId)
    {
        return UsulanNilai::select('penilaian_indikator.penilaian_tahap_id', 'penilaian_tahap.nama as tahap', 'usulan_nilai.penilaian_indikator_id', 'penilaian_indikator.nama', 'usulan_nilai.nilai')
                            ->join('penilaian_indikator', 'usulan_nilai.penilaian_indikator_id', 'penilaian_indikator.id')
                            ->join('penilaian_tahap', 'penilaian_indikator.penilaian_tahap_id', 'penilaian_tahap.id')
                            ->where('usulan_nilai.usulan_id', $usulanId)
                            ->get();
    }

    static function storeNilai($request, $usulanId)
    {
        foreach ($request->nilai as $key => $nilai) {
            UsulanNilai::updateOrCreate([
                'usulan_id'                 => $usulanId,
                'penilaian_indikator_id'    => $key
            ], [
                'usulan_id'                 => $usulanId,
                'penilaian_indikator_id'    => $key,
                'nilai'                     => $nilai
            ]);
        }
    }
}
