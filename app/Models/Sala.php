<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
