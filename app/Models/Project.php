<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    public function purchase(){

        return $this->hasMany(Purchase::class,'project_id');
    }

    public function requisitions(){
        return $this->hasMany(RequisitionDetail::class,'project_id');
    }

    


}
