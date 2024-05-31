<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
    use HasFactory;


    public function stock(){
        return $this->hasMany(Stock::class,'uom_id');
    }

    public function stockAdjustment(){
        return $this->hasMany(StockAdjustment::class,'uom_id');
    }

    public function purchaseDetails(){
        return $this->hasMany(PurchaseDetail::class,'uom_id');
    }

}
