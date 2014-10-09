<?php namespace Koalabs\Evento\Facades;

use Illuminate\Support\Facades\Facade;

class Evento extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'evento';
  }
  
}