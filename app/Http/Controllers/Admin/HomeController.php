<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usulan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $penelitian = Usulan::getUsulanPenelitian();
        $pengabdian = Usulan::getUsulanPengabdian();

        return view('index.admin', compact('penelitian', 'pengabdian'));
    }

    public function usulan()
    {
        $penelitian = Usulan::getUsulanPenelitian();
        $pengabdian = Usulan::getUsulanPengabdian();

        return view('usulan.riwayat', compact('penelitian', 'pengabdian'));
    }
}