<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'content';
    protected $fillable = ['jenis', 'judul', 'katakunci','foto','content','flag_delete'];

    static function destroyPengumuman($id)
    {
        Pengumuman::whereId($id)->delete();
    }

    static function firstPengumuman($id)
    {
        $pengumuman = Pengumuman::whereId($id)->first();
        $pengumuman['foto'] = PengumumanFoto::getPhotos($id);

        return $pengumuman;
    }

    static function getPengumuman()
    {
        return Pengumuman::where('jenis', 4)
                            ->orderByDesc('created_at')
                            ->get();
    }

    static function getAllPengumuman()
    {
        return Pengumuman::all();
    }

    static function storePengumuman($request)
    {
        $pengumuman = Pengumuman::create([
            'jenis'     => $request->jenis,
            'judul'     => $request->judul,
            'katakunci' => $request->katakunci,
            'content'   => $request->content
        ]);

        PengumumanFoto::storePhotos($request, $pengumuman->id);
    }

    static function updatePengumuman($request, $id)
    {
        Pengumuman::whereId($id)->update([
            'jenis'     => $request->jenis,
            'judul'     => $request->judul,
            'katakunci' => $request->katakunci,
            'content'   => $request->content
        ]);

        PengumumanFoto::storePhotos($request, $id);
    }
}
