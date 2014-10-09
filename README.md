# Laravel Evento

Dead simple event management for your Laravel application. This is just *our* way of managing events. Use with care.

*NOTE: Most of the code is inspired on Jeffrey Way's awesome Laracasts series*.


## Installation
You know this one already.

In your application's root directory, open up the *composer.json* file and add the package to the `require` section so it looks like this:

```php
"require": {
    "koalabs/evento": "1.*"
},
```

Open the command line, and in the root ot our application, run the Composer update like this:

```
php composer.phar update
```

Now let's add the Evento Service Provider. Open the *app/config/app.php* file and in the `providers` array, add the following line:

```php
'Koalabs\Evento\EventoServiceProvider'
```

Optionally, you may want to add the Facade for beautiful Laravel-friendly semantics. In your `aliases` array in the same app configuration file, add:

```php
'Evento' => 'Koalabs\Evento\Facades\Evento'
```

## Usage
The way I imagine myself using this is directly on the controllers. Using it alongside a repository pattern or even in your models is also valid.
