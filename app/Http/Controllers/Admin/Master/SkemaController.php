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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jenis' => 'numeric|required'
        ]);

        Skema::storeSkema($request);

        return redirect()->route('admin.master.skema.index')->with('success', 'Skema berhasil disimpan');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skema  $skema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skema $skema)
    {
        $request->validate([
            'id'    => 'numeric|required',
            'kode'  => 'required',
            'nama'  => 'required',
            'jenis' => 'numeric|required'
        ]);

        Skema::updateSkema($request);

        return redirect()->route('admin.master.skema.index')->with('success', 'Skema berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skema  $skema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skema $skema)
    {
        Skema::destroySkema($skema->id);

        return redirect()->route('admin.master.skema.index')->with('success', 'Skema berhasil dihapus');
    }
}
