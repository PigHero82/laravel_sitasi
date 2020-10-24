<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanRab extends Model
{
    use HasFactory;

    protected $table = 'usulan_rab';
    protected $fillable = ['usulan_id', 'rab_jenis_id', 'penggunaan', 'nama', 'item1', 'satuan1', 'item2', 'satuan2', 'item3', 'satuan3', 'harga'];

    static function destroyRab($id)
    {
        UsulanRab::findOrFail($id)->delete();
    }

    static function getRab($usulanId)
    {
        return UsulanRab::select('usulan_rab.*', 'rab_jenis.nama as nama_jenis')
                        ->selectRaw('item1 * item2 * item3 * harga as total')
                        ->join('rab_jenis', 'usulan_rab.rab_jenis_id', 'rab_jenis.id')
                        ->where('usulan_rab.usulan_id', $usulanId)
                        ->get();
    }

    static function storeRab($request)
    {
        $request->validate([
            'usulan_id'     => 'numeric|required',
            'rab_jenis_id'  => 'numeric|required',
            'penggunaan'    => 'required',
            'nama'          => 'required',
            'penggunaan'    => 'required',
            'item1'         => 'numeric|required',
            'satuan1'       => 'required',
            'harga'         => 'numeric|required',
        ]);

        $item2 = ($request->item2 == NULL) ? 1 : $request->item2 ;
        $item3 = ($request->item3 == NULL) ? 1 : $request->item3 ;

        UsulanRab::create([
            'usulan_id'     => $request->usulan_id,
            'rab_jenis_id'  => $request->rab_jenis_id,
            'penggunaan'    => $request->penggunaan,
            'nama'          => $request->nama,
            'item1'         => $request->item1,
            'satuan1'       => $request->satuan1,
            'item2'         => $item2,
            'satuan2'       => $request->satuan2,
            'item3'         => $item3,
            'satuan3'       => $request->satuan3,
            'harga'         => $request->harga,
        ]);
    }
}
