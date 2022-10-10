<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Setting extends Model
{
    use HasFactory;
    protected $appends =['name'];
    public function getNameAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_name;
        } else {
            return $this->en_name;
        }
    }


    public function getLogoAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Setting') . '/' . $image;
        }
        return null;

    }

    public function setLogoAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Setting');
            $this->attributes['logo'] = $imageFields;
        }
    }
}
