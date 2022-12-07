<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceAddition extends Model
{
    use HasFactory;
    protected $table= 'invoice_additions';

    protected $fillable = [
        'tax',
        'delivery_fees',
        'discount',
        'coupon_id',
        'invoice_id',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function coupon(){
        return $this->belongsTo(Coupon::class , 'coupon_id');
    }
    public function invoice(){
        return $this->belongsTo(Invoice::class , 'invoice_id');
    }
}
