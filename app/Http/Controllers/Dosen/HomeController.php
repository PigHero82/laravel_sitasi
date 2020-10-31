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
        $countPenelitian = Usulan::countUsulanByDosenId(Auth::user()->id, 1);
        $countPengabdian = Usulan::countUsulanByDosenId(Auth::user()->id, 2);
        $dosen = Dosen::firstDosen(Auth::user()->id);
        $skema = SkemaUsulan::getSkemaByJabatan(Auth::user()->id);
        $penelitian = Usulan::getUsulanByDosenId(Auth::user()->id, 1);
        $pengabdian = Usulan::getUsulanByDosenId(Auth::user()->id, 2);
        
        return view('index.dosen', compact('countPenelitian', 'countPengabdian', 'dosen', 'penelitian', 'pengabdian', 'skema'));
    }

    public function test()
    {

    }
}
