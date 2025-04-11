<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
     use  Notifiable;
    protected $primaryKey = 'UserId';

    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified',
        'verification_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }
    public function contacts(){
        return $this->hasMany(Contact::class, 'UserId', 'UserId');
    }
}
