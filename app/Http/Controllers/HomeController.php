<?php

namespace App\Http\Controllers;

use App\Models\Kabkota;
use App\Models\Kecamatan;
use App\Models\ListRole;
use App\Models\LuaranTarget;
use App\Models\Provinsi;
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
		$pengumuman = Pengumuman::getPengumuman();
		$penelitian = Usulan::getUsulanPenelitian();
		$pengabdian = Usulan::getUsulanPengabdian();
		$tahun_penelitian = Usulan::getUsulanPerYear(1);
		$tahun_pengabdian = Usulan::getUsulanPerYear(2);
		
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

	public function pengumuman($id)
	{
		$data = Pengumuman::whereId($id)->first();

		return view('front.pengumuman', compact('data'));
	}

    public function kabkota($id)
    {
        return json_encode(Kabkota::getKabkota($id));
    }

    public function kecamatan($id)
    {
        return json_encode(Kecamatan::getKecamatan($id));
    }

    public function allKabkota()
    {
        return json_encode(Kabkota::allKabkota());
    }

    public function allKecamatan()
    {
        return json_encode(Kecamatan::allKecamatan());
    }

    public function provinsi()
    {
        return json_encode(Provinsi::getProvinsi());
	}
	
	public function luaranTarget($id)
	{
		return json_encode(LuaranTarget::getTargetByLuaran($id));
	}
}
