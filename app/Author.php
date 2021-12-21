<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Author extends Authenticable
{
    use Notifiable;

    protected $guard = 'author';

    protected $fillable = [
        'username', 'email', 'username', 'password','email_verfied_at'
    ];

    protected $hidden = ['password'];
}
