<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table        = 'pets';
    protected $primaryKey   = 'pet_id';
    protected $fillable     = [
        'name', 
        'nickname', 
        'weight', 
        'height', 
        'gender', 
        'color', 
        'friendliness', 
        'birthday'
    ];

    protected $casts = [
        'birthday' => 'date',
    ];

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    // public function setNameAttribute($value)
    // {
    //     $this->attribute['name']  = ucwords($value);
    // }
}
