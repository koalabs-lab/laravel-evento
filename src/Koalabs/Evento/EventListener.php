<?php namespace Koalabs\Evento;

use ReflectionClass;

class EventListener {

  /**
   * Handle the event
   *
   * @param  $event
   * @return mixed
   */
  public function handle($event)
  {
    $eventName = $this->getEventName($event);

    if ($this->listenerIsRegistered($eventName))
    {
      return call_user_func([$this, 'when'.$eventName], $event);
    }
  }

  /**
   * Get Event name
   * 
   * @param  Event $event
   * @return string
   */
  protected function getEventName($event)
  {
    return (new ReflectionClass($event))->getShortName();
  }

  /**
   * Check if listener exists
   * 
   * @param  string $eventName
   * @return bool
   */
  protected function listenerIsRegistered($eventName)
  {
    $method = "when{$eventName}";

    return method_exists($this, $method);
  }
}