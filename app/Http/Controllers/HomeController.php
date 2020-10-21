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
		$pengumuman = Pengumuman::orderBy('created_at', 'desc')->paginate(4);
		return view('front.index',compact('pengumuman'));
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
