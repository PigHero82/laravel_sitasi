<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    protected $table = 'role_user';
    protected $fillable = ['role_id', 'user_id'];
    public $timestamps = false;

    static function updateRole($id, $roleId)
    {
        RoleUser::where('user_id', $id)->update(['role_id' => $roleId]);
    }
}
