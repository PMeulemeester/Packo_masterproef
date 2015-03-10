<?php namespace App\Http\Controllers;

use App\User;
use App\UserTanks;
use DebugBar\DebugBar;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(\Auth::user()->isAdmin())
			return redirect(\App::getLocale()."/admin/home");
		return view('home');
	}

	public function lang()
	{
		return redirect(\URL::to(\App::getLocale()."/home"));
	}
	public function getTankdetail($id){
		$user=\Auth::user();
		$uti=UserTanks::getUserTankInfo($user->id,$id);
		if($uti==null)
			\App::abort('404');
		return view('tankdetail',['user'=>$user,'tankid'=>$id,'usertankinfo'=>$uti]);
	}


}
