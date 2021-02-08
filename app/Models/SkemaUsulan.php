<?php

namespace App\Models;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SkemaUsulan extends Model
{
    use HasFactory;

    protected $table = 'skema_usulan';
    protected $fillable = ['skema_id', 'jenis', 'jumlah', 'tahun_skema', 'tahun_pelaksanaan', 'tanggal_usulan', 'tanggal_review', 'tanggal_publikasi', 'dana_maksimal', 'jabatan_minimal', 'jabatan_maksimal', 'status'];

    static function firstSkema($id)
    {
        return SkemaUsulan::select('skema_usulan.id', 'skema_usulan.skema_id', 'skema.id as skemaKode_id', 'skema.kode', 'skema.nama', 'skema_usulan.jenis', 'skema_usulan.jumlah', 'skema_usulan.tahun_skema', 'skema_usulan.tahun_pelaksanaan', 'skema_usulan.tanggal_usulan', 'skema_usulan.tanggal_review', 'skema_usulan.tanggal_publikasi', 'skema_usulan.dana_maksimal', 'skema_usulan.jabatan_minimal', 'skema_usulan.jabatan_maksimal', 'skema_usulan.status', 'skema_usulan.created_at', 'skema_usulan.updated_at')
                            ->join('skema', 'skema_usulan.skema_id', 'skema.id')
                            ->firstWhere('skema_usulan.id', $id);
    }

    static function getSkema()
    {
        return SkemaUsulan::select('skema_usulan.id', 'skema_usulan.skema_id', 'skema.kode', 'skema.nama', 'skema_usulan.jenis', 'skema_usulan.jumlah', 'skema_usulan.tahun_skema', 'skema_usulan.tahun_pelaksanaan', 'skema_usulan.tanggal_usulan', 'skema_usulan.tanggal_review', 'skema_usulan.tanggal_publikasi', 'skema_usulan.dana_maksimal', 'skema_usulan.jabatan_minimal', 'skema_usulan.jabatan_maksimal', 'skema_usulan.status', 'skema_usulan.created_at', 'skema_usulan.updated_at')
                            ->join('skema', 'skema_usulan.skema_id', 'skema.id')
                            ->get();
    }

    static function getSkemaByJabatan($id)
    {
        $dosen = Dosen::firstDosen($id);

        return SkemaUsulan::select('skema_usulan.id', 'skema_usulan.skema_id', 'skema.kode', 'skema.nama', 'skema_usulan.jenis', 'skema_usulan.jumlah', 'skema_usulan.tahun_skema', 'skema_usulan.tahun_pelaksanaan', 'skema_usulan.tanggal_usulan', 'skema_usulan.tanggal_review', 'skema_usulan.tanggal_publikasi', 'skema_usulan.dana_maksimal', 'skema_usulan.jabatan_minimal', 'skema_usulan.jabatan_maksimal', 'skema_usulan.status', 'skema_usulan.created_at', 'skema_usulan.updated_at')
                            ->join('skema', 'skema_usulan.skema_id', 'skema.id')
                            ->where('skema_usulan.jabatan_minimal', '<=', $dosen->jabatan_id)
                            ->where('skema_usulan.jabatan_maksimal', '>=', $dosen->jabatan_id)
                            ->whereDate('skema_usulan.tanggal_review', '>=', Carbon::now())
                            ->get();
    }

    static function getSkemaPenelitian()
    {
        return SkemaUsulan::select('skema_usulan.id', 'skema_usulan.skema_id', 'skema.kode', 'skema.nama', 'skema_usulan.jenis', 'skema_usulan.jumlah', 'skema_usulan.tahun_skema', 'skema_usulan.tahun_pelaksanaan', 'skema_usulan.tanggal_usulan', 'skema_usulan.tanggal_review', 'skema_usulan.tanggal_publikasi', 'skema_usulan.dana_maksimal', 'skema_usulan.jabatan_minimal', 'skema_usulan.jabatan_maksimal', 'skema_usulan.status', 'skema_usulan.created_at', 'skema_usulan.updated_at')
                            ->join('skema', 'skema_usulan.skema_id', 'skema.id')
                            ->where('skema_usulan.jenis', 1)
                            ->get();
    }

    static function getSkemaPengabdian()
    {
        return SkemaUsulan::select('skema_usulan.id', 'skema_usulan.skema_id', 'skema.kode', 'skema.nama', 'skema_usulan.jenis', 'skema_usulan.jumlah', 'skema_usulan.tahun_skema', 'skema_usulan.tahun_pelaksanaan', 'skema_usulan.tanggal_usulan', 'skema_usulan.tanggal_review', 'skema_usulan.tanggal_publikasi', 'skema_usulan.dana_maksimal', 'skema_usulan.jabatan_minimal', 'skema_usulan.jabatan_maksimal', 'skema_usulan.status', 'skema_usulan.created_at', 'skema_usulan.updated_at')
                            ->join('skema', 'skema_usulan.skema_id', 'skema.id')
                            ->where('skema_usulan.jenis', 2)
                            ->get();
    }

    static function getSkemaKode($id)
    {
        return SkemaUsulan::select('skema_usulan.id', 'skema.kode')
                            ->join('skema', 'skema_usulan.skema_id', 'skema.id')
                            ->where('skema_usulan.jenis', $id)
                            ->get();
    }

    static function storeSkema($request)
    {
        $request->validate([
            'skema_id'          => 'numeric|required',
            'jenis'             => 'numeric|required',
            'jumlah'            => 'numeric|required',
            'tahun_skema'       => 'numeric|required',
            'tahun_pelaksanaan' => 'numeric|required',
            'tanggal_usulan'    => 'date|required',
            'tanggal_review'    => 'date|required',
            'tanggal_publikasi' => 'date|required',
            'status'            => 'numeric|required'
        ]);

        SkemaUsulan::create([
            'skema_id'          => $request->skema_id,
            'jenis'             => $request->jenis,
            'jumlah'            => $request->jumlah,
            'tahun_skema'       => $request->tahun_skema,
            'tahun_pelaksanaan' => $request->tahun_pelaksanaan,
            'tanggal_usulan'    => $request->tanggal_usulan,
            'tanggal_review'    => $request->tanggal_review,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'dana_maksimal'     => $request->dana_maksimal,
            'jabatan_minimal'   => $request->jabatan_minimal,
            'jabatan_maksimal'  => $request->jabatan_maksimal,
            'status'            => $request->status
        ]);
    }

    static function updateSkema($request, $id)
    {
        SkemaUsulan::whereId($id)->update([
            'skema_id'          => $request->skema_id,
            'jenis'             => $request->jenis,
            'jumlah'            => $request->jumlah,
            'tahun_skema'       => $request->tahun_skema,
            'tahun_pelaksanaan' => $request->tahun_penelitian,
            'tanggal_usulan'    => $request->tanggal_usulan,
            'tanggal_review'    => $request->tanggal_review,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'dana_maksimal'     => $request->dana_maksimal,
            'jabatan_minimal'   => $request->jabatan_minimal,
            'jabatan_maksimal'  => $request->jabatan_maksimal,
            'status'            => $request->status
        ]);
    }

    static function updateStatus($status, $id)
    {
        SkemaUsulan::whereId($id)->update(['status' => $status]);
    }
}
