<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UsulanBerkasBackup extends Model
{
    use HasFactory;

    protected $table = 'usulan_berkas_backups';
    protected $fillable = ['usulan_id', 'jenis_berkas_id', 'berkas', 'keterangan', 'review'];

    static function latestBerkasJenis($jenis, $usulanId)
    {
        return UsulanBerkasBackup::where('usulan_id', $usulanId)
                            ->where('jenis_berkas_id', $jenis)
                            ->latest()
                            ->first();
    }

    static function storeBerkas($request, $jenisBerkasId, $revisi)
    {
        $jenis = JenisBerkas::firstBerkas($jenisBerkasId);

        $path = 'berkas/'.$request[0]->usulan_id.'/'.strtolower(Str::of($jenis->nama));
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        
        $newFile = $path.'/'.Str::of($jenis->nama)->replace(' ', '-').'-'.$revisi.'.pdf';
        $fileMoved = rename($request[$jenisBerkasId-1]->berkas, $newFile);

        UsulanBerkasBackup::create([
            'usulan_id'         => $request[0]->usulan_id,
            'jenis_berkas_id'   => $jenisBerkasId,
            'berkas'            => $newFile,
            'review'            => $revisi
        ]);
    }
}
