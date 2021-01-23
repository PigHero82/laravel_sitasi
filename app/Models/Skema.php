<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    use HasFactory;

    protected $table = 'skema';
    protected $fillable = ['kode', 'nama', 'jenis'];

    static function destroySkema($id)
    {
        Skema::whereId($id)->delete();
    }

    static function getSkema()
    {
        return Skema::all();
    }

    static function getSkemaJenis($id)
    {
        return Skema::where('jenis', $id)->get();
    }

    static function firstSkema($id)
    {
        return Skema::findOrFail($id);
    }

    static function storeSkema($request)
    {
        Skema::create([
            'kode'  => $request->kode,
            'nama'  => $request->nama,
            'jenis' => $request->jenis
        ]);
    }

    static function updateSkema($request)
    {
        Skema::whereId($request->id)->update([
            'kode'  => $request->kode,
            'nama'  => $request->nama,
            'jenis' => $request->jenis
        ]);
    }
}
