<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumpunIlmu extends Model
{
    use HasFactory;

    protected $table = 'rumpun_ilmu';
    protected $fillable = ['kode', 'rumpun', 'sub'];

    static function getRumpunIlmuLevel1()
    {
        return RumpunIlmu::whereNull('sub')->get();
    }

    static function getRumpunIlmuLevel2($kode)
    {
        $data = RumpunIlmu::firstWhere('kode', $kode);
        if (isset($data)) {
            $data['sub'] = RumpunIlmu::where('sub', $kode)->get();
        }

        return $data;
    }

    static function getRumpunIlmuLevel3($kode1, $kode2)
    {
        return RumpunIlmu::whereNull('sub')->get();
    }
}
