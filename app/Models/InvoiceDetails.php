<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    protected $table= 'invoice_additions';

    protected $fillable = [
        'sell_price',
        'purchase_price',
        'quantity',
        'add_to_storage',
        'shape_id',
        'invoice_id',
        'product_id',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function product(){
        return $this->belongsTo(Product::class , 'product_id');
    }
    public function shape(){
        return $this->belongsTo(Shape::class , 'shape_id');
    }
    public function coupon(){
        return $this->belongsTo(Coupon::class , 'coupon_id');
    }
    public function invoice(){
        return $this->belongsTo(Invoice::class , 'invoice_id');
    }
}
