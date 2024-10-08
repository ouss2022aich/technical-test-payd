<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'id_cat',
        'id_type',
        'name'
    ];

    public function category (){
        return $this->belongsTo(FieldCategory::class);
    }

    
    public function type (){
        return $this->belongsTo(FieldType::class);
    }

    public function forms( ){
        return $this->belongsToMany(Form::class);
    }
}
