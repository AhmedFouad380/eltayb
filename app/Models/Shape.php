<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Shape extends Model
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
    public function Product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public  function Storage()
    {
        return $this->HasOne(Storage::class ,'shape_id')->withDefault([
            'quantity'=>0,
        ]);
    }
    public function InvoiceDetailt(){
        return $this->HasMany(InvoiceDetails::class ,'shape_id');
    }
    public  function StorageAvaliable()
    {
        return $this->hasOne(Storage::class ,'shape_id')->where('branch_id',1)
            ->withDefault([
                'sell_price'=>0,
            ]);
    }
    public function invoiceDetail(){
        return $this->hasMany(InvoiceDetails::class , 'shape_id');
    }
}
