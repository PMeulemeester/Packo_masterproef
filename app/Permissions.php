<?php
/**
 * Created by PhpStorm.
 * User: pieterm
 * Date: 13/02/15
 * Time: 14:26
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model{
    protected $table='permissions';

    public  $timestamps=false;

    public function role(){
        return $this->belongsTo("App\Roles");
    }

    public static function checkPermission($perm){
        return \DB::table("permissions")
            ->where("role_id","=",\Auth::user()->role_id)
            ->where("permission","=",$perm)
            ->exists();
    }
}