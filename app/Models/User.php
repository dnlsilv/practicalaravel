<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable  implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = ['nombre', 'email', 'password']; 

    
    

    
}
