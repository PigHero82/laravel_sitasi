<?php

namespace App\Models;

use App\Models\JenisBerkas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UsulanBerkas extends Model
{
    use HasFactory;

    protected $table = 'usulan_berkas';
    protected $fillable = ['usulan_id', 'jenis_berkas_id', 'berkas', 'keterangan'];

    static function firstBerkasPernyataanMitra($id, $usulanId)
    {
        return UsulanBerkas::firstWhere('berkas', 'like', 'berkas/' . $usulanId . '/' . $id . '%');
    }

    static function getBerkas($usulanId)
    {
        return UsulanBerkas::where('usulan_id', $usulanId)->get();
    }

    static function storeBerkas($request, $jenisBerkasId)
    {
        $jenis = JenisBerkas::firstBerkas($jenisBerkasId);

        UsulanBerkas::create([
            'usulan_id'         => $request->usulan_id,
            'jenis_berkas_id'   => $jenisBerkasId,
            'berkas'            => $request->file('surat_path')->storeAs('berkas/' . $request->usulan_id, (Str::of($jenis->nama)->replace(' ', '-') . "." . $request->file('surat_path')->getClientOriginalExtension()))
        ]);
    }

    static function storeBerkasWithId($request, $jenisBerkasId, $mitraId)
    {
        $jenis = JenisBerkas::firstBerkas($jenisBerkasId);

        UsulanBerkas::create([
            'usulan_id'         => $request->usulan_id,
            'jenis_berkas_id'   => $jenisBerkasId,
            'berkas'            => $request->file('surat_path')->storeAs('berkas/' . $request->usulan_id . '/' . $mitraId, (Str::of($jenis->nama)->replace(' ', '-') . "." . $request->file('surat_path')->getClientOriginalExtension()))
        ]);
    }
}
