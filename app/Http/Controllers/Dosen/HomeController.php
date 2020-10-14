<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\SkemaUsulan;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dosen = Dosen::firstDosen(Auth::user()->id);
        $skema = SkemaUsulan::getSkema();
        return view('index.dosen', compact('dosen', 'skema'));
    }
}
