<?php

namespace App\Traits\Guissilveira\EloquentEncrypt;

use Illuminate\Support\Facades\Crypt;

/**
 * Application class for Encrypt
 *
 * Can be used togheter with Eloquent models do encrypt data into database
 */
trait Encrypt
{
    /**
     * Override getAttribute from Model class.
     *
     * If the attribute is in the $encryptable var then decrypt the attribute and return
     *
     * @return mixed The attribute value
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable)) {
            $value = Crypt::decrypt($value);
        }

        return $value;
    }

    /**
     * Override setAttribute from Model class.
     *
     * If the attribute is in the $encryptable var then encrypt the attribute and
     * call the parent method.
     *
     * @param string $key
     * @param mixed  $value
     */
    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $value = Crypt::encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }

    /**
     * Override attributesToArray from Model class.
     *
     * If each attribute is in the $encryptable var then decrypt the attribute and return
     *
     * @return array The attributes array
     */
    public function attributesToArray()
    {
        $attributes = parent::attributesToArray(); // call the parent method

        foreach ($this->encryptable as $key) {
            if (isset($attributes[$key])) {
                $attributes[$key] = Crypt::decrypt($attributes[$key]);
            }
        }

        return $attributes;
    }
}
