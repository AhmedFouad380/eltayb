<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function Product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function Shape(){
        return $this->belongsTo(Shape::class,'shape_id')->with('StorageAvaliable');
    }



}
