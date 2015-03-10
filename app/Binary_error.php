<?php
/**
 * Created by PhpStorm.
 * User: pieterm
 * Date: 16/02/15
 * Time: 13:19
 */

namespace App;
use Illuminate\Database\Eloquent\Model;



class Binary_error extends Model{
    protected $table='errors';

    public  $timestamps=false;

    public static function getError($errorid){
        try {
            return Binary_error::where("error_id", "=", $errorid)->firstOrFail()->error;
        }catch(\Exception $e){
            return "Not found";
        }

    }
}