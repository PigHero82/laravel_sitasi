<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PengumumanFoto extends Model
{
    use HasFactory;

    protected $table = 'content_photos';
    protected $fillable = ['content_id', 'foto', 'keterangan', 'status'];

    static function destroyPhoto($photo)
    {
        PengumumanFoto::whereId($photo->id)->delete();
        unlink($photo->foto);
    }

    static function getPhotos($id)
    {
        return PengumumanFoto::where('content_id', $id)->get();
    }

    static function storePhotos($request, $id)
    {
        foreach ($request->foto as $key => $foto) {
            $img = Carbon::now()->toDateString() . '-' . Str::of(Carbon::now()->toTimeString())->replace(':', '-') . '-' . Str::random(8);

            PengumumanFoto::create([
                'content_id'    => $id,
                'foto'          => $foto->storeAs('berkas/pengumuman', $img . '.' . $foto->getClientOriginalExtension()),
                'status'        => 1
            ]);
        }
    }
}
