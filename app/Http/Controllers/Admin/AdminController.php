<?php namespace App\Http\Controllers\Admin;

use App\Binary_row;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Talen;
use App\User;
use App\UserTanks;
use Illuminate\Http\Request;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('admin_auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getHome()
	{
		return view('admin.home');
	}
	public function getUser($id,$tankid)
	{
		$user=User::find($id);
		if($user==null){
			return \Redirect::home();
		}
		$uti=UserTanks::getUserTankInfo($user->id,$tankid);
		return view('admin.user',['user'=>$user,'tankid'=>$tankid,'usertankinfo'=>$uti]);
	}
	public function getTanks($id)
	{
		$user=User::find($id);

		if($user==null){
			return \Redirect::home();
		}
		return view('admin.tanks',['tanks'=>$user->tanks,'user'=>$user]);
	}

}
