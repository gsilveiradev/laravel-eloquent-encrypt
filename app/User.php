<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Guissilveira\EloquentEncrypt\Encrypt;

class User extends Authenticatable
{
    use Notifiable;
    use Encrypt;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be encrypted.
     *
     * @var array
     */
    protected $encryptable = [
        'name'
    ];
}
