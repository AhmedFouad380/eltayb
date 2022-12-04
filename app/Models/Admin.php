<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    public function receipt(){
        return $this->hasMany(Receipt::class , 'created_by');
    }
    public function Branch(){
        return $this->belongsTo(Branch::class ,'branch_id')->withDefault([
            'id'=>'0'
        ]);
    }
}
