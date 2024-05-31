<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'descriptions',
        // Add other attributes you want to be mass assignable here
    ];

    public function stock(){
        return $this->hasMany(TransactionType::class,'transaction_type_id');
    }
}
