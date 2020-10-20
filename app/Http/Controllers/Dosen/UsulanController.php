<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\LuaranKelompok;
use App\Models\LuaranLuaran;
use App\Models\LuaranTarget;
use App\Models\Peran;
use App\Models\RumpunIlmu;
use App\Models\SkemaUsulan;
use App\Models\SatuanWaktu;
use App\Models\Usulan;
use App\Models\UsulanAnggota;
use App\Models\UsulanKegiatan;
use App\Models\UsulanLuaran;
use App\Models\UsulanRab;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skema = SkemaUsulan::getSkemaByJabatan(Auth::user()->id);

        return view('usulan.index', compact('skema'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = RumpunIlmu::getRumpunIlmuLevel1();
        $dosen = Dosen::getDosenNIDNNama();
        $jumlah = [1, 2, 3, 4, 5];
        $kelompok = LuaranKelompok::getKelompok();
        $luaran = LuaranLuaran::getLuaran();
        $peran = Peran::getPeran();
        $satuan = SatuanWaktu::getSatuan();
        $skema = SkemaUsulan::firstSkema($request->cookie('skema_usulan_id'));
        $target = LuaranTarget::getTarget();
        $tahun = [
            Carbon::now()->format('Y') + 0,
            Carbon::now()->format('Y') + 1,
            Carbon::now()->format('Y') + 2,
            Carbon::now()->format('Y') + 3,
            Carbon::now()->format('Y') + 4
        ];
        $usulan = Usulan::firstUsulanByDosenIdSkemaId(Auth::user()->id, $request->cookie('skema_usulan_id'));
        $usulanAnggota = UsulanAnggota::getAnggota($usulan->id);
        $usulanKegiatan = UsulanKegiatan::getKegiatan($usulan->id);
        $usulanLuaran = UsulanLuaran::firstLuaran($usulan->id);
        $usulanRab = UsulanRab::getRab($usulan->id);

        return view('usulan.create', compact('data', 'dosen', 'jumlah', 'kelompok', 'luaran', 'peran', 'satuan', 'skema', 'target', 'tahun', 'usulan', 'usulanAnggota', 'usulanKegiatan', 'usulanLuaran', 'usulanRab'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Usulan::storeUsulan($request);
   
        return redirect()->route('dosen.usulan.create')
                            ->withCookie(cookie('jenis', $request->jenis, 1000))
                            ->withCookie(cookie('skema_usulan_id', $request->skema_usulan_id, 1000))
                            ->withCookie(cookie('page', $request->step, 1000));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SkemaUsulan  $skemaUsulan
     * @return \Illuminate\Http\Response
     */
    public function show(SkemaUsulan $skemaUsulan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SkemaUsulan  $skemaUsulan
     * @return \Illuminate\Http\Response
     */
    public function edit(SkemaUsulan $skemaUsulan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SkemaUsulan  $skemaUsulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkemaUsulan $skemaUsulan)
    {
        // Step 1
        if ($request->cookie('page') == 1) {
            Usulan::updateUsulan1($request, $request->cookie('skema_usulan_id'));
            return redirect()->route('dosen.usulan.create')
                                ->withCookie(cookie('jenis', $request->cookie('jenis'), 1000))
                                ->withCookie(cookie('skema_usulan_id', $request->cookie('skema_usulan_id'), 1000))
                                ->withCookie(cookie('page', $request->step, 1000));
        } 
        
        // Step 2
        else if ($request->cookie('page') == 2) {
            Usulan::updateUsulan2($request, $request->cookie('skema_usulan_id'));
            return redirect()->route('dosen.usulan.create')
                                ->withCookie(cookie('jenis', $request->cookie('jenis'), 1000))
                                ->withCookie(cookie('skema_usulan_id', $request->cookie('skema_usulan_id'), 1000))
                                ->withCookie(cookie('page', $request->step, 1000));
        } 
        
        // Step 3
        else if ($request->cookie('page') == 3) {
            Usulan::updateUsulan3($request, $request->cookie('skema_usulan_id'));
            return redirect()->route('dosen.usulan.create')
                                ->withCookie(cookie('jenis', $request->cookie('jenis'), 1000))
                                ->withCookie(cookie('skema_usulan_id', $request->cookie('skema_usulan_id'), 1000))
                                ->withCookie(cookie('page', $request->step, 1000));
        } 
        
        // Step 4
        else if ($request->cookie('page') == 4) {
            UsulanLuaran::updateLuaran($request);
            Usulan::updateUsulan4($request, $request->cookie('skema_usulan_id'));
            return redirect()->route('dosen.usulan.create')
                                ->withCookie(cookie('jenis', $request->cookie('jenis'), 1000))
                                ->withCookie(cookie('skema_usulan_id', $request->cookie('skema_usulan_id'), 1000))
                                ->withCookie(cookie('page', $request->step, 1000));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SkemaUsulan  $skemaUsulan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkemaUsulan $skemaUsulan)
    {
        //
    }

    public function anggota(Request $request)
    {
        if (UsulanAnggota::firstAnggota($request->usulan_id, $request->dosen_id)) {
            return redirect()->back()->with('danger', 'Anggota sudah terdaftar sebagai anggota');
        } else {
            UsulanAnggota::storeAnggota($request);
            return redirect()->back()->with('success', 'Anggota berhasil ditambahkan');
        }
    }

    public function backward(Request $request)
    {
        $page = $request->cookie('page');
        return redirect()->route('dosen.usulan.create')->withCookie(cookie('page', --$page, 1000));
    }
    
    public function riwayat()
    {
        $penelitian = Usulan::getUsulanPenelitianByDosenId(Auth::user()->id);
        $pengabdian = Usulan::getUsulanPengabdianByDosenId(Auth::user()->id);

        return view('usulan.riwayat', compact('penelitian', 'pengabdian'));
    }
}