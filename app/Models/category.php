<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public function subcategory()
    {
        return $this->hasMany(sub_category::class,'cat_id','id');
    }

    public function product()
    {
        return $this->hasMany(product::class,'cat_id','id');
    }
}
