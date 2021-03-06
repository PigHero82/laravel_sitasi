<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\RabJenis;
use App\Models\UsulanRab;
use App\Models\UsulanRabBackup;
use Illuminate\Http\Request;
use App\Models\Usulan;

class RabController extends Controller
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
    public function getDetail($id){
        return json_encode(UsulanRab::firstRab($id));
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
        UsulanRab::storeRab($request);
        return redirect()->back()->with('success', 'Anggaran penelitian berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsulanRab  $usulanRab
     * @return \Illuminate\Http\Response
     */
    public function show($usulanID)
    {
        $usulan = Usulan::firstUsulan($usulanID);
        $usulanRab = UsulanRab::getRab($usulanID);


        return view('rab',compact('usulan','usulanRab'));
    }
    /*public function rabShow($usulanID){
        $usulan = Usulan::firstUsulan($usulanID);
        $usulanRab = UsulanRab::getRab($usulanID);


        return view('rab',compact('usulan','usulanRab'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsulanRab  $usulanRab
     * @return \Illuminate\Http\Response
     */
    public function edit(UsulanRab $usulanRab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsulanRab  $usulanRab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $usulanId)
    {
        
        $oldRab = UsulanRab::getRab($usulanId);
        $backedUpRab = UsulanRabBackup::latestRab($usulanId);

        if (empty($backedUpRab)) {
            $revisi = 1;
        } else {
            $revisi = $backedUpRab->review + 1;
        }
        
        foreach ($oldRab as $key => $old) {
            UsulanRabBackup::storeRab($old,  $revisi);
            UsulanRab::destroyRab($old->id);
        }

        UsulanRab::updateRab($request, $usulanId);
        return redirect()->route('dosen.index')->with('success', 'RAB berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsulanRab  $usulanRab
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UsulanRab::destroyRab($id);
        return redirect()->back()->with('success', 'Anggaran penelitian berhasil dihapus');
    }
}
