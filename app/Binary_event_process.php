<?php
/**
 * Created by PhpStorm.
 * User: pieterm
 * Date: 16/02/15
 * Time: 10:51
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Binary_event_process extends Model{
    protected $table='event_process';

    public  $timestamps=false;

    public static function getType($typeid){
        try {
            return Binary_event_process::where("type_id", "=", $typeid)->firstOrFail()->type;
        }catch(\Exception $e){
            return "Not found";
        }
    }
}