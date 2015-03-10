<?php
/**
 * Created by PhpStorm.
 * User: pieterm
 * Date: 13/02/15
 * Time: 20:49
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Binary_file_type extends Model{
    protected $table='binary_file_type';

    public  $timestamps=false;

    public static function getType($typeid){
        try {
            return Binary_file_type::where("type_id", "=", $typeid)->firstOrFail();
        }catch(\Exception $e){
            $l=new Binary_file_type();
            $l->type="unknown";
            $l->type_id="99";
            return $l;
        }

    }
}