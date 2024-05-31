<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function uom() {
        return $this->belongsTo(Uom::class);
    }

    public function stock(){
        return $this->hasMany(Stock::class,'product_id');
    }

    public function stockAdjustment(){
        return $this->hasMany(StockAdjustment::class,'product_id');
    }

    public function requisitons(){
        return $this->hasMany(RequisitionDetail::class,'product_id');
    }

    public function purchaseDetails(){
        return $this->hasMany(PurchaseDetail::class,'product_id');
    }

}
