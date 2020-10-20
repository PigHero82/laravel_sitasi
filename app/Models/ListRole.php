<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListRole extends Model
{
    use HasFactory;

    protected $table = 'list_roles';
    protected $fillable = ['user_id', 'role_id'];
    public $timestamps = false;

    static function deleteRole($request)
    {
        ListRole::where('user_id', $request->dosen_id)->delete();
    }

    static function firstRole($id, $roleId)
    {
        return ListRole::select('list_roles.id', 'roles.description')
                        ->leftJoin('roles', 'list_roles.id', 'roles.id')
                        ->where('list_roles.user_id', $id)
                        ->where('list_roles.role_id', $roleId)
                        ->get();
    }

    static function getRole($id)
    {
        return ListRole::select('list_roles.role_id as id', 'roles.description')
                        ->leftJoin('roles', 'list_roles.role_id', 'roles.id')
                        ->where('list_roles.user_id', $id)
                        ->get();
    }

    static function updateRole($request)
    {
        ListRole::deleteRole($request);

        foreach ($request->role as $role) {
            ListRole::create([
                'user_id' => $request->dosen_id,
                'role_id' => $role
            ]);
        }
    }
}
