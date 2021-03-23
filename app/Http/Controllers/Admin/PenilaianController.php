<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usulan;
use App\Models\PenilaianTahap;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $penelitian = Usulan::getUsulanPenilaian(1);
        $pengabdian = Usulan::getUsulanPenilaian(2);
        $datas = Usulan::join('skema_usulan','usulan.skema_usulan_id','skema_usulan.id')
                        ->where('skema_usulan.status',1)->get();
        $tahap = PenilaianTahap::getPenilaian();

        return view('review.penilaian', compact('datas', 'penelitian', 'pengabdian', 'tahap'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['status' => 'numeric|required']);
        Usulan::persetujuanUsulan($request->status, $id);

        return back()->with('success', 'Tahap usulan berhasil diubah');
    }
}
