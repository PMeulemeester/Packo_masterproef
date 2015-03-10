<?php
/**
 * Created by PhpStorm.
 * User: pieterm
 * Date: 20/02/15
 * Time: 21:52
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class Binary_row extends Model{
    protected $table='binary_row';

    public  $timestamps=false;

    public function user(){
        return $this->belongsTo("App\User");
    }
    public function tank(){
        return $this->belongsTo("App\Tank_Sorts");
    }
    public static function getRows($id,$filename,$tankid){
        return Binary_row::where("user_id","=",$id)->where("filename","=",$filename)->where("tank_id","=",$tankid)->select('date','type','temp','active_process','active_electric_component','temp_difference','event_process','error')->get();
    }
    public static function insertRows($name,$filename,$arr,$tank){
        $userid=User::getUserId($name);
        Binary_row::where("filename","=",$filename)->where("user_id","=",$userid)->delete();
        foreach($arr as $val){
            Binary_row::insert(array(
               'user_id'=>$userid,
                'date'=>$val["date"],
                'type'=>$val["type"],
                'temp'=>$val["temp"],
                'active_process'=>$val["active_process"],
                'active_electric_component'=>$val["active_electric_component"],
                'temp_difference'=>$val["temp_difference"],
                'event_process'=>$val["event_process"],
                'error'=>$val["error"],
                'filename'=>$filename,
                'tank_id'=>$tank
            ));
        }
    }
}