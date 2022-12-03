<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $table= 'receipts';


    protected $fillable = [
        'supplier_id',
        'created_by',
        'updated_by',
        'value',
        'reciever_name',
        'notes',
        'photo',
        'transfer_number',
        'cheque_number',
        'receipt_type',
        'payment_type',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public $timestamps = true;
    public function getPhotoAttribute($photo)
    {
        if (!empty($photo)) {
            return asset('uploads/Receipts') . '/' . $photo;
        }
        return "";
    }

    public function setPhotoAttribute($photo)
    {
        if (is_file($photo)) {
            $imageFields = upload($photo, 'Receipts');
            $this->attributes['photo'] = $imageFields;
        }
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class , 'supplier_id');
    }
    public function created_by(){
        return $this->belongsTo(Admin::class , 'created_by');
    }
    public function updated_by(){
        return $this->belongsTo(Admin::class , 'updated_by');
    }
}
