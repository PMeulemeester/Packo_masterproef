<?php
/**
 * Created by PhpStorm.
 * User: pieterm
 * Date: 16/02/15
 * Time: 09:54
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Binary_active_electric_component extends Model{
    protected $table='active_electric_components';

    public  $timestamps=false;

    public static function getType($typeid){
        try {
            return Binary_active_electric_component::where("type_id", "=", $typeid)->firstOrFail()->type;
        }catch(\Exception $e){
            return $typeid;
        }

    }
}