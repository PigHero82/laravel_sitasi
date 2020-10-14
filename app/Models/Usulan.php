<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;

    protected $table = 'usulan';
    protected $fillable = ['dosen_id', 'skema_usulan_id', 'jenis', 'judul', 'ringkasan', 'latar_belakang', 'tinjauan_pustaka', 'metode', 'daftar_pustaka', 'rumpun_ilmu_id', 'program', 'kategori_sbk', 'waktu', 'satuan_waktu_id', 'bidang_unggulan_pt', 'topik_unggulan_pt'];

    static function firstUsulan($id)
    {
        return Usulan::findOrFail($id);
    }

    static function getUsulan()
    {
        return Usulan::all();
    }

    static function getUsulanPenelitian()
    {
        return Usulan::where('jenis', 1)->get();
    }

    static function getUsulanPengabdian()
    {
        return Usulan::where('jenis', 2)->get();
    }

    static function getUsulanPenelitianByNIDN($id)
    {
        return Usulan::where('jenis', 1)
                        ->where('dosen_id', $id)
                        ->get();
    }

    static function getUsulanPengabdianByNIDN($id)
    {
        return Usulan::where('jenis', 2)
                        ->where('dosen_id', $id)
                        ->get();
    }
}
