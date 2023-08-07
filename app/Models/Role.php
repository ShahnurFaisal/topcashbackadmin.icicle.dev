<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Define the relationship with permissions
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    // Define a method to assign a permission to a role
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
