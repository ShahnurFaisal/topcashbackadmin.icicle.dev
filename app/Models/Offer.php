<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'subCategory_id');
    }
    public function merchant(){
        return $this->hasMany(Merchant::class,'offer_id');
    }
}
