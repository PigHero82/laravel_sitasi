<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\UsulanAnggota;
use Auth;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confirmed = UsulanAnggota::getConfirmedPersonal(Auth::user()->id);
        $unconfirmed = UsulanAnggota::getUnconfirmedPersonal(Auth::user()->id);
        
        return view('persetujuan-personil', compact('confirmed', 'unconfirmed'));
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
     * @param  \App\Models\UsulanAnggota  $usulanAnggota
     * @return \Illuminate\Http\Response
     */
    public function show(UsulanAnggota $usulanAnggota)
    {
        return UsulanAnggota::firstPersonal($usulanAnggota->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsulanAnggota  $usulanAnggota
     * @return \Illuminate\Http\Response
     */
    public function edit(UsulanAnggota $usulanAnggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsulanAnggota  $usulanAnggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsulanAnggota $persetujuan)
    {
        $request->validate(['status' => 'required|numeric']);
        UsulanAnggota::updatePersonal($request->status, $persetujuan->id);

        if ($request->status == 1) {
            return back()->with('success', 'Usulan disetujui');
        } else if ($request->status == 2) {
            return back()->with('success', 'Usulan tidak disetujui');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsulanAnggota  $usulanAnggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsulanAnggota $usulanAnggota)
    {
        //
    }
}
