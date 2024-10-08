<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function form() {
        return $this->hasOne( Form::class );
    }

    protected $fillable = [
        'des_country'
    ];
    
}
