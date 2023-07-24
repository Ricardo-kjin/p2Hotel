<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cedula',
        'address',
        'phone',
        'role',
        'admin_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeDesarrolladores($query){
        return $query->where('role','desarrollador');
    }
    public function scopeDesarrolladoresXAdmin($query,$id){
        return $query->where('role','desarrollador')->where('admin_id','=',$id);
    }
    public function scopeVendedorsXAdmin($query,$id){
        return $query->where('role','vendedor')->where('admin_id','=',$id);
    }
    public function scopeMonitorsXAdmin($query,$id){
        return $query->where('role','monitor')->where('admin_id','=',$id);
    }

    public function salas(){
         return $this->belongsToMany(Sala::class)->withTimestamps();
    }
    public function userSalas(){
         return $this->hasMany(Sala::class);
    }
}
