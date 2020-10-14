<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;

    protected $table = 'usulan';
    protected $fillable = ['skema_usulan_id', 'jenis', 'judul', 'ringkasan', 'latar_belakang', 'tinjauan_pustaka', 'metode', 'daftar_pustaka', 'rumpun_ilmu_id', 'program', 'kategori_sbk', 'waktu', 'satuan_waktu_id', 'bidang_unggulan_pt', 'topik_unggulan_pt'];
}
