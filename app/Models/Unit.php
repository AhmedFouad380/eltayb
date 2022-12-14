<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Unit extends Model
{
    use HasFactory;
    protected $table= 'units';


    protected $fillable = [
        'ar_name',
        'en_name',
        'active',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function products(){
        return $this->hasMany(Product::class,'unit_id');
    }
}
