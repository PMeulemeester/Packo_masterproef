<?php namespace App\Http\Controllers\Register;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Permissions;
use Illuminate\Http\Request;

class RegisterController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getUser()
	{
		if(!Permissions::checkPermission("User Create")){
			return redirect(\URL::route("home"));
		}
		return View('register.user');
	}

	public function postUser(Request $request)
	{
		return View('register');
	}
	public function getAdmin()
	{
		if(!Permissions::checkPermission("Admin Create")){
			return redirect(\URL::route("home"));
		}
		return View('register.admin');
	}

	public function postAdmin(Request $request)
	{
		return View('register');
	}
	public function getDealer()
	{
		if(!Permissions::checkPermission("Dealer Create")){
			return redirect(\URL::route("home"));
		}
		return View('register.dealer');
	}

	public function posDealer(Request $request)
	{
		return View('register');
	}

}
