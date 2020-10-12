<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Skema;
use App\Models\SkemaUsulan;
use Illuminate\Http\Request;

class SkemaUsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::getJabatan();
        $skema = Skema::getSkema();
        $skemaPenelitian = SkemaUsulan::getSkemaPenelitian();
        $skemaPengabdian = SkemaUsulan::getSkemaPengabdian();

        return view('skema', compact('jabatan', 'skema', 'skemaPenelitian', 'skemaPengabdian'));
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
            'skema_id'                  => 'numeric|required',
            'jenis'                     => 'numeric|required',
            'jumlah'                    => 'numeric|required',
            'tahun_skema'               => 'numeric|required',
            'tahun_penelitian'          => 'numeric|required',
            'tanggal_usulan'            => 'date|required',
            'tanggal_review'            => 'date|required',
            'tanggal_laporan_kemajuan'  => 'date|required',
            'tanggal_laporan_akhir'     => 'date|required',
            'tanggal_publikasi'         => 'date|required'
        ]);

        SkemaUsulan::storeSkema($request);
        return redirect()->route('admin.skema.index')->with('success', 'Skema usulan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SkemaUsulan  $skemaUsulan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $skemaUsulan;
        return SkemaUsulan::firstSkema($id);
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
        //
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
}
