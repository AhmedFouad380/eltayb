<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;


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
}
