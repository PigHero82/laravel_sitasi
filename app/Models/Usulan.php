<?php

namespace App\Models;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;

    protected $table = 'usulan';
    protected $fillable = ['dosen_id', 'skema_usulan_id', 'tahun_pelaksanaan', 'jenis', 'judul', 'ringkasan', 'kata_kunci', 'latar_belakang', 'tinjauan_pustaka', 'metode', 'daftar_pustaka', 'rumpun_ilmu_1', 'rumpun_ilmu_2', 'rumpun_ilmu_3', 'program', 'kategori_sbk', 'waktu', 'satuan_waktu_id', 'bidang_unggulan_pt', 'topik_unggulan_pt'];

    static function firstUsulan($id)
    {
        return Usulan::findOrFail($id);
    }

    static function firstUsulanByDosenIdSkemaId($dosenId, $skemaId)
    {
        return Usulan::select(DB::raw('usulan.*, skema.kode, skema_usulan.tahun_skema'))
                        ->join('skema_usulan', 'usulan.skema_usulan_id', 'skema_usulan.id')
                        ->join('skema', 'skema_usulan.skema_id', 'skema.id')
                        ->where('dosen_id', $dosenId)
                        ->where('skema_usulan_id', $skemaId)
                        ->first();
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

    static function storeUsulan($request)
    {
        $request->validate([
            'skema_usulan_id'   => 'numeric|required',
            'tahun_pelaksanaan' => 'numeric|required',
            'jenis'             => 'numeric|required'
        ]);

        Usulan::updateOrCreate([
            'dosen_id'          => Auth::user()->id,
            'skema_usulan_id'   => $request->skema_usulan_id
        ], [
            'dosen_id'          => Auth::user()->id,
            'skema_usulan_id'   => $request->skema_usulan_id,
            'tahun_pelaksanaan' => $request->tahun_pelaksanaan,
            'jenis'             => $request->jenis
        ]);
    }

    static function updateUsulan1($request, $skemaUsulanId)
    {
        $request->validate([
            'judul'                 => 'required',
            'ringkasan'             => 'required',
            'kata_kunci'            => 'required',
            'rumpun_ilmu_1'         => 'numeric|required',
            'rumpun_ilmu_2'         => 'numeric|required',
            'rumpun_ilmu_3'         => 'numeric|required',
            'program'               => 'required',
            'kategori_sbk'          => 'required',
            'waktu'                 => 'numeric|required',
            'satuan_waktu_id'       => 'numeric|required',
            'bidang_unggulan_pt'    => 'required',
            'topik_unggulan_pt'     => 'required'
        ]);

        Usulan::updateOrCreate([
            'dosen_id'              => Auth::user()->id,
            'skema_usulan_id'       => $skemaUsulanId
        ], [
            'judul'                 => $request->judul,
            'ringkasan'             => $request->ringkasan,
            'kata_kunci'            => $request->kata_kunci,
            'rumpun_ilmu_1'         => $request->rumpun_ilmu_1,
            'rumpun_ilmu_2'         => $request->rumpun_ilmu_2,
            'rumpun_ilmu_3'         => $request->rumpun_ilmu_3,
            'program'               => $request->program,
            'kategori_sbk'          => $request->kategori_sbk,
            'waktu'                 => $request->waktu,
            'satuan_waktu_id'       => $request->satuan_waktu_id,
            'bidang_unggulan_pt'    => $request->bidang_unggulan_pt,
            'topik_unggulan_pt'     => $request->topik_unggulan_pt
        ]);
    }
}
