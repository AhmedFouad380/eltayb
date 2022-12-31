<?php

namespace App\Models;

use App\Http\Controllers\Admin\ExpensesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesType extends Model
{
    use HasFactory;
    protected $table= 'expenses_types';

    protected $fillable = [
        'name',
        'admin_id',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function admin(){
        return $this->belongsTo(Admin::class , 'admin_id');
    }
    public function expenses(){
        return $this->hasMany(Expenses::class , 'expenses_type_id');
    }
}
