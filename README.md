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

Open the command line, and in the root of your application, run the Composer update like this:

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
The way I picture myself using this is directly on the controllers. Using it alongside a repository pattern or even in your models is also valid.

Now imagine you were creating an application for managing a podcasts directory.
You'd have a `PodcastsController` with all the usual CRUD methods. For the sake of simplicity, let's only look at the `store` method. It could look something like this:

```php
/**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
public function store()
{
    $input = Input::only('title', 'subtitle', 'author');

    $podcast = Podcast::create($input);

    Evento::fire(new PodcastAdded($podcast));
}
  ```

Now it is most likely you'll want to create a folder in which to keep all your events. I'd call this the *Events* folder. The `PodcastAdded` class is an example for how to name your events inside that folder.

### Listening for the events
After raising the events, you will then want to listen to them. For this, Evento provides you with a handy class: **EventListener**. To use it you'll simply have to extend it:

```php
<?php namespace Podcasts\Listeners;

use Koalabs\Evento\EventListener;
use Podcasts\Events\PodcastAdded;

class EmailNotifier extends EventListener {

  public function whenPodcastAdded(PodcastAdded $podcast)
  {
    // Do some stuff here
  }

}
```

It's important to note the naming convention: **Every method handling an event has to start with the word `when`**.