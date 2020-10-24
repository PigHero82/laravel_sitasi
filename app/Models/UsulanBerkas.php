<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanBerkas extends Model
{
    use HasFactory;

    protected $table = 'usulan_berkas';
    protected $fillable = ['usulan_id', 'jenis_berkas_id', 'berkas', 'keterangan'];
}
