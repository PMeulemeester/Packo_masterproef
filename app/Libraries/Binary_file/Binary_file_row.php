<?php
/**
 * Created by PhpStorm.
 * User: pieterm
 * Date: 19/02/15
 * Time: 19:50
 */

namespace App\Libraries\Binary_file;

class Binary_file_row{
    public $date;
    public $type;
    public $temp;
    public $active_process;
    public $active_electric_component;
    public $temp_difference;
    public $event_process;
    public $error;

    public function __construct(){
        $this->date="";
        $this->type="";
        $this->temp="";
        $this->active_process="";
        $this->active_electric_component="";
        $this->temp_difference="";
        $this->event_process="";
        $this->error="";
    }

    public function IsRowTheSame($backup){
        if($backup!=null && $this->type==$backup->type && $this->temp==$backup->temp && $this->active_process==$backup->active_process && $this->active_electric_component==$backup->active_electric_component && $this->event_process==$backup->event_process && $this->temp_difference==$backup->temp_difference && $this->error==$backup->error){
            return "true";
        }else{
            return "false";
        }
    }
}