<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usulan;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $penelitian = Usulan::getUsulanPenilaian(1);
        $pengabdian = Usulan::getUsulanPenilaian(2);
        $datas = Usulan::join('skema_usulan','usulan.skema_usulan_id','skema_usulan.id')
                        ->where('skema_usulan.status',1)->get();

        return view('review.penilaian', compact('penelitian', 'pengabdian','datas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['status' => 'numeric|required']);

        Usulan::persetujuanUsulan($request->status, $id);

        switch ($request->status) {
            case 10:
                return back()->with('success', 'Usulan tidak disetujui');
            
            case 11:
                return back()->with('success', 'Usulan disetujui');
            
            default:
                # code...
                break;
        }
    }
}
