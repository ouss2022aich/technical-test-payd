<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    public function country( ){
        return $this->belongsTo( Country::class );
    }

    public function users( ){
        return $this->hasMany(User::class);
    }

    public function fields( ){
        return $this->belongsToMany(Field::class);
    }
    
   
}
