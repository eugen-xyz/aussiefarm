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
        'birthday',
        'status',
    ];

    protected $casts = [
        'birthday' => 'date',
    ];

    protected $appends = ['edit'];

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function getNicknameAttribute($value)
    {
        return ucwords($value);
    }

    public function getColorAttribute($value)
    {
        return ucwords($value);
    }

    public function getGenderAttribute($value)
    {
        return ucwords($value);
    }

    public function getFriendlinessAttribute($value)
    {
        return ucwords($value);
    }


    public function getBirthdayAttribute($value)
    {
        return date_format(date_create($value),"M d, Y");
    }

    public function getEditAttribute()
    {
        $petId = $this->where('pet_id', $this->pet_id)->first();
        
        return route('pet.edit', $petId);
    }

    
    public function scopeOrderByName($query, $order)
    {
        return $query->orderBy('name', $order);
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }


    public function scopeGender($query, $gender)
    {
        return $query->where('gender', $gender);
    }



    
}
