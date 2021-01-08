<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use App\Models\Usulan;
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

    public function storeNilai(Request $request, $id)
    {
        $request->validate([
            'nilai'     => 'numeric|required',
            'komentar'  => 'required'
        ]);

        Usulan::updateNilai($request, $id);
        
        return back()->with('success', 'Nilai usulan berhasil ditambahkan');
    }
}
