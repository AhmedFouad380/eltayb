<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table= 'admins';


    protected $fillable = [
        'branch_id',
        'name',
        'email',
        'phone',
        'is_active',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public $timestamps = true;
    public function receipt(){
        return $this->hasMany(Receipt::class , 'created_by');
    }
    public function invoice(){
        return $this->hasMany(Invoice::class , 'created_by');
    }

    public function Branch(){
        return $this->belongsTo(Branch::class ,'branch_id')->withDefault([
            'id'=>'0'
        ]);
    }
}
