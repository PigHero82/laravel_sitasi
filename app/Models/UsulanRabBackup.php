<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanRabBackup extends Model
{
    use HasFactory;

    protected $table = 'usulan_rab_backups';
    protected $fillable = ['usulan_id', 'rab_jenis_id', 'penggunaan', 'nama', 'item1', 'satuan1', 'item2', 'satuan2', 'item3', 'satuan3', 'harga', 'review'];

    static function latestRab($usulanId)
    {
        return UsulanRabBackup::select('usulan_rab_backups.*', 'rab_jenis.nama as nama_jenis')
                                ->selectRaw('(item1 * item2 * item3 * harga) as total')
                                ->join('rab_jenis', 'usulan_rab_backups.rab_jenis_id', 'rab_jenis.id')
                                ->where('usulan_rab_backups.usulan_id', $usulanId)
                                ->latest()
                                ->first();
    }

    static function storeRab($request, $revisi)
    {
        UsulanRabBackup::create([
            'usulan_id'     => $request->usulan_id,
            'rab_jenis_id'  => $request->rab_jenis_id,
            'penggunaan'    => $request->penggunaan,
            'nama'          => $request->nama,
            'item1'         => $request->item1,
            'satuan1'       => $request->satuan1,
            'item2'         => $request->item2,
            'satuan2'       => $request->satuan2,
            'item3'         => $request->item3,
            'satuan3'       => $request->satuan3,
            'harga'         => $request->harga,
            'review'        => $revisi,
        ]);
    }
}
