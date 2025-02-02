<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;

    public function details()
{
    return $this->hasMany(RequisitionDetail::class);
}

public function requisitionItems(){
        return $this->hasMany(RequisitionDetail::class);
}

public function user(){
        return $this->belongsTo(User::class,'user_id');
}


}
