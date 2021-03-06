<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usulan;
use Illuminate\Http\Request;
use App\Models\SkemaUsulan;

class HomeController extends Controller
{
    public function index()
    {
        $penelitian = Usulan::getLimitedUsulanPenelitian(5);
        $pengabdian = Usulan::getLimitedUsulanPengabdian(5);
        $jum_pen = Usulan::where('jenis', 1)->whereNotNull('judul')->count();
        $jum_peng = Usulan::where('jenis', 2)->whereNotNull('judul')->count();
        $jum = [$jum_pen, $jum_peng];
        $tahun_penelitian = Usulan::selectRaw('skema_usulan.tahun_pelaksanaan, count(skema_usulan.tahun_pelaksanaan) as jumlah')->leftjoin('skema_usulan','usulan.skema_usulan_id','skema_usulan.id')->where('usulan.jenis',1)->whereNotNull('judul')->groupBy('skema_usulan.tahun_pelaksanaan')->get();
        $tahun_pengabdian = Usulan::selectRaw('skema_usulan.tahun_pelaksanaan, count(skema_usulan.tahun_pelaksanaan) as jumlah')->leftjoin('skema_usulan','usulan.skema_usulan_id','skema_usulan.id')->where('usulan.jenis',2)->whereNotNull('judul')->groupBy('skema_usulan.tahun_pelaksanaan')->get();

        return view('index.admin', compact('penelitian', 'pengabdian', 'jum', 'tahun_penelitian','tahun_pengabdian'));
    }

    public function usulan()
    {
        $penelitian = Usulan::getUsulanPenelitian();
        $pengabdian = Usulan::getUsulanPengabdian();
        return view('usulan.riwayat', compact('penelitian', 'pengabdian'));
    }

    public function usulanBySkema($skema){

       
        
        if($skema == 1){
            $penelitian = Usulan::getUsulanPenelitian();
            $skema = SkemaUsulan::getSkemaPenelitian();
            return view('usulan.list-penelitian', compact('penelitian','skema'));
        }

        $pengabdian = Usulan::getUsulanPengabdian();
        $skema = SkemaUsulan::getSkemaPengabdian();

     
        return view('usulan.list-pengabdian', compact('pengabdian','skema'));
    }
}