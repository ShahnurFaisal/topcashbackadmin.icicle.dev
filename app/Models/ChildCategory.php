<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function SubCategory(){
        return $this->belongsTo(SubCategory::class,'subCategory_id');
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
}
