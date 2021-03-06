<?php namespace Koalabs\Evento;

use Illuminate\Support\ServiceProvider;

class EventoServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerFacadeAccess();
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['evento'];
	}

	protected function registerFacadeAccess()
	{
		$this->app->bind('evento', 'Koalabs\Evento\EventDispatcher');
	}

}
