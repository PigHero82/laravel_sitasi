<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nidn',
        'password',
        'profile_photo_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param string|array $roles
     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || 
                    abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) || 
                abort(401, 'This action is unauthorized.');
    }
    
    /**
     * Check multiple roles
     * @param array $roles
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
     * Check one role
     * @param string $role
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    static function firstUser($id)
    {
        $data = User::select('users.id', 'users.nidn', 'users.profile_photo_path', 'dosen.nama')
                    ->join('dosen', 'users.nidn', 'dosen.nidn')
                    ->findOrFail($id);
        $data['roles'] = ListRole::where('user_id', $id)
                                ->select('roles.id', 'roles.description')
                                ->join('roles', 'list_roles.role_id', 'roles.id')
                                ->get();
        return $data;
    }

    static function firstUserReviewer()
    {
        return User::select('users.id', 'users.nidn')
                    ->join('list_roles', 'users.id', 'list_roles.user_id')
                    ->where('list_roles.role_id', 6)
                    ->inRandomOrder()
                    ->first();
    }

    static function getUser()
    {
        $user = User::all();
        $data = [];
        if ($user->isNotEmpty()) {
            foreach ($user as $key => $value) {
                $data[$key] = User::select('users.id', 'users.nidn', 'users.profile_photo_path', 'dosen.nama', 'jabatan.nama as jabatan')
                                    ->join('dosen', 'users.nidn', 'dosen.nidn')
                                    ->join('jabatan', 'jabatan.id', 'dosen.jabatan_id')
                                    ->findOrFail($value->id);

                $data[$key]['roles'] = ListRole::where('user_id', $value->id)
                                                ->select('roles.id', 'roles.description')
                                                ->join('roles', 'list_roles.role_id', 'roles.id')
                                                ->get();
            }
       
          
        }
       
        return $data;
    }

    static function storeUser($request)
    {
        $user = User::create([
            'nidn'                  => $request->nidn,
            'password'              => Hash::make($request->password)
        ]);
        
        foreach ($request->role as $key => $value) {
            $user->roles()->attach($value);
            ListRole::insert([
            'role_id' => $value,
            'user_id' => $user->id
            ]);
        }
        
    }

    static function updateNidn($newNidn, $oldNidn)
    {
        User::where('nidn', $oldNidn)->update(['nidn' => $newNidn]);
    }

    static function updatePhotoProfile($request, $id)
    {
        User::whereId($id)->update([
            'profile_photo_path' => $request->file('profile_photo_path')->storeAs('berkas/foto', (Auth::user()->nidn . "." . $request->file('profile_photo_path')->getClientOriginalExtension()))
        ]);
    }
}
