<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Skema::getSkema();
        return view('master.skema', compact('data'));
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
     * @param  \App\Models\Skema  $skema
     * @return \Illuminate\Http\Response
     */
    public function show(Skema $skema)
    {
        return json_encode(Skema::firstSkema($skema->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skema  $skema
     * @return \Illuminate\Http\Response
     */
    public function edit(Skema $skema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skema  $skema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skema $skema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skema  $skema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skema $skema)
    {
        //
    }
}
