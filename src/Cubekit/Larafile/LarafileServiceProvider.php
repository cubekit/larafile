<?php namespace Cubekit\Larafile;

use Illuminate\Support\ServiceProvider;

class LarafileServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/config.php' => config_path('cubekit/larafile.php'),
        ]);
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton(
            'Cubekit\Larafile\Contracts\FileUploader',
            'Cubekit\Larafile\DefaultFileUploader'
        );

		$this->app->singleton(
            'Cubekit\Larafile\Contracts\NameBuilder',
            'Cubekit\Larafile\DefaultNameBuilder'
        );

		$this->app->bind(
            'Cubekit\Larafile\Contracts\FilePresenter',
            'Cubekit\Larafile\DefaultFilePresenter'
        );
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
