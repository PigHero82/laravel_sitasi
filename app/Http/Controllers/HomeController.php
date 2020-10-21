<?php

namespace App\Http\Controllers;

use App\Models\ListRole;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Usulan;
use App\Models\Pengumuman;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

	public function index()
	{
		if (Auth::check()) {
			if (Auth::user()->hasRole('admin')) {
				return redirect('/admin');
			} elseif (Auth::user()->hasRole('pimpinan')) {
				return redirect('/pimpinan');
			} elseif (Auth::user()->hasRole('dosen')) {
				return redirect('/dosen');
			} elseif (Auth::user()->hasRole('penelitian')) {
				return redirect('/penelitian');
			} elseif (Auth::user()->hasRole('pengabdian')) {
				return redirect('/pengabdian');
			} elseif (Auth::user()->hasRole('reviewer')) {
				return redirect('/reviewer');
			}
		}
		//return redirect('/login');
		$pengumuman = Pengumuman::where('jenis',4)->orderBy('created_at', 'desc')->get();
		$penelitian = Usulan::getUsulanPenelitian();
		$pengabdian = Usulan::getUsulanPengabdian();
		$tahun_penelitian = Usulan::selectRaw('skema_usulan.tahun_pelaksanaan, count(skema_usulan.tahun_pelaksanaan) as jumlah')->leftjoin('skema_usulan','usulan.skema_usulan_id','skema_usulan.id')->where('usulan.jenis',1)->groupBy('skema_usulan.tahun_pelaksanaan')->get();
		$tahun_pengabdian = Usulan::selectRaw('skema_usulan.tahun_pelaksanaan, count(skema_usulan.tahun_pelaksanaan) as jumlah')->leftjoin('skema_usulan','usulan.skema_usulan_id','skema_usulan.id')->where('usulan.jenis',2)->groupBy('skema_usulan.tahun_pelaksanaan')->get();
		/*$jumlah_penelitian = []; 
		foreach ($tahun_penelitian as $key => $value) {
			$jumlah_penelitian[] = Usulan::select('skema_usulan.tahun_pelaksanaan')->leftjoin('skema_usulan','usulan.skema_usulan_id','skema_usulan.id')->where('usulan.jenis',1)->where('skema_usulan.tahun_pelaksanaan',$value->tahun_pelaksanaan)->count();
		}*/
		
		return view('front.index',compact('pengumuman','penelitian','pengabdian','tahun_penelitian','tahun_pengabdian'));
	}

	public function update($id)
	{
		if (Auth::check()) {
			$role = ListRole::firstRole(Auth::user()->id, $id);
			if (isset($role)) {
				RoleUser::updateRole(Auth::user()->id, $id);
				return redirect('');
			} else {
				return redirect()->back();
			}
		} else {
			return redirect()->route('login');
		}
	}

	public function usulan($id)
	{
		return json_encode(Usulan::firstUsulan($id));
	}
}
