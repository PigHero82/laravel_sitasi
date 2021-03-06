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
    public function update(Request $request, $skemaUsulan)
    {
        SkemaUsulan::updateSkema($request, $skemaUsulan);

        return redirect()->route('admin.skema.index')->with('success', 'Skema usulan berhasil diubah');
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

    public function skema($id)
    {
        return json_encode(Skema::getSkemaJenis($id));
    }

    public function status(Request $request, SkemaUsulan $skemaUsulan)
    {
        $request->validate(['status' => 'required|numeric']);
        SkemaUsulan::updateStatus($request->status, $skemaUsulan->id);
        return back()->with('success', 'Status skema usulan berhasil diubah');
    }

    public function usulan($id)
    {
        return json_encode(SkemaUsulan::firstSkema($id));
    }
}
