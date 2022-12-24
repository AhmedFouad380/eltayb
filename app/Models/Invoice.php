<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table= 'invoices';

    protected $fillable = [
        'supplier_id',
        'num',
        'type',
        'total_price',
        'date',
        'image',
        'user_id',
        'client_id',
        'branch_id',
        'created_by',
        'update_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class , 'supplier_id');
    }
    public function invoicesDetails(){
        return $this->hasMany(InvoiceDetails::class , 'invoice_id');
    }
    public function additions(){
        return $this->hasOne(InvoiceAddition::class , 'invoice_id')->withDefault([
            'tax'=>0,
            'discount'=>0,
            'delivery_fees'=>0,
            'payment_type'=> 'visa',
        ]);
    }
    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
    public function client(){
        return $this->belongsTo(Client::class , 'client_id');
    }
    public function branch(){
        return $this->belongsTo(Branch::class , 'branch_id');
    }
    public function creator(){
        return $this->belongsTo(Admin::class , 'created_by');
    }
    public function updater(){
        return $this->belongsTo(Admin::class , 'updated_by');
    }
}
