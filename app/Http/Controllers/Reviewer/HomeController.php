<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use App\Models\PenilaianIndikator;
use App\Models\Usulan;
use App\Models\UsulanKomentar;
use App\Models\UsulanNilai;
use App\Models\UsulanRab;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $penelitian = Usulan::getUsulanByReviewerLimited(Auth::user()->nidn, 1, 5);
        $pengabdian = Usulan::getUsulanByReviewerLimited(Auth::user()->nidn, 2, 5);
        $reviewed = Usulan::countReviewedUsulan(Auth::user()->nidn);
        $unreviewed = Usulan::countUnreviewedUsulan(Auth::user()->nidn);

        return view('index.reviewer', compact('penelitian', 'pengabdian', 'reviewed', 'unreviewed'));
    }

    public function review()
    {
        $penelitian = Usulan::getUsulanByReviewer(Auth::user()->nidn, 1);
        $pengabdian = Usulan::getUsulanByReviewer(Auth::user()->nidn, 2);

        return view('review', compact('penelitian', 'pengabdian'));
    }

    public function rabShow($usulanID){
        $usulan = Usulan::firstUsulan($usulanID);
        $usulanRab = UsulanRab::getRab($usulanID);


        return view('rab',compact('usulan','usulanRab'));
    }

    public function getindikator($id, $jenis)
    {
        return json_encode(PenilaianIndikator::getIndikator($id, $jenis));
    }

    public function storeNilai(Request $request, $id)
    {
        $request->validate([
            'nilai'                 => 'required',
            'komentar'              => 'required',
            'penilaian_tahap_id'    => 'required|numeric'
        ]);

        UsulanNilai::storeNilai($request, $id);
        UsulanKomentar::storeKomentar($request, $id);

        /*
            1 = Tahap 1 pending
            2 = Tahap 1 approved
            3 = Tahap 1 rejected

            4 = Tahap 2 pending
            5 = Tahap 2 approved
            6 = Tahap 2 rejected

            7 = Tahap 3 pending
            8 = Tahap 3 approved
            9 = Tahap 3 rejected
        */
        if ($request->penilaian_tahap_id == 1) {
            Usulan::updateNilai(1, $id);
        } else if ($request->penilaian_tahap_id == 2) {
            Usulan::updateNilai(4, $id);
        }

        return back()->with('success', 'Nilai usulan berhasil ditambahkan');
    }
}
