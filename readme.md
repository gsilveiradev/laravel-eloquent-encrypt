# Laravel Eloquent Encrypt

This project was built with Laravel Framework 5.3.

## Install the Project

Clone repository and then do the composer install:

```bash
composer install
```

Configure your ```.env``` file (copy from ```.env.example```). Do not forget to create a MySQL database and configure it in .env file.

### Migrations

All the entities and tables are represented by Models and are created in db with Laravel migrations.

Models are in:

```
app/
   > User.php
   > Profile.php
```

Migrations are in:

```
database/migrations/*
```

Run migrations and Seed (to create a dummy data)

```bash
php artisan migrate:refresh --seed
```

### Routes

All the routes of this api are in ```routes/api.php```.

Real examples:

```
POST http://localhost:8000/api/authentication/
GET http://localhost:8000/api/profiles/ (protected URL, token must be present)
```

### Run and enjoy

Run the serve command to test the Api endpoints on Postman:

```bash
php artisan serve
```

## Solving the problem

Created a Trait responsible for override the Model.class set and get Attributes to do the encrypt/decrypt.

```
App/Traits/Guissilveira/EloquentEncrypt/Encrypt.php
```

Use case example in models:

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Guissilveira\EloquentEncrypt\Encrypt;

class Mymodel extends Model
{
    use Encrypt;

    /**
     * The attributes that should be encrypted.
     *
     * @var array
     */
    protected $encryptable = [
        'name'
    ];
}
```