<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id',
        'name',
    ];
    // una ciudad pertenece a un solo estado 
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    
}
