<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class childCategory extends Model
{
    use HasFactory;

    public function subCat()
    {
        return $this->belongsTo(sub_category::class,'sub_cat_id','id');
    }
}
