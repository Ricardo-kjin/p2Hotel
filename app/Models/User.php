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
        'phone',
        'role',
        'provincia_id',
        'user_id'

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
        return $query->where('role','recepcionista')->where('admin_id','=',$id);
    }
    public function scopeMonitorsXAdmin($query,$id){
        return $query->where('role','monitor')->where('admin_id','=',$id);
    }
    public function scopeClientesXAdmin($query,$id){
        return $query->where('role','cliente')->where('admin_id','=',$id);
    }





    //PARTE DE CHATGPT

    public function scopeRecepcionistas($query){
        return $query->where('role','recepcionista');
    }

    public function scopeClientes($query){
        return $query->where('role','cliente');
    }

    public function provincia()
    {
        return $this->belongsTo(Provincias::class, 'provincia_id');
    }

    public function role()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function imagen()
    {
        return $this->hasOne(Imagen::class, 'user_id');
    }

    public function reservasRecepcionista()
    {
        return $this->hasMany(Reservas::class, 'user1_id', 'id');
    }

    public function reservasCliente()
    {
        return $this->hasMany(Reservas::class, 'user2_id', 'id');
    }

    public function reservas()
    {
        return $this->hasMany(Reservas::class);
    }
}
