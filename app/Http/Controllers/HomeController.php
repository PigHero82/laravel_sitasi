<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\ListRole;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
		return redirect('/login');
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
}
