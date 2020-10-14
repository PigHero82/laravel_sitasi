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

    static function getDosenNIDNNama()
    {
        return Dosen::select('dosen.id', 'dosen.nidn', 'dosen.nama', 'users.profile_photo_path')
                    ->join('users', 'users.nidn', 'dosen.nidn')
                    ->get();
    }
    
    static function firstDosenDetail($id)
    {
        return Dosen::select('dosen.*', 'jabatan.nama as jabatan_fungsional_nama')
                    ->join('jabatan', 'dosen.jabatan_id', 'jabatan.id')
                    ->where('dosen.id', $id)
                    ->first();
    }
}
