<?php

namespace App\Http\Controllers;

use App\Models\UsulanLuaran;
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
        $request->validate([
            'usulan_id'         => 'required|numeric',
            'tahun'             => 'required|numeric',
            'luaran_luaran_id'  => 'required|numeric',
            'luaran_target_id'  => 'required|numeric',
            'jumlah'            => 'required|numeric'
        ]);

        UsulanLuaran::storeLuaran($request);
        return back()->with('success', 'Luaran berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsulanLuaran  $usulanLuaran
     * @return \Illuminate\Http\Response
     */
    public function show($usulanLuaran)
    {
        return json_encode(UsulanLuaran::firstLuaran($usulanLuaran));
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
    public function update(Request $request, $usulanLuaran)
    {
        $request->validate([
            'tahun'             => 'required|numeric',
            'luaran_luaran_id'  => 'required|numeric',
            'luaran_target_id'  => 'required|numeric',
            'jumlah'            => 'required|numeric'
        ]);
        
        UsulanLuaran::updateLuaran($request, $usulanLuaran);
        return back()->with('success', 'Luaran berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsulanLuaran  $usulanLuaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($usulanLuaran)
    {
        UsulanLuaran::destroyLuaran($usulanLuaran);
        return back()->with('success', 'Luaran berhasil dihapus');
    }
}
