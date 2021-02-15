<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanRabBackup extends Model
{
    use HasFactory;

    protected $table = 'usulan_rab_backups';
    protected $fillable = ['usulan_id', 'rab_jenis_id', 'penggunaan', 'nama', 'item1', 'satuan1', 'item2', 'satuan2', 'item3', 'satuan3', 'harga', 'review'];
}
