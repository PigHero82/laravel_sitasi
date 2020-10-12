<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\RumpunIlmu;
use Illuminate\Http\Request;

class RumpunIlmuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RumpunIlmu::getRumpunIlmuLevel1();

        return view('master.rumpun-ilmu', compact('data'));
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
     * @param  \App\Models\RumpunIlmu  $rumpunIlmu
     * @return \Illuminate\Http\Response
     */
    public function show($kode)
    {
        return json_encode(RumpunIlmu::getRumpunIlmuLevel2($kode));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RumpunIlmu  $rumpunIlmu
     * @return \Illuminate\Http\Response
     */
    public function edit(RumpunIlmu $rumpunIlmu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RumpunIlmu  $rumpunIlmu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RumpunIlmu $rumpunIlmu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RumpunIlmu  $rumpunIlmu
     * @return \Illuminate\Http\Response
     */
    public function destroy(RumpunIlmu $rumpunIlmu)
    {
        //
    }
}
