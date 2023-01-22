<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'country_code',
        'name',
    ];
    // un pais va a tener varios estados
    public function states()
    {
        return $this->hasMany(State::class);
    }
}
