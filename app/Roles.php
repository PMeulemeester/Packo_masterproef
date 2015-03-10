<?php
/**
 * Created by PhpStorm.
 * User: pieterm
 * Date: 12/02/15
 * Time: 10:08
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model{
    protected $table='roles';

    public  $timestamps=false;

    public function user(){
        return $this->hasMany("App\User");
    }
    public function permissions(){
        return $this->hasMany("App\Permissions");
    }
    public static function geefRoles(){
        return Roles::all();
    }
}