<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','name', 'email', 'password', 'role_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token', 'role_id'];

	public function role(){
		return $this->belongsTo("App\Roles");
	}
	public function tanks(){
		return $this->belongsToMany('App\Tank_Sorts','user_tanks','user_id','tank_id');
	}
	public function isAdmin(){
		//return User::find(\Auth::user()->id)->role->role==='admin';
		return \Auth::user()->role->role==='admin';
	}
	public static function isUser($name){
		return User::where("name",$name)->get()->count()>0;
	}

	public static function getUserId($name){
		$user=User::where("name",$name)->first();
		return $user->id;
	}
}
