<?php
/**
 * Created by PhpStorm.
 * User: pieterm
 * Date: 18/02/15
 * Time: 11:14
 */

namespace App\Http\Controllers;


use App\Libraries\Binary_parse;
use App\Tank_Sorts;
use App\User;
use App\UserTanks;
use Illuminate\Support\Facades\Request;

class UploadController extends Controller{

    public function upload(){
        $tanks=array();
        foreach(Tank_Sorts::all() as $tank){
            $tanks[$tank->id]=$tank->tanksort;
        }
        return view('upload',['tanks'=>$tanks]);
    }
    public function file_upload(Request $request){
        $rules=array(
            'name'=>'required',
            'file'=>'required',
            'tank'=>'required'
        );
        $validator=\Validator::make(\Input::all(),$rules);
        if($validator->fails()){
            return redirect(\App::getLocale().'/upload')->withErrors($validator);
        }
        if(!User::isUser(\Request::get('name'))){
            return redirect(\App::getLocale().'/upload')->withErrors([
                'unknown' => "User is unknown",
            ]);
        }
        if(strtolower(\Request::file('file')->getClientOriginalExtension())!='bin'){
            return redirect(\App::getLocale().'/upload')->withErrors([
                'extension' => \Lang::get('messages.extension'),
            ]);
        }
        else {
            \Request::file('file')->move(storage_path().'/iControl/'.\Request::get('name').'/'.\Request::get('tank').'/'.substr(\Request::file('file')->getClientOriginalName(),0,4).'/', \Request::file('file')->getClientOriginalName());
            if($usertank=UserTanks::where('user_id',User::getUserId(\Request::get('name')))->where('tank_id',\Request::get('tank'))->first()) {
                if($usertank->filename!=\Request::file('file')->getClientOriginalName()){
                    $usertank->filename = \Request::file('file')->getClientOriginalName();
                    $usertank->versie=0;
                }else{
                    $usertank->increment('versie');
                }

                $usertank->save();
            }
            //$parser=new \App\Libraries\Binary_parse();
            //$parser->parse_file(\Request::get('name'),\Request::file('file')->getClientOriginalName(),\Request::get('tank'));
            return redirect(\App::getLocale().'/upload');
        }
    }
}