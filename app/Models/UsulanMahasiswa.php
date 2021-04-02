<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'usulan_mahasiswa';
    protected $fillable = ['usulan_id', 'nim', 'nama', 'status'];

    static function destroyMahasiswa($id)
    {
        UsulanMahasiswa::whereId($id)->delete();
    }

    static function firstMahasiswa($usulanId, $nim)
    {
        $data = UsulanMahasiswa::where('usulan_id', $usulanId)
                                ->where('nim', $nim)
                                ->first();

        if ($data) {
            return $data;
        }
    }

    static function getMahasiswa($id)
    {
        return UsulanMahasiswa::where('usulan_id', $id)->get();
    }

    static function storeMahasiswa($request)
    {
        UsulanMahasiswa::create([
            'usulan_id' => $request->usulan_id,
            'nim'       => $request->nim,
            'nama'      => $request->nama,
            'status'    => 1
        ]);
    }
}
