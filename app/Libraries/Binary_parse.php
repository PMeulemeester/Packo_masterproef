<?php
/**
 * Created by PhpStorm.
 * User: pieterm
 * Date: 16/02/15
 * Time: 10:54
 */

namespace App\Libraries;


use App\Binary_file_type;

class Binary_parse{

    /**
     * @param $filename
     */
    public function parse_file($name,$filename,$tank){
        $str=storage_path()."/iControl/".$name.'/'.$tank.'/'.substr($filename,0,4).'/'.$filename;
        $arr=array();
        if(file_exists($str)) {
            $file = fopen($str, "rb");
            //$logfile=fopen(storage_path()."/iControl/".$name.'/'.$tank.'/'.substr($filename,0,4).'/logfile.txt','w');
            if(flock($file,LOCK_EX)) {
                $backup = null;
                while (filesize($str) > ftell($file)) {
                    $a = array();
                    $b = new Binary_file\Binary_file_row();

                    $b->date = $this->create_date($str,$file);
                    //fwrite($logfile,$b->date."\n");
                    $type = $this->getTypeAndLength($str,$file);
                    //fwrite($logfile,$type->type."\n".$type->type_id."\n");
                    $b->type = $type->type;
                    if($type->type_id==99){
                        fseek($file,ftell($file)+8);
                    }
                    elseif ($type->type_id == 0 || $type->type_id == 7 || $type->type_id==10) {
                        $b->temp = $this->getTemperature($str,$file) . "°C  ";
                        $b->active_process = $this->getActiveProcess($str,$file);
                        $b->active_electric_component = $this->getActiveElectricComponent($str,$file);
                        if ($type->type_id == 7 || $type->type_id==10) {
                            $this->getTemperatureDifference($str,$file);
                            $b->temp_difference = 0 ."°C  ";
                        }
                    } elseif ($type->type_id == 1 || $type->type_id == 6) {
                        $b->event_process = $this->getEventProcess($str,$file);
                        if ($type->type_id == 6) {
                            $b->temp = $this->getTemperature($str,$file) . "°C  ";
                        }
                    } elseif($type->type_id==9) {
                        unpack("h4", fread($file, 2));
                    }else{
                        $b->error = $this->getError($str,$file);
                    }
                    if ($backup == null || $b->IsRowTheSame($backup) == "false") {
                        array_push($arr, get_object_vars($b));
                    }
                    $backup = clone $b;
                }
                flock($file,LOCK_UN);
                //fclose($logfile);
                fclose($file);
                \App\Binary_row::insertRows($name, $filename, $arr, $tank);
            }
        }
    }

    private function create_date($str,$file){
        if(filesize($str)>=ftell($file)+8) {
            $date = unpack("h16", fread($file, 8));
            return gmdate("d-m H:i", hexdec(strrev($date[1])));
        }else{
            return "error date";
        }

    }
    private function getTypeAndLength($str,$file){
        if(filesize($str)>=ftell($file)+1) {
            $type = unpack("H2", fread($file, 1));
            return \App\Binary_file_type::getType(hexdec($type[1]));
        }else{
            $l=new Binary_file_type();
            $l->type="unknown";
            $l->type_id=99;
            return $l;
        }
    }
    private function getTemperature($str,$file){
        if(filesize($str)>=ftell($file)+4) {
            $temp = unpack("f", fread($file, 4));
            return str_replace(".", ",", number_format($temp[1], 1));
        }else{
            return "error temp";
        }
    }
    private function getEventProcess($str,$file){
        if(filesize($str)>=ftell($file)+4) {
            $eventprocess = unpack("h8", fread($file, 4));
            //echo "start ".$eventprocess[1]." : ";
            return \App\Binary_event_process::getType(hexdec(strrev($eventprocess[1])));
        }else{
            return "error event process";
        }
    }
    private function getActiveProcess($str,$file){
        if(filesize($str)>=ftell($file)+2) {
            $proces_active = unpack("v", fread($file, 2));
            return \App\Binary_process_active::getType($proces_active[1]);
        }else{
            return "error active process";
        }
    }
    private function getActiveElectricComponent($str,$file){
        if(filesize($str)>=ftell($file)+1) {
            $ae = unpack("H2", fread($file, 1));
            return \App\Binary_active_electric_component::getType(hexdec($ae[1]));
        }else{
            return "error aec";
        }
    }
    private function getTemperatureDifference($str,$file){
        if(filesize($str)>=ftell($file)+1) {
            $tempdiff = unpack("H2", fread($file, 1));
            return str_pad($tempdiff[1], 8, 0, STR_PAD_LEFT);
        }else{
            return "error temp diff";
        }
    }
    private function getError($str,$file){
        if(filesize($str)>=ftell($file)+4) {
            $error = unpack("h8", fread($file, 4));
            return \App\Binary_error::getError(hexdec(strrev($error[1])));
        }else{
            return "error";
        }
    }
}