<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'qty',
        'uom_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function uom(){
        return $this->belongsTo(Uom::class,'uom_id');
    }
    public function transactionType(){
        return $this->belongsTo(TransactionType::class,'transaction_type_id');
    }
}

