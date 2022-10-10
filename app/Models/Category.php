<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    use HasFactory;

    protected $appends = ['title'];

    public function getTitleAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_title;
        } else {
            return $this->en_title;
        }
    }

    public function getIconAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Category') . '/' . $image;
        }
        return null;

    }

    public function setIconAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Category');
            $this->attributes['icon'] = $imageFields;
        }
    }
}
