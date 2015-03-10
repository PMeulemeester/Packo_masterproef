<?php
/**
 * Created by PhpStorm.
 * User: pieterm
 * Date: 27/02/15
 * Time: 11:58
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class UserTanks extends Model{

    protected $table='user_tanks';

    public  $timestamps=true;


    public static function getUserTankInfo($userid,$tankid){
        return UserTanks::where('user_id',$userid)->where('tank_id',$tankid)->first();
    }
}