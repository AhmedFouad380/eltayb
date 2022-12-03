<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table= 'branches';


    protected $fillable = [
        'ar_name',
        'en_name',
        'phone',
        'phone_nd',
        'address',
        'notes',
        'active',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public $timestamps = true;
}
