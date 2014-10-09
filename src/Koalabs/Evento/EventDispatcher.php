<?php namespace Koalabs\Evento;

use Illuminate\Events\Dispatcher;
use Illuminate\Log\Writer as LogWriter;

class EventDispatcher {

  /**
   * @var Illuminate\Events\Dispatcher
   */
  protected $dispatcher;

  /**
   * @var Illuminate\Log\Writer
   */
  protected $log;


  /**
   * Instantiate the EventManager
   * 
   * @param Dispatcher $dispatcher
   * @param LogWriter  $log
   */
  public function __construct(Dispatcher $dispatcher, LogWriter $log)
  {
    $this->log        = $log;
    $this->dispatcher = $dispatcher;
  }


  /**
   * Fire and log an event
   *
   * @return void
   */
  public function fire($event)
  {
    $eventName = $this->getEventName($event);

    $this->dispatcher->fire($eventName, $event);

    $this->log->info("Event [$eventName] was fired");
  }


  /**
   * Make the fired event name look more object-oriented.
   *
   * @param $event
   * @return string
   */
  protected function getEventName($event)
  {
    return str_replace('\\', '.', get_class($event));
  }

}