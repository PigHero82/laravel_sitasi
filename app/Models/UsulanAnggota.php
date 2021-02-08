<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanAnggota extends Model
{
    use HasFactory;

    protected $table = 'usulan_anggota';
    protected $fillable = ['usulan_id', 'dosen_id', 'peran_id', 'status'];

    static function destroyAnggota($id)
    {
        UsulanAnggota::whereId($id)->delete();
    }

    static function firstAnggota($usulanId, $dosenId)
    {
        $data = UsulanAnggota::where('usulan_id', $usulanId)
                                ->where('dosen_id', $dosenId)
                                ->first();
                                
        if ($data) {
            return $data;
        }
    }

    static function firstPersonal($id)
    {
        $usulan = UsulanAnggota::findOrFail($id);

        if ($usulan) {
            $data = UsulanAnggota::select('usulan_anggota.id', 'usulan_anggota.usulan_id', 'usulan_anggota.dosen_id', 'dosen.nidn', 'dosen.nama as dosen_nama', 'dosen.prodi_id', 'dosen.jabatan_id', 'jabatan.nama as jabatan_nama', 'usulan_anggota.peran_id', 'peran.nama as peran_nama', 'usulan_anggota.status')
                                    ->selectRaw('CASE WHEN usulan_anggota.status="0" THEN "Belum disetujui" WHEN usulan_anggota.status="1" THEN "Disetujui" WHEN usulan_anggota.status="2" THEN "Ditolak" ELSE "Error" END as status_nama')
                                    ->join('dosen', 'usulan_anggota.dosen_id', 'dosen.id')
                                    ->join('jabatan', 'dosen.jabatan_id', 'jabatan.id')
                                    ->join('peran', 'usulan_anggota.peran_id', 'peran.id')
                                    ->where('usulan_anggota.id', $id)->first();
            $data['penelitian'] = Usulan::firstUsulan($data->usulan_id);

            return $data;
        }

        return $usulan;
    }

    static function getAnggota($usulanId)
    {
        return UsulanAnggota::select('usulan_anggota.id', 'usulan_anggota.dosen_id', 'dosen.nidn', 'dosen.nama as dosen_nama', 'dosen.prodi_id', 'dosen.jabatan_id', 'jabatan.nama as jabatan_nama', 'usulan_anggota.peran_id', 'peran.nama as peran_nama', 'usulan_anggota.status')
                            ->selectRaw('CASE WHEN usulan_anggota.status="0" THEN "Belum disetujui" WHEN usulan_anggota.status="1" THEN "Disetujui" WHEN usulan_anggota.status="2" THEN "Ditolak" ELSE "Error" END as status_nama')
                            ->join('dosen', 'usulan_anggota.dosen_id', 'dosen.id')
                            ->join('jabatan', 'dosen.jabatan_id', 'jabatan.id')
                            ->join('peran', 'usulan_anggota.peran_id', 'peran.id')
                            ->where('usulan_anggota.usulan_id', $usulanId)->get();
    }

    static function getConfirmedAnggota($usulanId)
    {
        return UsulanAnggota::select('usulan_anggota.id', 'usulan_anggota.dosen_id', 'dosen.nidn', 'dosen.nama as dosen_nama', 'dosen.prodi_id', 'dosen.jabatan_id', 'jabatan.nama as jabatan_nama', 'usulan_anggota.peran_id', 'peran.nama as peran_nama', 'usulan_anggota.status')
                            ->selectRaw('CASE WHEN usulan_anggota.status="0" THEN "Belum disetujui" WHEN usulan_anggota.status="1" THEN "Disetujui" WHEN usulan_anggota.status="2" THEN "Ditolak" ELSE "Error" END as status_nama')
                            ->join('dosen', 'usulan_anggota.dosen_id', 'dosen.id')
                            ->join('jabatan', 'dosen.jabatan_id', 'jabatan.id')
                            ->join('peran', 'usulan_anggota.peran_id', 'peran.id')
                            ->where('usulan_anggota.usulan_id', $usulanId)
                            ->where('usulan_anggota.status', 1)
                            ->get();
    }

    static function getConfirmedPersonal($dosenId)
    {
        $usulan = UsulanAnggota::select('usulan_anggota.id','skema_usulan.status')
                                ->join('usulan','usulan.id','usulan_anggota.usulan_id')
                                ->join('skema_usulan','skema_usulan.id','usulan.skema_usulan_id')
                                ->where('skema_usulan.status',1)
                                ->where('usulan_anggota.dosen_id', $dosenId)
                                ->where('usulan_anggota.status', '>', 0)
                                ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = UsulanAnggota::select('usulan_anggota.id', 'usulan_anggota.usulan_id', 'usulan_anggota.dosen_id', 'dosen.nidn', 'dosen.nama as dosen_nama', 'dosen.prodi_id', 'dosen.jabatan_id', 'jabatan.nama as jabatan_nama', 'usulan_anggota.peran_id', 'peran.nama as peran_nama', 'usulan_anggota.status')
                                        ->selectRaw('CASE WHEN usulan_anggota.status="0" THEN "Belum disetujui" WHEN usulan_anggota.status="1" THEN "Disetujui" WHEN usulan_anggota.status="2" THEN "Ditolak" ELSE "Error" END as status_nama')
                                        ->join('dosen', 'usulan_anggota.dosen_id', 'dosen.id')
                                        ->join('jabatan', 'dosen.jabatan_id', 'jabatan.id')
                                        ->join('peran', 'usulan_anggota.peran_id', 'peran.id')
                                        ->where('usulan_anggota.id', $value->id)->first();
                $data[$key]['penelitian'] = Usulan::firstUsulan($data[$key]['usulan_id']);
            }

            return $data;
        }

        return $usulan;
    }

    static function getUnconfirmedPersonal($dosenId)
    {
        $usulan = UsulanAnggota::select('usulan_anggota.id','skema_usulan.status')
                                ->join('usulan','usulan.id','usulan_anggota.usulan_id')
                                ->join('skema_usulan','skema_usulan.id','usulan.skema_usulan_id')
                                ->where('skema_usulan.status',1)
                                ->where('usulan_anggota.dosen_id', $dosenId)
                                ->where('usulan_anggota.status', 0)
                                ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = UsulanAnggota::select('usulan_anggota.id', 'usulan_anggota.usulan_id', 'usulan_anggota.dosen_id', 'dosen.nidn', 'dosen.nama as dosen_nama', 'dosen.prodi_id', 'dosen.jabatan_id', 'jabatan.nama as jabatan_nama', 'usulan_anggota.peran_id', 'peran.nama as peran_nama', 'usulan_anggota.status')
                                        ->selectRaw('CASE WHEN usulan_anggota.status="0" THEN "Belum disetujui" WHEN usulan_anggota.status="1" THEN "Disetujui" WHEN usulan_anggota.status="2" THEN "Ditolak" ELSE "Error" END as status_nama')
                                        ->join('dosen', 'usulan_anggota.dosen_id', 'dosen.id')
                                        ->join('jabatan', 'dosen.jabatan_id', 'jabatan.id')
                                        ->join('peran', 'usulan_anggota.peran_id', 'peran.id')
                                        ->where('usulan_anggota.id', $value->id)->first();
                $data[$key]['penelitian'] = Usulan::firstUsulan($data[$key]['usulan_id']);
            }

            return $data;
        }

        return $usulan;
    }

    static function storeAnggota($request)
    {
        $request->validate([
            'usulan_id' => 'numeric|required',
            'dosen_id'  => 'numeric|required',
            'peran_id'  => 'numeric|required'
        ]);

        UsulanAnggota::create([
            'usulan_id' => $request->usulan_id,
            'dosen_id'  => $request->dosen_id,
            'peran_id'  => $request->peran_id
        ]);
    }

    static function updatePersonal($status, $id)
    {
        UsulanAnggota::whereId($id)->update(['status' => $status]);
    }
}
