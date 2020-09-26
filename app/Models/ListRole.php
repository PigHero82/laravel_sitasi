<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListRole extends Model
{
    use HasFactory;

    protected $table = 'list_roles';
    protected $fillable = ['user_id', 'role_id'];
}
