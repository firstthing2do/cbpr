<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $fillable = ['UserId', 'name', 'email', 'phone_number', 'notes'];
    public function user(){
        return $this->belongsTo(User::class, 'UserId', 'UserId');
    }
    // public function getPhoneNumberAttribute($value)
    // {
    //     return '+250' . $value;
    // }
    // public function setPhoneNumberAttribute($value)
    // {
    //     $this->attributes['phone_number'] = ltrim($value, '+250');
    // }    
}
