<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table= 'clients';


    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

}
