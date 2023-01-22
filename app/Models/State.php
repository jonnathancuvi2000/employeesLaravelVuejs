<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'country_id',
        'name',
    ];
    // un estado pertenese a un solo pais 
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    // un estado va a tener varias ciudades
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
