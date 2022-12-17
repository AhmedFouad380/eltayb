<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    public function Product(){
        return $this->belongsTo(Product::class ,'product_id')->withDefault([
            'ar_title'=>'',
        ]);
    }
    public function Shape(){
        return $this->belongsTo(Shape::class ,'shape_id')->withDefault([
            'ar_title'=>'',
        ]);
    }
    public function Branch(){
        return $this->belongsTo(Branch::class ,'branch_id')->withDefault([
            'id'=>'0'
        ]);
    }
}
