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
        $skema = SkemaUsulan::getSkema();
        $penelitian = Usulan::getUsulanPenelitianByNIDN(Auth::user()->id);
        $pengabdian = Usulan::getUsulanPengabdianByNIDN(Auth::user()->id);
        return view('index.dosen', compact('dosen', 'skema', 'penelitian', 'pengabdian'));
    }
}
