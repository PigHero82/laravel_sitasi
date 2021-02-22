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

    static function firstRab($id){
        return UsulanRab::select('usulan_rab.*', 'rab_jenis.nama as nama_jenis')
                        ->join('rab_jenis', 'usulan_rab.rab_jenis_id', 'rab_jenis.id')
                        ->where('usulan_rab.id', $id)
                        ->first();
    }

    static function getRab($usulanId)
    {
        return UsulanRab::select('usulan_rab.*', 'rab_jenis.nama as nama_jenis')
                        ->selectRaw('(item1 * item2 * item3 * harga) as total')
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

    static function updateRab($request, $usulanId)
    {
        foreach ($request->item as $key => $rab) {
            //$item1 = explode(' ', $rab['item1']);
            $arritem1 = str_split($rab['item1']);
            $item = [];
            $item['angka'][0] = '';
            $item['satuan'][0] = '';
            foreach ($arritem1 as $key => $value) {
                if(is_numeric($value)){
                    $item['angka'][0] .= $value;
                }elseif($value != ' ') {
                    $item['satuan'][0] .= $value;
                }
            }

            if($rab['item2'] != NULL){
                $arritem1 = str_split($rab['item2']);
                $item['angka'][1] = '';
                $item['satuan'][1] = '';
                foreach ($arritem1 as $key => $value) {
                    if(is_numeric($value)){
                        $item['angka'][1] .= $value;
                    }elseif($value != ' ') {
                        $item['satuan'][1] .= $value;
                    }
                }
            }else{
                $item['angka'][1] = 1;
                $item['satuan'][1] = NULL;
            }

            if($rab['item3'] != NULL){
                $arritem1 = str_split($rab['item3']);
                $item['angka'][2] = '';
                $item['satuan'][2] = '';
                foreach ($arritem1 as $key => $value) {
                    if(is_numeric($value)){
                        $item['angka'][2] .= $value;
                    }elseif($value != ' ') {
                        $item['satuan'][2] .= $value;
                    }
                }
            }else{
                $item['angka'][2] = 1;
                $item['satuan'][2] = NULL;    
            }

            /*            
            $item2 = ($rab['item2'] != NULL) ? explode(' ', $rab['item2']) : [1, NULL] ;
            $item3 = ($rab['item3'] != NULL) ? explode(' ', $rab['item3']) : [1, NULL] ;

            UsulanRab::create([
                'usulan_id'     => $usulanId,
                'rab_jenis_id'  => $rab['rab_jenis_id'],
                'penggunaan'    => $rab['penggunaan'],
                'nama'          => $rab['nama'],
                'item1'         => $item1[0],
                'satuan1'       => $item1[1],
                'item2'         => $item2[0],
                'satuan2'       => $item2[1],
                'item3'         => $item3[0],
                'satuan3'       => $item3[1],
                'harga'         => $rab['harga'],
            ]);*/
          
            UsulanRab::create([
                'usulan_id'     => $usulanId,
                'rab_jenis_id'  => $rab['rab_jenis_id'],
                'penggunaan'    => $rab['penggunaan'],
                'nama'          => $rab['nama'],
                'item1'         => $item['angka'][0],
                'satuan1'       => $item['satuan'][0],
                'item2'         => $item['angka'][1],
                'satuan2'       => $item['satuan'][1],
                'item3'         => $item['angka'][2],
                'satuan3'       => $item['satuan'][2],
                'harga'         => $rab['harga'],
            ]);
        }
    }
}
