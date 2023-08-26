<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function offer(){
        return $this->hasMany(Offer::class);
    }
    public function financial(){
        return $this->hasMany(Financial::class);
    }
}
