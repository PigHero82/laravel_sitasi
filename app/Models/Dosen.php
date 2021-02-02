<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $fillable = ['nidn', 'nama', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'ktp', 'telepon', 'hp', 'email', 'web', 'jabatan_id', 'prodi_id', 'sinta_id', 'google_scholar_id', 'status'];

    static function firstDosen($id)
    {
        return Dosen::join('users', 'users.nidn', 'dosen.nidn')
                    ->firstWhere('users.id', $id);
    }

    static function firstDosenByNidn($nidn)
    {
        return Dosen::firstWhere('nidn', $nidn);
    }

    static function getDosenNIDNNama()
    {
        return Dosen::select('dosen.id', 'dosen.nidn', 'dosen.nama', 'users.profile_photo_path', 'jabatan.nama as jabatan')
                    ->join('users', 'users.nidn', 'dosen.nidn')
                    ->join('jabatan', 'jabatan.id', 'dosen.jabatan_id')
                    ->get();
    }

    static function getDosenReviewer()
    {
        return Dosen::select('dosen.id', 'dosen.nidn', 'dosen.nama', 'roles.name as role')
                    ->join('users', 'users.nidn', 'dosen.nidn')
                    ->join('list_roles', 'list_roles.user_id', 'users.id')
                    ->join('roles', 'roles.id', 'list_roles.role_id')
                    ->where('roles.name', 'reviewer')
                    ->get();
    }
    
    static function firstDosenDetail($id)
    {
        return Dosen::select('dosen.*', 'jabatan.nama as jabatan_fungsional_nama')
                    ->join('jabatan', 'dosen.jabatan_id', 'jabatan.id')
                    ->where('dosen.id', $id)
                    ->first();
    }

    static function updateDosen($request, $id)
    {
        Dosen::whereId($id)->update([
            'nidn'              => $request->nidn,
            'nama'              => $request->nama,
            'alamat'            => $request->alamat,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'ktp'               => $request->ktp,
            'telepon'           => $request->telepon,
            'hp'                => $request->hp,
            'email'             => $request->email,
            'web'               => $request->web,
            'jabatan_id'        => $request->jabatan_id,
            'prodi_id'          => $request->prodi_id,
            'sinta_id'          => $request->sinta_id,
            'google_scholar_id' => $request->google_scholar_id,
            'status'            => $request->status
        ]);
    }
}
