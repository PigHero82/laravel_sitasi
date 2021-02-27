<?php

namespace App\Http\Controllers\Admin\Master;

use App\Models\PenilaianIndikator;
use App\Models\PenilaianTahap;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penilaian = PenilaianTahap::getPenilaian();
        return view('master.penilaian.index', compact('penilaian'));
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
            'nama'      => 'required',
            'status'    => 'required|numeric'
        ]);

        PenilaianTahap::storePenilaian($request);
        return back()->with('success', 'Indikator penilaian berhasil ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeIndikator(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'jenis'     => 'required|numeric',
            'status'    => 'required|numeric'
        ]);

        PenilaianIndikator::storeIndikator($request);
        return back()->with('success', 'Tahap penilaian berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return json_encode(PenilaianIndikator::firstIndikator($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penilaian = PenilaianTahap::firstPenilaian($id);
        return view('master.penilaian.edit', compact('penilaian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required',
            'status'    => 'required|numeric',
        ]);

        PenilaianTahap::updatePenilaian($request, $id);
        return back()->with('success', 'Tahap penilaian berhasil diubah');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateIndikator(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required',
            'jenis'     => 'required|numeric',
            'status'    => 'required|numeric'
        ]);

        PenilaianIndikator::updateIndikator($request, $id);
        return back()->with('success', 'Indikator penilaian berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
