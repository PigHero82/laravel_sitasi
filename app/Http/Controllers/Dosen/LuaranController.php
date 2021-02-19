<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\UsulanLuaran;
use App\Models\UsulanLuaranBackup;
use App\Models\LuaranKelompok;
use App\Models\LuaranLuaran;
use App\Models\LuaranTarget;
use Illuminate\Http\Request;

class LuaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsulanLuaran  $usulanLuaran
     * @return \Illuminate\Http\Response
     */
    public function show($usulanId)
    {
        $luaran = LuaranLuaran::getActiveLuaran();
        $kelompok = LuaranKelompok::getKelompok();
        $target = LuaranTarget::getActiveTarget();
        $usulanLuaran = UsulanLuaran::getLuaran($usulanId);
        $jumlah = [1, 2, 3, 4, 5];
        $tahun = [1, 2, 3, 4, 5];
        return view('usulan.lihat-luaran',compact('luaran','kelompok','target','usulanLuaran','tahun','jumlah', 'usulanId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsulanLuaran  $usulanLuaran
     * @return \Illuminate\Http\Response
     */
    public function edit(UsulanLuaran $usulanLuaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsulanLuaran  $usulanLuaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $usulanId)
    {
        $oldLuaran = UsulanLuaran::getLuaran($usulanId);
        $backedUpLuaran = UsulanLuaranBackup::latestLuaran($usulanId);
       
        if (empty($backedUpLuaran)) {
            $revisi = 1;
        } else {
            $revisi = $backedUpLuaran->review + 1;
        }
        
        foreach ($oldLuaran as $key => $old) {

            UsulanLuaranBackup::storeLuaran($old,  $revisi);
            UsulanLuaran::destroyLuaran($old->id);
        }

        UsulanLuaran::updateLuaranRevisi($request,$usulanId);
        return redirect()->route('dosen.index')->with('success', 'Luaran berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsulanLuaran  $usulanLuaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsulanLuaran $usulanLuaran)
    {
        //
    }
}
