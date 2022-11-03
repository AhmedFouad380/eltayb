<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Product extends Model
{
    use HasFactory;
    protected $appends = ['title','description'];

    public function getTitleAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_title;
        } else {
            return $this->en_title;
        }
    }

    public function getDescriptionAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_description;
        } else {
            return $this->en_description;
        }
    }
    public function Category(){
        return $this->belongsTo( Category::class ,'category_id')->withDefault([
            'name'=>''
        ]);
    }

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Product') . '/' . $image;
        }
        return null;

    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Product');
            $this->attributes['image'] = $imageFields;
        }
    }
    public function OrderDetails(){
        return $this->hasMany(OrderDetails::class,'product_id');
    }
    public function Storage(){
        return $this->hasMany(Storage::class,'product_id');
    }
    public function Images(){
        return $this->hasMany(ProductImages::class ,'product_id');
    }
    public function DefaultShape(){
        return $this->hasOne(Shape::class ,'product_id')->where('default',1)->withDefault([
            'price'=>50
        ])->with('StorageAvaliable');
    }

    public function Shapes(){
        return $this->hasMany(Shape::class ,'product_id');
    }

}
