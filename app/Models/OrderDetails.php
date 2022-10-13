<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class OrderDetails extends Model
{
    use HasFactory;

    protected $appends = ['title','shape_title'];
    public function getTitleAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_title;
        } else {
            return $this->en_title;
        }
    }
    public function getShapeTitleAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_title_shape;
        } else {
            return $this->en_title_shape;
        }
    }

    public function Item(){
        return  $this->belongsTo(Product::class ,'product_id');
    }
    public function Shape(){
        return  $this->belongsTo(Shape::class ,'shape_id');
    }

}
