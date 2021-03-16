<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use App\Models\PengumumanFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::getAllPengumuman();
        return view('pengumuman', compact('pengumuman'));
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
            'jenis'     => 'required|numeric',
            'judul'     => 'required',
            'katakunci' => 'required',
            'content'   => 'required',
            'foto.*'    => 'required|image|max:1024'
        ]);

        Pengumuman::storePengumuman($request);
        return back()->with('success', 'Pengumuman berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        return json_encode(Pengumuman::firstPengumuman($pengumuman->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'jenis'     => 'required|numeric',
            'judul'     => 'required',
            'katakunci' => 'required',
            'content'   => 'required',
            'foto.*'    => 'required|image|max:1024'
        ]);

        Pengumuman::updatePengumuman($request, $pengumuman->id);
        return back()->with('success', 'Pengumuman berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        Pengumuman::destroyPengumuman($pengumuman->id);
        return back()->with('success', 'Pengumuman berhasil dihapus');
    }

    public function destroyPhoto(PengumumanFoto $photo)
    {
        PengumumanFoto::destroyPhoto($photo);
        return back()->with('success', 'Foto berhasil dihapus');
    }
}
