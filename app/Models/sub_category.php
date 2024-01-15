<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(category::class, 'cat_id', 'id');
    }

    // for child category
    public function childcategory()
    {
        return $this->hasMany(childCategory::class, 'sub_cat_id', 'id');
    }
}
