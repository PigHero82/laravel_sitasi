<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\RumpunIlmu;
use App\Models\SkemaUsulan;
use App\Models\SatuanWaktu;
use App\Models\Usulan;
use Auth;
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
        $satuan = SatuanWaktu::getSatuan();
        $usulan = Usulan::firstUsulanByDosenIdSkemaId(Auth::user()->id, $request->cookie('skema_usulan_id'));

        return view('usulan.create', compact('data', 'satuan', 'usulan'));
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
                            ->withCookie(cookie('step', $request->step, 1000));
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
        if ($request->cookie('step') == 1) {
            Usulan::updateUsulan1($request, $request->cookie('skema_usulan_id'));
       
            return redirect()->route('dosen.usulan.create')
                                ->withCookie(cookie('jenis', $request->cookie('jenis'), 1000))
                                ->withCookie(cookie('skema_usulan_id', $request->cookie('skema_usulan_id'), 1000))
                                ->withCookie(cookie('step', $request->step, 1000));
        } else if ($request->cookie('step') == 2) {
            # code...
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function backward(Request $request)
    {
        $step = $request->cookie('step');
        return redirect()->route('dosen.usulan.create')->withCookie(cookie('step', --$step, 1000));
    }
}
