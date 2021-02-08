<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dosen;
use App\Models\User;
use App\Models\Usulan;
use App\Models\UsulanAnggota;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function pembagian()
    {
        $penelitian = Usulan::getUsulanAktif(1);
        $pengabdian = Usulan::getUsulanAktif(2);
        $reviewer = Dosen::getDosenReviewer();

        return view('review.pembagian-reviewer', compact('penelitian', 'pengabdian', 'reviewer'));
    }

    public function storeReviewer(Request $request, $id)
    {
        $request->validate(['dosen_id' => 'numeric|required']);

        $anggota = UsulanAnggota::getAnggota($id);
        $status = false;
        foreach ($anggota as $key => $value) {
            if ($value->dosen_id == $request->dosen_id) {
                $status = true;
                break;
            }
        }

        if ($status == false) {
            Usulan::updateReviewer($request->dosen_id, $id);
        } else if ($status == true) {
            return back()->with('danger', 'Reviewer telah terdaftar sebagai anggota usulan');
        }

        return back()->with('success', 'Reviewer usulan berhasil diubah');
    }

    public function randomReviewer($jenis)
    {
        $usulans = Usulan::getUsulanId($jenis);

        foreach ($usulans as $key => $usulan) {
            do {
                $status = true;
                $dosen = User::firstUserReviewer();
                if ($usulan->dosen_id != $dosen->id) {
                    $anggota = UsulanAnggota::getAnggota($usulan->id);
                    foreach ($anggota as $key => $value) {
                        if ($value->dosen_id == $dosen->id) {
                            $status = false;
                        }
                    }
                }
            } while ($status == false);

            Usulan::updateReviewer($dosen->nidn, $usulan->id);
        }

        return back()->with('success', 'Reviewer usulan berhasil diacak');
    }
}
