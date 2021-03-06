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
    protected $fillable = ['dosen_id', 'skema_usulan_id', 'jenis', 'judul', 'ringkasan', 'kata_kunci', 'latar_belakang', 'tinjauan_pustaka', 'metode', 'daftar_pustaka', 'rumpun_ilmu_1', 'rumpun_ilmu_2', 'rumpun_ilmu_3', 'usulan_dana', 'nilai', 'step'];

    static function countUsulanByDosenId($id, $jenis)
    {
        return Usulan::where('jenis', $jenis)
                        ->where('dosen_id', $id)
                        ->whereNotNull('judul')
                        ->count();
    }

    static function countReviewedUsulan($reviewer)
    {
        return Usulan::selectRaw('count(id) as reviewed')
                        ->where('reviewer', $reviewer)
                        ->where('nilai', '>', 0)
                        ->pluck('reviewed')
                        ->first();
    }

    static function countUnreviewedUsulan($reviewer)
    {
        return Usulan::selectRaw('count(id) as unreviewed')
                        ->where('reviewer', $reviewer)
                        ->where('nilai', 0)
                        ->orWhereNull('nilai')
                        ->pluck('unreviewed')
                        ->first();
    }

    static function firstUsulan($id)
    {
        $usulan = Usulan::select('id', 'skema_usulan_id')
                        ->whereId($id)
                        ->orderByDesc('created_at')
                        ->first();

        if (isset($usulan)) {
            $data = [];
            $data = Usulan::select(DB::raw('usulan.*, skema.kode, skema_usulan.tahun_skema, dosen.nama as ketua, skema_usulan.dana_maksimal'))->join('dosen', 'usulan.dosen_id', 'dosen.id')
                        ->join('skema_usulan', 'usulan.skema_usulan_id', 'skema_usulan.id')
                        ->join('skema', 'skema_usulan.skema_id', 'skema.id')
                        ->firstWhere('usulan.id', $id);
            $data['anggota'] = UsulanAnggota::getConfirmedAnggota($id);
            $data['belanja'] = UsulanBelanja::getBelanja($id);
            $data['berkas'] = UsulanBerkas::getBerkas($id);
            $data['kegiatan'] = UsulanKegiatan::getKegiatan($id);
            $data['komentar'] = UsulanKomentar::getKomentar($id);
            $data['luaran'] = UsulanLuaran::getLuaran($id);
            $data['mahasiswa'] = UsulanMahasiswa::getMahasiswa($id);
            $data['penilaian'] = UsulanNilai::getNilai($id);
            $data['rab'] = UsulanRab::getRab($id);
            $data['skema_usulan'] = SkemaUsulan::firstSkema($usulan->skema_usulan_id);
            $data['mitra'] = UsulanMitra::firstMitra($id);

            return $data;
        }

        return $usulan;
    }

    static function firstUsulanByDosenIdSkemaId($dosenId, $skemaUsulanId)
    {
        $data = Usulan::select(DB::raw('usulan.*, skema.kode, skema_usulan.tahun_skema, dosen.nama as ketua'))
                        ->join('dosen', 'usulan.dosen_id', 'dosen.id')
                        ->join('skema_usulan', 'usulan.skema_usulan_id', 'skema_usulan.id')
                        ->join('skema', 'skema_usulan.skema_id', 'skema.id')
                        ->where('dosen_id', $dosenId)
                        ->where('skema_usulan_id', $skemaUsulanId)
                        ->first();
        $data['anggota'] = UsulanAnggota::getConfirmedAnggota($data->id);
        $data['belanja'] = UsulanBelanja::getBelanja($data->id);
        $data['berkas'] = UsulanBerkas::getBerkas($data->id);
        $data['kegiatan'] = UsulanKegiatan::getKegiatan($data->id);
        $data['komentar'] = UsulanKomentar::getKomentar($data->id);
        $data['luaran'] = UsulanLuaran::getLuaran($data->id);
        $data['mahasiswa'] = UsulanMahasiswa::getMahasiswa($data->id);
        $data['mitra'] = UsulanMitra::firstMitra($data->id);
        $data['penilaian'] = UsulanNilai::getNilai($data->id);
        $data['rab'] = UsulanRab::getRab($data->id);
        $data['skema_usulan'] = SkemaUsulan::firstSkema($data->skema_usulan_id);

        return $data;
    }

    static function getUsulanId($jenis)
    {
        $usulan = Usulan::select('id', 'skema_usulan_id', 'reviewer')
                        ->where('jenis', $jenis)
                        ->orderByDesc('created_at')
                        ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::findOrFail($value->id);
            }

            return $data;
        }

        return $usulan;
    }

    static function getUsulanaktif($jenis){
        $usulan = Usulan::select('usulan.id', 'skema_usulan_id', 'reviewer','step', 'skema_usulan.status','dosen.nama AS ketua','usulan.dosen_id')
                        ->join('dosen', 'usulan.dosen_id', 'dosen.id')
                        ->join('skema_usulan','usulan.skema_usulan_id','skema_usulan.id')
                        ->where('usulan.jenis', $jenis)
                        ->whereNotNull('judul')
                        ->where('skema_usulan.status',1)
                        ->orderByDesc('usulan.created_at')
                        ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::findOrFail($value->id);
                $data[$key]['anggota'] = UsulanAnggota::getConfirmedAnggota($value->id);
                $data[$key]['belanja'] = UsulanBelanja::getBelanja($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['komentar'] = UsulanKomentar::getKomentar($value->id);
                $data[$key]['luaran'] = UsulanLuaran::getLuaran($value->id);
                $data[$key]['mahasiswa'] = UsulanMahasiswa::getMahasiswa($value->id);
                $data[$key]['mitra'] = UsulanMitra::firstMitra($value->id);
                $data[$key]['penilaian'] = UsulanNilai::getNilai($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
                $data[$key]['reviewer'] = ($value->reviewer != NULL) ? Dosen::firstDosenByNidn($value->reviewer) : NULL ;
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
            }

            return $data;
        }

        return $usulan;
    }

    static function getUsulan($jenis)
    {
        $usulan = Usulan::select('id', 'skema_usulan_id', 'reviewer','step')
                        ->where('jenis', $jenis)
                        ->whereNotNull('judul')
                        ->orderByDesc('created_at')
                        ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::findOrFail($value->id);
                $data[$key]['anggota'] = UsulanAnggota::getConfirmedAnggota($value->id);
                $data[$key]['belanja'] = UsulanBelanja::getBelanja($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['komentar'] = UsulanKomentar::getKomentar($value->id);
                $data[$key]['luaran'] = UsulanLuaran::getLuaran($value->id);
                $data[$key]['mahasiswa'] = UsulanMahasiswa::getMahasiswa($value->id);
                $data[$key]['mitra'] = UsulanMitra::firstMitra($value->id);
                $data[$key]['penilaian'] = UsulanNilai::getNilai($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
                $data[$key]['reviewer'] = ($value->reviewer != NULL) ? Dosen::firstDosenByNidn($value->reviewer) : NULL ;
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
            }

            return $data;
        }

        return $usulan;
    }

    static function getUsulanPenilaian($jenis)
    {
        $usulan = Usulan::select('usulan.id', 'skema_usulan_id', 'usulan.reviewer')
                        ->join('skema_usulan','usulan.skema_usulan_id','skema_usulan.id')
                        ->where('usulan.jenis', $jenis)
                        ->where('usulan.step', '>', 8)
                        ->where('skema_usulan.status',1)
                        ->orderBy('usulan.step')
                        ->orderByDesc('usulan.judul')
                        ->get();
        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::firstUsulan($value->id);
                $data[$key]['anggota'] = UsulanAnggota::getConfirmedAnggota($value->id);
                $data[$key]['belanja'] = UsulanBelanja::getBelanja($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['komentar'] = UsulanKomentar::getKomentar($value->id);
                $data[$key]['luaran'] = UsulanLuaran::getLuaran($value->id);
                $data[$key]['mahasiswa'] = UsulanMahasiswa::getMahasiswa($value->id);
                $data[$key]['mitra'] = UsulanMitra::firstMitra($value->id);
                $data[$key]['penilaian'] = UsulanNilai::getNilai($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
                $data[$key]['reviewer'] = ($value->reviewer != NULL) ? Dosen::firstDosenByNidn($value->reviewer) : NULL ;
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
            }
            return $data;
        }

        return $usulan;
    }

    static function getUsulanPenelitian()
    {
        $data = [];
        $usulan = Usulan::select()
                        ->where('jenis', 1)
                        ->whereNotNull('judul')
                        ->orderByDesc('skema_usulan_id')
                        ->get();
        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::firstUsulan($value->id);
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
                $data[$key]['anggota'] = UsulanAnggota::getConfirmedAnggota($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['luaran'] = UsulanLuaran::getLuaran($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
                $data[$key]['arnilai'] = UsulanNilai::getNilai($value->id);
            }
            return $data;
        }

        return $usulan;
    }

    static function getLimitedUsulanPenelitian($count)
    {
        $usulan = Usulan::where('jenis', 1)
                        ->whereNotNull('judul')
                        ->orderByDesc('skema_usulan_id')
                        ->take($count)
                        ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::firstUsulan($value->id);
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
                $data[$key]['anggota'] = UsulanAnggota::getConfirmedAnggota($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['luaran'] = UsulanLuaran::getLuaran($value->id);
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
                        ->whereNotNull('judul')
                        ->orderByDesc('skema_usulan_id')
                        ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::firstUsulan($value->id);
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
                $data[$key]['anggota'] = UsulanAnggota::getConfirmedAnggota($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['luaran'] = UsulanLuaran::getLuaran($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
                $data[$key]['arnilai'] = UsulanNilai::getNilai($value->id);
            }

            return $data;
        }

        return $usulan;
    }

    static function getLimitedUsulanPengabdian($count)
    {
        $usulan = Usulan::where('jenis', 2)
                        ->whereNotNull('judul')
                        ->orderByDesc('skema_usulan_id')
                        ->paginate($count);

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::firstUsulan($value->id);
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
                $data[$key]['anggota'] = UsulanAnggota::getConfirmedAnggota($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['luaran'] = UsulanLuaran::getLuaran($value->id);
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
                        ->whereNotNull('judul')
                        ->orderByDesc('created_at')
                        ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::firstUsulan($value->id);
                $data[$key]['anggota'] = UsulanAnggota::getConfirmedAnggota($value->id);
                $data[$key]['belanja'] = UsulanBelanja::getBelanja($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['komentar'] = UsulanKomentar::getKomentar($value->id);
                $data[$key]['luaran'] = UsulanLuaran::getLuaran($value->id);
                $data[$key]['mitra'] = UsulanMitra::firstMitra($value->id);
                $data[$key]['penilaian'] = UsulanNilai::getNilai($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
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
                $data[$key]['anggota'] = UsulanAnggota::getConfirmedAnggota($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['luaran'] = UsulanLuaran::getLuaran($value->id);
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
                $data[$key]['anggota'] = UsulanAnggota::getConfirmedAnggota($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['luaran'] = UsulanLuaran::getLuaran($value->id);
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
                        ->whereNotNull('judul')
                        ->groupBy('skema_usulan.tahun_pelaksanaan')
                        ->get();
    }
    static function getUsulanBySkema($skema_id){

    }

    static function getUsulanByReviewer($reviewer, $jenis)
    {
        $usulan = Usulan::select('usulan.id', 'skema_usulan_id', 'usulan.reviewer')
                        ->join('skema_usulan','usulan.skema_usulan_id','skema_usulan.id')
                        ->where('reviewer', $reviewer)
                        ->where('usulan.jenis', $jenis)
                        ->where('skema_usulan.status',1)
                        ->whereNotNull('judul')
                        ->orderByDesc('usulan.created_at')
                        ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::findOrFail($value->id);
                $data[$key]['anggota'] = UsulanAnggota::getConfirmedAnggota($value->id);
                $data[$key]['belanja'] = UsulanBelanja::getBelanja($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['komentar'] = UsulanKomentar::getKomentar($value->id);
                $data[$key]['luaran'] = UsulanLuaran::getLuaran($value->id);
                $data[$key]['mahasiswa'] = UsulanMahasiswa::getMahasiswa($value->id);
                $data[$key]['mitra'] = UsulanMitra::firstMitra($value->id);
                $data[$key]['penilaian'] = UsulanNilai::getNilai($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
                $data[$key]['reviewer'] = ($value->reviewer != NULL) ? Dosen::firstDosenByNidn($value->reviewer) : NULL ;
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
            }

            return $data;
        }

        return $usulan;
    }

    static function getUsulanByReviewerLimited($reviewer, $jenis, $count)
    {
        $usulan = Usulan::select('id', 'skema_usulan_id', 'reviewer','judul')
                        ->whereNotNull('judul')
                        ->where(function ($query) use($reviewer, $jenis) {
                            $query->where('reviewer', $reviewer)
                                    ->where('jenis', $jenis)
                                    ->where('step', '>', 8)
                                    ->where('nilai', 0);
                        })
                        ->orWhere(function($query) use($reviewer, $jenis) {
                            $query->where('reviewer', $reviewer)
                                    ->where('jenis', $jenis)
                                    ->where('step', '>', 8)
                                    ->whereNull('nilai');
                        })
                        ->orderByDesc('created_at')
                        ->get();

        if ($usulan->isNotEmpty()) {
            foreach ($usulan as $key => $value) {
                $data[$key] = Usulan::findOrFail($value->id);
                $data[$key]['anggota'] = UsulanAnggota::getConfirmedAnggota($value->id);
                $data[$key]['belanja'] = UsulanBelanja::getBelanja($value->id);
                $data[$key]['kegiatan'] = UsulanKegiatan::getKegiatan($value->id);
                $data[$key]['komentar'] = UsulanKomentar::getKomentar($value->id);
                $data[$key]['luaran'] = UsulanLuaran::getLuaran($value->id);
                $data[$key]['mahasiswa'] = UsulanMahasiswa::getMahasiswa($value->id);
                $data[$key]['mitra'] = UsulanMitra::firstMitra($value->id);
                $data[$key]['penilaian'] = UsulanNilai::getNilai($value->id);
                $data[$key]['rab'] = UsulanRab::getRab($value->id);
                $data[$key]['reviewer'] = ($value->reviewer != NULL) ? Dosen::firstDosenByNidn($value->reviewer) : NULL ;
                $data[$key]['skema_usulan'] = SkemaUsulan::firstSkema($value->skema_usulan_id);
            }

            return $data;
        }

        return $usulan;
    }

    static function persetujuanUsulan($status, $id)
    {
        if ($status == 1) {
            Usulan::whereId($id)->update([
                'nilai' => $status,
                'step'  => 10
            ]);
        } else if ($status == 2) {
            Usulan::whereId($id)->update([
                'nilai' => $status,
                'step'  => 12
            ]);
        } else if ($status == 3) {
            Usulan::whereId($id)->update([
                'nilai' => $status,
                'step'  => 14
            ]);
        }
    }

    static function storeUsulan($request, $skemaUsulanId)
    {
        Usulan::updateOrCreate([
            'dosen_id'          => Auth::user()->id,
            'skema_usulan_id'   => $skemaUsulanId
        ], [
            'dosen_id'          => Auth::user()->id,
            'skema_usulan_id'   => $skemaUsulanId,
            'jenis'             => $request->jenis
        ]);
    }

    static function updateNilai($nilai, $id)
    {
        Usulan::whereId($id)->update(['nilai' => $nilai]);
    }

    static function updateReviewer($dosenId, $id)
    {
        Usulan::whereId($id)->update(['reviewer' => $dosenId]);
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
        $request->validate(['step' => 'required']);

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

    static function updateUsulan7($request, $skemaUsulanId)
    {
        $request->validate(['step' => 'required']);

        Usulan::updateStep($request->step, $skemaUsulanId);
    }

    static function updateUsulan8($request, $skemaUsulanId)
    {
        $request->validate(['step' => 'required']);

        Usulan::updateStep($request->step, $skemaUsulanId);
    }

    static function updateUsulanDana($request)
    {
        $request->validate([
            'usulan_id'         => 'numeric|required',
            'usulan_dana'       => 'numeric|required'
        ]);

        Usulan::whereId($request->usulan_id)->update(['usulan_dana' => $request->usulan_dana]);
    }
}
