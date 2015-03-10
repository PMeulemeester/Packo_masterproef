<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'App\Http\Middleware\VerifyCsrfToken',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'App\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'App\Http\Middleware\RedirectIfAuthenticated',
		'admin_auth'	=>	'App\Http\Middleware\AdminGuardMiddleware'
	];
	public function handle($request)
	{
		try
		{
			return parent::handle($request);
		}
		catch(\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e)
		{
			return $this->app->make('Illuminate\Routing\ResponseFactory')->view('error.404', [], 404);
		}
		catch (Exception $e)
		{
			throw $e;
		}
	}
}
