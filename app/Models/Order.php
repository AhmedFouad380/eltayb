<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function OrderDetails(){
        return $this->HasMany(OrderDetails::class ,'order_id')->with(    'Shape');

    }
    public function User(){
        return $this->belongsTo(User::class ,'user_id');
    }

    public function Address(){
        return $this->belongsTo(Address::class ,'address_id');
    }
    public function coupon(){
        return $this->belongsTo(Coupon::class ,'coupon_id');
    }


}
