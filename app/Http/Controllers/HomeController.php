<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $this->middleware('auth');
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
}
