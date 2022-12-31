<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;
    protected $table= 'expenses';

    protected $fillable = [
        'date',
        'price',
        'note',
        'expenses_type_id',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function expensesTypes(){
        return $this->belongsTo(ExpensesType::class , 'expenses_type_id');
    }
    public function admin(){
        return $this->belongsTo(Admin::class , 'admin_id');
    }
}
