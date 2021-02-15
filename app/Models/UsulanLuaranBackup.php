<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanLuaranBackup extends Model
{
    use HasFactory;

    protected $table = 'usulan_luaran_backups';
    protected $fillable = ['usulan_id', 'tahun', 'luaran_luaran_id', 'luaran_target_id', 'jumlah', 'keterangan', 'review'];
}
