<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanRab extends Model
{
    use HasFactory;

    protected $table = 'usulan_rab';
    protected $fillable = ['urutan_tahun', 'rab_jenis_id', 'penggunaan', 'nama', 'item1', 'satuan1', 'item2', 'satuan2', 'item3', 'satuan3', 'harga'];
}
