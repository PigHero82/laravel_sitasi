<?php

namespace App\Http\Controllers\Dosen;

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
        return json_encode(RumpunIlmu::getRumpunIlmuLevel1());
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
}
