<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Permissions\HasPermissionsTrait;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    // relationship order
    public function order(){
        return $this->hasMany(Order::class);
    }
    // public static function getPermissionGroups(){

    //     $permission_group = DB::table('permissions')
    //         ->select('group_name')
    //         ->groupBy('group_name')
    //         ->get();
    //     return $permission_group;
    // }
    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);

    // }
    // public function qrcodes(){
    // return $this->hasMany(Qrcode::class);
    // }

}
