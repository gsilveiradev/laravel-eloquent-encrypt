<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Guissilveira\EloquentEncrypt\Encrypt;

class Profile extends Model
{
    use Encrypt;

    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes that should be encrypted.
     *
     * @var array
     */
    protected $encryptable = [
        'name',
        'telephone',
        'social_number',
        'dummy_encrypted'
    ];
}
