<?php namespace App\Http\Controllers;

use App\Binary_parse;
use App\Binary_row;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\UserTanks;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Psy\Util\Json;

class OculusViewerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function getData(){
		//\Storage::disk('local')->put('file.bin','test');

		if(isset($_GET['filename']) && !empty($_GET['filename'])) {
			//\Debugbar::addMeasure('render',LARAVEL_START,microtime(true));
			//\Debugbar::startMeasure('render','time');
			//return \Response::json($parser->parse_file($_GET['filename']));
			$rows=Binary_row::getRows($_GET['userid'],$_GET['filename'],$_GET['tankid']);
			if($rows->count()==0){
				$parser=new \App\Libraries\Binary_parse();
				$parser->parse_file(User::find($_GET['userid'])->name,$_GET['filename'],$_GET['tankid']);
				$rows=Binary_row::getRows($_GET['userid'],$_GET['filename'],$_GET['tankid']);
			}
			if($rows->count()>0)
				return $rows;
			else{
				return ["error"=>\Lang::get("messages.file_not_found")];
			}
			//\Debugbar::stopMeasure('render');
		}
		else{
			return \Redirect::home();
		}
	}
	public function getTimerData(){
		$uti=UserTanks::getUserTankInfo($_GET['userid'],$_GET['tankid']);
		$data_timer=1800-\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$uti->updated_at)->diffInSeconds(\Carbon\Carbon::now());
		return $data_timer>0?$data_timer:0;
	}

}
