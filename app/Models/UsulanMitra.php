<?php

namespace App\Models;

use App\Models\UsulanBerkas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanMitra extends Model
{
    use HasFactory;

    protected $table = 'usulan_mitra';
    protected $fillable = ['usulan_id', 'nama', 'pimpinan', 'mitra_jenis_id', 'institusi', 'alamat', 'kecamatan_id', 'kabkota_id', 'provinsi_id', 'tlp', 'hp', 'fax', 'email', 'dana'];

    static function destroyMitra($id)
    {
        UsulanMitra::findOrFail($id)->delete();
    }

    static function firstMitra($id)
    {
        $mitra = UsulanMitra::whereId($id)->first();

        if (isset($mitra)) {
            $data = UsulanMitra::select('*', 'provinsi.nama_provinsi', 'kabkota.nama_kabkota', 'kecamatan.nama_kecamatan')
                                ->join('provinsi', 'usulan_mitra.provinsi_id', 'provinsi.id')
                                ->join('kabkota', 'usulan_mitra.kabkota_id', 'kabkota.id')
                                ->join('kecamatan', 'usulan_mitra.kecamatan_id', 'kecamatan.id')
                                ->firstWhere('usulan_mitra.id', $id);
            $data['berkas'] = UsulanBerkas::firstBerkasPernyataanMitra($id, $data->usulan_id);
    
            return $data;
        }

        return $mitra;
    }

    static function getMitra($usulanId)
    {
        return UsulanMitra::where('usulan_id', $usulanId)->get();
    }

    static function storeMitra($request)
    {
        $request->validate([
            'usulan_id'         => 'numeric|required',
            'nama'              => 'required',
            'pimpinan'          => 'required',
            'mitra_jenis_id'    => 'numeric|required',
            'institusi'         => 'required',
            'provinsi_id'       => 'numeric|required',
            'kabkota_id'        => 'numeric|required',
            'kecamatan_id'      => 'numeric|required',
            'alamat'            => 'required',
            'tlp'               => 'numeric|required',
            'hp'                => 'numeric|required',
            'fax'               => 'numeric|required',
            'email'             => 'required',
            'surat_path'        => 'required'
        ]);

        $data = UsulanMitra::create([
            'usulan_id'         => $request->usulan_id,
            'nama'              => $request->nama,
            'pimpinan'          => $request->pimpinan,
            'mitra_jenis_id'    => $request->mitra_jenis_id,
            'institusi'         => $request->institusi,
            'provinsi_id'       => $request->provinsi_id,
            'kabkota_id'        => $request->kabkota_id,
            'kecamatan_id'      => $request->kecamatan_id,
            'alamat'            => $request->alamat,
            'tlp'               => $request->tlp,
            'hp'                => $request->hp,
            'fax'               => $request->fax,
            'email'             => $request->email,
            'dana'              => $request->dana,
        ]);

        UsulanBerkas::storeBerkasWithId($request, 5, $data->id);
    }
}
