<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    use HasFactory;
    protected $table = 'qrcodes';
    protected $guarded = [];

    public function admins()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}

