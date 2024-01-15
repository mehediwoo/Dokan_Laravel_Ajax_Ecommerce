<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    public function shipping()
    {
        return $this->belongsTo(shipping::class,'shipping_id','id');
    }
    public function product()
    {
        return $this->belongsTo(product::class,'product_id','id');
    }
}
