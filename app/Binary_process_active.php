<?php
/**
 * Created by PhpStorm.
 * User: pieterm
 * Date: 16/02/15
 * Time: 09:40
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Binary_process_active extends Model{
    protected $table='processes_active';

    public  $timestamps=false;

    public static function getType($typeid){
        try {
            return Binary_process_active::where("type_id", "=", $typeid)->firstOrFail()->type;
        }catch(\Exception $e){
            return "Not found";
        }

    }
}