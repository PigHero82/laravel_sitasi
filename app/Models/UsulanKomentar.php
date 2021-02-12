<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanKomentar extends Model
{
    use HasFactory;

    protected $table = 'usulan_komentar';
    protected $fillable = ['usulan_id', 'penilaian_tahap_id', 'komentar'];

    static function getKomentar($usulanId)
    {
        return UsulanKomentar::select('usulan_komentar.penilaian_tahap_id', 'penilaian_tahap.nama as tahap', 'usulan_komentar.komentar')
                                ->join('penilaian_tahap', 'usulan_komentar.penilaian_tahap_id', 'penilaian_tahap.id')
                                ->where('usulan_komentar.usulan_id', $usulanId)
                                ->get();
    }

    static function storeKomentar($request, $usulanId)
    {
        UsulanKomentar::updateOrCreate([
            'usulan_id'             => $usulanId,
            'penilaian_tahap_id'    => $request->penilaian_tahap_id
        ], [
            'usulan_id'             => $usulanId,
            'penilaian_tahap_id'    => $request->penilaian_tahap_id,
            'komentar'              => $request->komentar
        ]);
    }
}
