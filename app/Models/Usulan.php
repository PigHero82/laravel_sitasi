<?php

namespace App\Models;

use Auth;
use DB;
use App\Models\UsulanMitra;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;

    protected $table = 'usulan';
    protected $fillable = ['dosen_id', 'skema_usulan_id', 'jenis', 'judul', 'ringkasan', 'kata_kunci', 'latar_belakang', 'tinjauan_pustaka', 'metode', 'daftar_pustaka', 'rumpun_ilmu_1', 'rumpun_ilmu_2', 'rumpun_ilmu_3', 'usulan_dana', 'nilai', 'step'];

    static function countUsulanByDosenId($id, $jenis)
    {
        return Usulan::where('jenis', $jenis)
                        ->where('dosen_id', $id)
                        ->count();
    }

    static function firstUsulan($id)
    {
        $data = Usulan::find($id);
        $data['ketua'] = Dosen::select('nama')->where('id',$data->dosen_id)->first();
        $data['anggota'] = UsulanAnggota::getAnggota($data->id);
        $data['belanja'] = UsulanBelanja::getBelanja($data->id);
        $data['kegiatan'] = UsulanKegiatan::getKegiatan($data->id);
        $data['luaran'] = UsulanLuaran::firstLuaran($data->id);
        $data['rab'] = UsulanRab::getRab($data->id);
        $data['skema_usulan'] = SkemaUsulan::firstSkema($data->skema_usulan_id);
        $data['mitra'] = UsulanMitra::firstMitra($data->id);

        return $data;
    }

    static function firstUsulanByDosenIdSkemaId($dosenId, $skemaUsulanId)
    {
        $data = Usulan::select(DB::raw('usulan.*, skema.kode, skema_usulan.tahun_skema'))
                        ->join('skema_usulan', 'usulan.skema_usulan_id', 'skema_usulan.id')
                        ->join('skema', 'skema_usulan.skema_id', 'skema.id')
                        ->where('dosen_id', $dosenId)
                        ->where('skema_usulan_id', $skemaUsulanId)
                        ->first();
        $data['skema_usulan'] = SkemaUsulan::firstSkema($data->skema_usulan_id);
        $data['anggota'] = UsulanAnggota::getAnggota($data->id);
        $data['kegiatan'] = UsulanKegiatan::getKegiatan($data->id);
        $data['luaran'] = UsulanLuaran::firstLuaran($data->id);
        $data['rab'] = UsulanRab::getRab($data->id);

        return $data;
    }

    static function getUsulan()
    {
        $usulan = Usulan::orderByDesc('created_at')->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::firstUsulan($value->id);
                $data[$key]['anggota'] = UsulanAnggota::getAnggota($value->id);
                $data[$key]['belanja'] = UsulanBelanja::getBelanja($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['luaran'] = UsulanLuaran::firstLuaran($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
                $data[$key]['mitra'] = UsulanMitra::firstMitra($value->id);
            }

            return $data;
        }

        return $usulan;
    }

    static function getUsulanPenelitian()
    {
        $data = [];
        $usulan = Usulan::where('jenis', 1)
                        ->orderByDesc('skema_usulan_id')
                        ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::firstUsulan($value->id);
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
                $data[$key]['anggota'] = UsulanAnggota::getAnggota($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['luaran'] = UsulanLuaran::firstLuaran($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
            }

            return $data;
        }

        return $usulan;
    }

    static function getLimitedUsulanPenelitian($count)
    {
        $usulan = Usulan::where('jenis', 1)
                        ->orderByDesc('skema_usulan_id')
                        ->take($count)
                        ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::firstUsulan($value->id);
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
                $data[$key]['anggota'] = UsulanAnggota::getAnggota($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['luaran'] = UsulanLuaran::firstLuaran($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
            }

            return $data;
        }

        return $usulan;
    }

    static function getUsulanPengabdian()
    {
        $data = [];
        $usulan = Usulan::where('jenis', 2)
                        ->orderByDesc('skema_usulan_id')
                        ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::firstUsulan($value->id);
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
                $data[$key]['anggota'] = UsulanAnggota::getAnggota($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['luaran'] = UsulanLuaran::firstLuaran($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
            }

            return $data;
        }

        return $usulan;
    }

    static function getLimitedUsulanPengabdian($count)
    {
        $usulan = Usulan::where('jenis', 2)
                        ->orderByDesc('skema_usulan_id')
                        ->paginate($count);

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::firstUsulan($value->id);
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
                $data[$key]['anggota'] = UsulanAnggota::getAnggota($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['luaran'] = UsulanLuaran::firstLuaran($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
            }

            return $data;
        }

        return $usulan;
    }

    static function getUsulanByDosenId($id, $jenis)
    {
        $usulan = Usulan::where('jenis', $jenis)
                        ->where('dosen_id', $id)
                        ->orderByDesc('created_at')
                        ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::firstUsulan($value->id);
                // $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
                // $data[$key]['anggota'] = UsulanAnggota::getAnggota($value->id);
                // $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                // $data[$key]['luaran'] = UsulanLuaran::firstLuaran($value->id);
                // $data[$key]['rab'] = UsulanRab::getRab($value->id);
            }

            return $data;
        }

        return $usulan;

    }

    static function getUsulanPenelitianByDosenId($id)
    {
        $usulan = Usulan::where('jenis', 1)
                        ->where('dosen_id', $id)
                        ->orderByDesc('created_at')
                        ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::firstUsulan($value->id);
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
                $data[$key]['anggota'] = UsulanAnggota::getAnggota($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['luaran'] = UsulanLuaran::firstLuaran($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
            }

            return $data;
        }

        return $usulan;
    }

    static function getUsulanPengabdianByDosenId($id)
    {
        $usulan = Usulan::where('jenis', 2)
                        ->where('dosen_id', $id)
                        ->orderByDesc('created_at')
                        ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::firstUsulan($value->id);
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
                $data[$key]['anggota'] = UsulanAnggota::getAnggota($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['luaran'] = UsulanLuaran::firstLuaran($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
            }

            return $data;
        }

        return $usulan;
    }

    static function getUsulanPerYear($jenis)
    {
        return Usulan::selectRaw('skema_usulan.tahun_pelaksanaan, count(skema_usulan.tahun_pelaksanaan) as jumlah')
                        ->leftjoin('skema_usulan', 'usulan.skema_usulan_id', 'skema_usulan.id')
                        ->where('usulan.jenis', $jenis)
                        ->groupBy('skema_usulan.tahun_pelaksanaan')
                        ->get();
    }

    static function storeUsulan($request)
    {
        $request->validate([
            'skema_usulan_id'   => 'numeric|required',
            'jenis'             => 'numeric|required'
        ]);

        Usulan::updateOrCreate([
            'dosen_id'          => Auth::user()->id,
            'skema_usulan_id'   => $request->skema_usulan_id
        ], [
            'dosen_id'          => Auth::user()->id,
            'skema_usulan_id'   => $request->skema_usulan_id,
            'jenis'             => $request->jenis
        ]);
    }

    static function updateUsulanDana($request)
    {
        $request->validate([
            'usulan_id'         => 'numeric|required',
            'usulan_dana'       => 'numeric|required'
        ]);

        Usulan::whereId($request->usulan_id)->update(['usulan_dana' => $request->usulan_dana]);
    }

    static function updateStep($step, $skemaUsulanId)
    {
        $data = Usulan::firstUsulanByDosenIdSkemaId(Auth::user()->id, $skemaUsulanId);

        if ($data->step < $step) {
            Usulan::where('dosen_id', Auth::user()->id)
                    ->where('skema_usulan_id', $skemaUsulanId)
                    ->update(['step' => $step]);
        }
    }

    static function updateUsulan1($request, $skemaUsulanId)
    {
        $request->validate([
            'judul'                 => 'required',
            'ringkasan'             => 'required',
            'kata_kunci'            => 'required',
            'step'                  => 'required'
        ]);

        Usulan::updateOrCreate([
            'dosen_id'              => Auth::user()->id,
            'skema_usulan_id'       => $skemaUsulanId
        ], [
            'judul'                 => $request->judul,
            'ringkasan'             => $request->ringkasan,
            'kata_kunci'            => $request->kata_kunci
        ]);

        if ($request->rumpun_ilmu_1) {
            $request->validate(['rumpun_ilmu_1' => 'numeric']);
            
            Usulan::where('dosen_id', Auth::user()->id)
                    ->where('skema_usulan_id', $skemaUsulanId)
                    ->update(['rumpun_ilmu_1' => $request->rumpun_ilmu_1]);
        }

        if ($request->rumpun_ilmu_2) {
            $request->validate(['rumpun_ilmu_2' => 'numeric']);

            Usulan::where('dosen_id', Auth::user()->id)
                    ->where('skema_usulan_id', $skemaUsulanId)
                    ->update(['rumpun_ilmu_2' => $request->rumpun_ilmu_2]);
        }

        if ($request->rumpun_ilmu_3) {
            $request->validate(['rumpun_ilmu_3' => 'numeric']);

            Usulan::where('dosen_id', Auth::user()->id)
                    ->where('skema_usulan_id', $skemaUsulanId)
                    ->update(['rumpun_ilmu_3' => $request->rumpun_ilmu_3]);
        }

        Usulan::updateStep($request->step, $skemaUsulanId);
    }

    static function updateUsulan2($request, $skemaUsulanId)
    {
        $request->validate(['step' => 'required']);

        Usulan::updateStep($request->step, $skemaUsulanId);
    }

    static function updateUsulan3($request, $skemaUsulanId)
    {
        $request->validate([
            'latar_belakang'    => 'required',
            'tinjauan_pustaka'  => 'required',
            'metode'            => 'required',
            'daftar_pustaka'    => 'required',
            'step'              => 'required'
        ]);

        Usulan::updateOrCreate([
            'dosen_id'          => Auth::user()->id,
            'skema_usulan_id'   => $skemaUsulanId
        ], [
            'latar_belakang'    => $request->latar_belakang,
            'tinjauan_pustaka'  => $request->tinjauan_pustaka,
            'metode'            => $request->metode,
            'daftar_pustaka'    => $request->daftar_pustaka,
        ]);

        Usulan::updateStep($request->step, $skemaUsulanId);
    }

    static function updateUsulan4($request, $skemaUsulanId)
    {
        $request->validate(['step' => 'required']);

        Usulan::updateStep($request->step, $skemaUsulanId);
    }

    static function updateUsulan5($request, $skemaUsulanId)
    {
        $request->validate(['step' => 'required']);

        Usulan::updateStep($request->step, $skemaUsulanId);
    }

    static function updateUsulan6($request, $skemaUsulanId)
    {
        $request->validate(['step' => 'required']);

        Usulan::updateStep($request->step, $skemaUsulanId);
    }
}
