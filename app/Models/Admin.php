<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public function qrcodes(){
        return $this->hasMany(QRCode::class,'admin_id');
        }
        // public function offer(){
        //     return $this->belongsTo(Offer::class,'subCategory_id');
        // }
}
