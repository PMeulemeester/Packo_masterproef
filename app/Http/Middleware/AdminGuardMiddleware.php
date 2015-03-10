<?php namespace App\Http\Middleware;

use App\User;
use Closure;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class AdminGuardMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(\Auth::check() && User::find(\Auth::user()->id)->isAdmin()) {
			return $next($request);
		}
		return redirect(\App::getLocale().'/home');
	}

}
