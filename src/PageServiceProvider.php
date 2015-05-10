<?php namespace Jai\Page;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Route;
use Illuminate\Translation;
use Illuminate\Foundation;

class PageServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot()
	{

		// Publish your migrations
		$this->publishes([__DIR__ . '/../database/migrations/' => database_path('/migrations')], 'migrations');


		//	$this->loadViewsFrom(realpath(__DIR__ . '/../views'), 'blog');
	//	$this->setupRoutes($this->app->router);

	//	$this->publishes([__DIR__ . '/config/blog.php' => config_path('blog.php'),]);

	//	$this->loadTranslationsFrom(base_path() . '/vendor/zofe/rapyd/lang', 'rapyd');

	//	AliasLoader::getInstance()->alias('idblog', 'Jai\Blog');

	//	$this->loadTranslationsFrom(base_path() . '/packages/jai/blog/lang', 'panel');
	//	$this->loadTranslationsFrom(base_path() . '/vendor/zofe/rapyd/lang', 'rapyd');
		//$this->package('jai/Blog',null, __DIR__); //  this  has to be specified for psr-4  compatibility
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		// register  zofe\rapyd
	//	$this->app->register('Zofe\Rapyd\RapydServiceProvider');
		// register html service provider
		$this->app->register('Jai\Backend\BackendServiceProvider');

		/*
		 * Create aliases for the dependency.
		 */
//		$loader = AliasLoader::getInstance();
//		$loader->alias('Form', 'Illuminate\Html\FormFacade');
//		$loader->alias('Html', 'Illuminate\Html\HtmlFacade');


		$this->registerPage();
		//config(['config/blog.php',]);

		//$this->publishes([__DIR__ . '/../public' => public_path('packages/jai/blog')], 'assets');


		///$this->package('jai/Blog');
	}

	private function registerPage()
	{

		$this->app->bind('page', function ($app) {
			return new Page($app);
		});
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 *
	 * @return void
	 */
	public function setupRoutes(Router $router)
	{
		$router->group(['namespace' => 'Jai\Page\Http\Controllers'], function ($router) {
			require __DIR__ . '/Http/routes.php';
		});
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
