<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\SkemaUsulan;
use App\Models\Usulan;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dosen = Dosen::firstDosen(Auth::user()->id);
        $skema = SkemaUsulan::getSkemaByJabatan(Auth::user()->id);
        $penelitian = Usulan::getUsulanPenelitianByDosenId(Auth::user()->id);
        $pengabdian = Usulan::getUsulanPengabdianByDosenId(Auth::user()->id);
        $countPenelitian = Usulan::countUsulanByDosenId(Auth::user()->id, 1);
        $countPengabdian = Usulan::countUsulanByDosenId(Auth::user()->id, 2);
        
        return view('index.dosen', compact('countPenelitian', 'countPengabdian', 'dosen', 'skema', 'penelitian', 'pengabdian'));
    }
}
