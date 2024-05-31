<?php


namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;

    protected $fillable = ['name', 'username', 'email', 'password', 'phone','status', 'address', 'role_id', 'status', 'department_id', 'photo'];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

   public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
     public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function requisitions(){
       return $this->hasMany(Requisition::class,'user_id');
    }

}

