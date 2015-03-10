<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		/*$this->call('RoleTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('LanguageTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('BinaryFileTypeTableSeeder');
		$this->call('ProcessesActiveTableSeeder');
		$this->call('ActiveElectricComponentsTableSeeder');
		$this->call('EventProcessTableSeeder');
		$this->call('ErrorsTableSeeder');
		$this->call('TankSortsTableSeeder');
		$this->call('UserTanksTableSeeder');*/
	}

}
class UserTanksTableSeeder extends Seeder{
	public function run()
	{
		DB::table('user_tanks')->delete();
		\App\UserTanks::create(array('user_id'=>'2','tank_id'=>'5','filename'=>'150202.bin'));
		\App\UserTanks::create(array('user_id'=>'2','tank_id'=>'9','filename'=>'150202.bin'));
		\App\UserTanks::create(array('user_id'=>'2','tank_id'=>'1','filename'=>'150202.bin'));
		\App\UserTanks::create(array('user_id'=>'2','tank_id'=>'4','filename'=>'150202.bin'));
		\App\UserTanks::create(array('user_id'=>'2','tank_id'=>'3','filename'=>'150202.bin'));
	}
}
class TankSortsTableSeeder extends Seeder{
	public function run()
	{
		DB::table('tank_sorts')->delete();

		DB::table('tank_sorts')->insert(array(
			array('tanksort'=>'REM/DIB'),
			array('tanksort'=>'RS/DIB'),
			array('tanksort'=>'LEM/DIB'),
			array('tanksort'=>'LS/DIB'),
			array('tanksort'=>'REM/DX'),
			array('tanksort'=>'RS/DX'),
			array('tanksort'=>'LEM/DX'),
			array('tanksort'=>'LS/DX'),
			array('tanksort'=>'PIB'),
			array('tanksort'=>'OM/DX'),
			array('tanksort'=>'OM/IB'),
			array('tanksort'=>'VM/DIB'),
			array('tanksort'=>'VM/DX'),
			array('tanksort'=>'RM/IB'),
			array('tanksort'=>'TRT'),
		));
	}
}

class ErrorsTableSeeder extends Seeder{
	public function run()
	{
		DB::table('errors')->delete();

		DB::table('errors')->insert(array(
			array('error_id'=>'10','error'=>'SMS will be sent!'),
			array('error_id'=>'100','error'=>'Init failed, processes cannot start!'),
			array('error_id'=>'101','error'=>'I2c init error!'),
			array('error_id'=>'102','error'=>'I2c init error, process parameters!'),
			array('error_id'=>'103','error'=>'Power init error, communication problem!'),
			array('error_id'=>'104','error'=>'Power init error, failed reading inputs!'),
			array('error_id'=>'1001','error'=>'Error reading machine params!'),
			array('error_id'=>'1002','error'=>'Unable to save machine params!'),
			array('error_id'=>'1501','error'=>'Error reading params!'),
			array('error_id'=>'1502','error'=>'Unable to save params!'),
			array('error_id'=>'1505','error'=>'Factory params loaded!'),
			array('error_id'=>'2001','error'=>'Error reading error log!'),
			array('error_id'=>'2002','error'=>'Unable to save error log!'),
			array('error_id'=>'2003','error'=>'Unable to read/write error log!'),
			array('error_id'=>'2501','error'=>'Error reading clean log!'),
			array('error_id'=>'2502','error'=>'Unable to save clean log!'),
			array('error_id'=>'3001','error'=>'Error reading cool log!'),
			array('error_id'=>'3002','error'=>'Unable to save cool log!'),
			array('error_id'=>'3501','error'=>'Error reading inst cool log!'),
			array('error_id'=>'3502','error'=>'Unable to save inst cool log!'),
			array('error_id'=>'5000','error'=>'Breakdown cleaning pump!'),
			array('error_id'=>'5001','error'=>'Breakdown agitator 1!'),
			array('error_id'=>'5002','error'=>'Breakdown agitator 2!'),
			array('error_id'=>'5003','error'=>'Breakdown agitator 3!'),
			array('error_id'=>'5004','error'=>'Robot stopped!'),
			array('error_id'=>'5005','error'=>'Detergent almost empty!'),
			array('error_id'=>'5006','error'=>'Breakdown heating equipment!'),
			array('error_id'=>'5007','error'=>'Breakdown cooling unit/ice water pump 1!'),
			array('error_id'=>'5008','error'=>'Breakdown SSC1/ ice water pump 2!'),
			array('error_id'=>'5010','error'=>'Alarm milk input while other process active!'),
			array('error_id'=>'5011','error'=>'Eco tronic input'),
			array('error_id'=>'5012','error'=>'UPS input'),
			array('error_id'=>'5014','error'=>'Clean.program ended.'),
			array('error_id'=>'5015','error'=>'Cleaning: temp not long enough high'),
			array('error_id'=>'5016','error'=>'Cleaning: tank full at end cleaning! (NIV3)'),
			array('error_id'=>'5050','error'=>'Alarm cooling time!'),
			array('error_id'=>'5051','error'=>'Breakdown heating main cleaning!'),
			array('error_id'=>'5052','error'=>'Tank not empty! (NIV1 / NIV2)'),
			array('error_id'=>'5054','error'=>'Unable to fill the tank! '),
			array('error_id'=>'5055','error'=>'Tripping safety active!'),
			array('error_id'=>'5056','error'=>'Breakdown temp. sensor 1!'),
			array('error_id'=>'5057','error'=>'Temp. too low!'),
			array('error_id'=>'5058','error'=>'Level sensor drain is not detecting.'),
			array('error_id'=>'7001','error'=>'Comm. port power print: open failed'),
			array('error_id'=>'10013','error'=>'Error communication power print'),
			array('error_id'=>'10020','error'=>'There is a new SW version for the Power print. Please update the SW before proceeding! Parameter C.6!'),
			array('error_id'=>'10041','error'=>'Error communication: wrong function code - update SW iPower!'),
			array('error_id'=>'10050','error'=>'Error communication: iPower SW not started!'),
			array('error_id'=>'20056','error'=>'Clock reset: dead battery?'),
			array('error_id'=>'20012','error'=>'Processparameters cleared!'),
			array('error_id'=>'100000','error'=>'Screen XML: file not found!'),
			array('error_id'=>'100001','error'=>'Screen XML: read error'),
			array('error_id'=>'100002','error'=>'Screen XML: versionnumber NOK'),
			array('error_id'=>'100003','error'=>'Screen XML: write error'),
			array('error_id'=>'100004','error'=>'Lang XML: file format NOK'),
			array('error_id'=>'100005','error'=>'Electricity failure'),
			array('error_id'=>'100006','error'=>'No bootloader found - impossible to update the Software'),
			array('error_id'=>'100007','error'=>'Lang XML not found'),
			array('error_id'=>'100008','error'=>'Lang XML English not found'),
			array('error_id'=>'100009','error'=>'Please stop the process before updating the software!'),
			array('error_id'=>'10060','error'=>'Error iPower: Watchdog reset!'),
			array('error_id'=>'10061','error'=>'Error iPower: I2c inputs failed to read'),
			array('error_id'=>'10062','error'=>'Error iPower: I2c temp failed to read'),
			array('error_id'=>'10063','error'=>'Error iPower: Comm CRC error'),
			array('error_id'=>'10064','error'=>'Error iPower: Comm unknown address'),
			array('error_id'=>'10065','error'=>'Error iPower: Comm wrong format'),
			array('error_id'=>'10066','error'=>'Error iPower: Comm wrong number of bytes'),
			array('error_id'=>'10067','error'=>'Error iPower: unknown error'),
			array('error_id'=>'10068','error'=>'EXCEPTION iPower: Take picture of these numbers!'),
			array('error_id'=>'10069','error'=>'Error iPower: RS485 Rx overflow'),
			array('error_id'=>'10070','error'=>'Error iPower: WinCE Rx overflow'),
			array('error_id'=>'10071','error'=>'Error iPower: EEPROM cleared'),
			array('error_id'=>'5060','error'=>'Robot Service active!'),
			array('error_id'=>'5061','error'=>'SSC Service active!'),
			array('error_id'=>'6000','error'=>'Do not load limit 1!'),
			array('error_id'=>'6001','error'=>'Do not load limit 2!'),
			array('error_id'=>'6002','error'=>'Do not load limit 3!'),
			array('error_id'=>'6003','error'=>'Do not load limit 4!'),
			array('error_id'=>'6004','error'=>'Do not load limit 5!'),
			array('error_id'=>'6005','error'=>'Max power interruption time passed!'),
			array('error_id'=>'6006','error'=>'Temperature sensor broken!'),
			array('error_id'=>'6007','error'=>'Oculus temp sensor broken!'),
			array('error_id'=>'6008','error'=>'Max delay start cleaning passed!'),
			array('error_id'=>'6009','error'=>'Cool temp too high starting from second cool'),
			array('error_id'=>'6010','error'=>'Cool temp too high during first cool'),
			array('error_id'=>'6011','error'=>'Cool temp too low'),
			array('error_id'=>'6012','error'=>'Cool: agitators too long not active'),
			array('error_id'=>'6013','error'=>'Clean temp not long enough high'),
			array('error_id'=>'6014','error'=>'Do not forget to clean the tank!'),
			array('error_id'=>'6015','error'=>'Cooling started/Level detected without cleaning!'),
			array('error_id'=>'6016','error'=>'Cleaning needed'),
			array('error_id'=>'6017','error'=>'Cleaning: stop pressed!'),
			array('error_id'=>'6018','error'=>'Please start the cooling!'),
			array('error_id'=>'4000','error'=>'No external memory found!'),
			array('error_id'=>'4001','error'=>'Copy to memory stick: OK'),
			array('error_id'=>'4002','error'=>'Copy to SD card: OK'),
			array('error_id'=>'4003','error'=>'Failed to create the destination folder! Is the card locked?'),
			array('error_id'=>'4004','error'=>'Files to copy not found!'),
			array('error_id'=>'4005','error'=>'Destination folder not found!'),
			array('error_id'=>'4006','error'=>'Authentication error! Is the card locked?'),
			array('error_id'=>'4007','error'=>'Failed to copy files: are they already on the memory device? Is the disk full?'),
			array('error_id'=>'4008','error'=>'File transfer: unknown error'),
			array('error_id'=>'4009','error'=>'No SD card found!'),
			array('error_id'=>'4010','error'=>'No Memory stick found!'),
			array('error_id'=>'4011','error'=>'Copy busy!'),
			array('error_id'=>'4012','error'=>'Copy files started!'),
			array('error_id'=>'10100','error'=>'Error iPower: EEPROM writing failed'),
			array('error_id'=>'10101','error'=>'Error iPower: EEPROM reading failed'),
			array('error_id'=>'4050','error'=>'No Pacap address file found!'),
			array('error_id'=>'4051','error'=>'Error: Pacap address file – wrong syntax!'),
			array('error_id'=>'4052','error'=>'No Pacap volume file found!'),
			array('error_id'=>'4053','error'=>'Error: Pacap file – wrong order pacap values!'),
			array('error_id'=>'4054','error'=>'Error: Pacap file – wrong order volume values!'),
			array('error_id'=>'4055','error'=>'Error: Pacap file – wrong sytax!'),
			array('error_id'=>'4056','error'=>'Error: Pacap address file – not enough items!'),
			array('error_id'=>'11013','error'=>'Error: Pacap timeout'),
			array('error_id'=>'5017','error'=>'The difference between the product sensor and the oculus sensor is too big!'),
			array('error_id'=>'5018','error'=>'Replace product temp. sensor and change parameter C.14.1 to NORMAL'),
			array('error_id'=>'5019','error'=>'Replace oculus temp. sensor and change parameter C.14.1 to NORMAL'),
			array('error_id'=>'100010','error'=>'Watchdog cannot open: restart tank!'),
			array('error_id'=>'100011','error'=>'Watchdog cannot start: restart tank!'),
			array('error_id'=>'26001','error'=>'GSM: Not enough characters in the GSM number'),
			array('error_id'=>'26002','error'=>'GSM: no gsm number entered'),
			array('error_id'=>'26004','error'=>'GSM: Is switched off!'),
			array('error_id'=>'26005','error'=>'GSM: Is not active!'),
			array('error_id'=>'26008','error'=>'GSM: Init. PIN-code failed'),
			array('error_id'=>'26017','error'=>'GSM: Unable to send SMS'),
			array('error_id'=>'26019','error'=>'GSM: No answer received')
		));
	}
}
class EventProcessTableSeeder extends Seeder{
	public function run()
	{
		DB::table('event_process')->delete();

		DB::table('event_process')->insert(array(
			array('type_id'=>'0','type'=>'ProcCoolStart'),
			array('type_id'=>'1','type'=>'AutoCoolStart'),
			array('type_id'=>'2','type'=>'DeepCoolStart'),
			array('type_id'=>'3','type'=>'InstantCoolStart'),
			array('type_id'=>'4','type'=>'ProcCleaningStart'),
			array('type_id'=>'5','type'=>'CleaningTempTooLow'),
			array('type_id'=>'6','type'=>'CleaningStopPressed'),
			array('type_id'=>'7','type'=>'CleaningTankNotEmpty'),
			array('type_id'=>'8','type'=>'CleaningTempMax'),
			array('type_id'=>'9','type'=>'CleaningOk'),
			array('type_id'=>'10','type'=>'MilkCollect'),
			array('type_id'=>'11','type'=>'MixStart'),
			array('type_id'=>'12','type'=>'Lvl3Low'),
			array('type_id'=>'13','type'=>'ProcCoolStop'),
			array('type_id'=>'14','type'=>'AutoCoolStop'),
			array('type_id'=>'15','type'=>'DeepCoolStop'),
			array('type_id'=>'16','type'=>'InstantCoolStop'),
			array('type_id'=>'17','type'=>'ProcCleaningStop'),
			array('type_id'=>'18','type'=>'CleaningFillFailed'),
			array('type_id'=>'19','type'=>'CleaningMaxHeatTime'),
			array('type_id'=>'20','type'=>'CleaningTempOk'),
			array('type_id'=>'21','type'=>'CleaningTempEnd'),
			array('type_id'=>'22','type'=>'CleaningPowerFail'),
			array('type_id'=>'23','type'=>'Unknown'),
			array('type_id'=>'24','type'=>'RestStart'),
			array('type_id'=>'25','type'=>'MilkCollectGenerated')
		));
	}
}
class ActiveElectricComponentsTableSeeder extends Seeder{
	public function run()
	{
		DB::table('active_electric_components')->delete();

		DB::table('active_electric_components')->insert(array(
			array('type_id'=>'0','type'=>'Geen'),
			array('type_id'=>'1','type'=>'RW1, agitator 1'),
			array('type_id'=>'2','type'=>'RW2, agitator 2'),
			array('type_id'=>'4','type'=>'RW3, agitator 3'),
			array('type_id'=>'8','type'=>'SSC1, soft start cooling 1'),
			array('type_id'=>'10','type'=>'SSC2, soft start cooling 2'),
			array('type_id'=>'20','type'=>'ICE PUMP, Cooling valve')
		));
	}
}
class ProcessesActiveTableSeeder extends Seeder{
	public function run()
	{
		DB::table('processes_active')->delete();

		DB::table('processes_active')->insert(array(
			array('type_id'=>'1','type'=>'Geen'),
			array('type_id'=>'1','type'=>'clean'),
			array('type_id'=>'2','type'=>'cool'),
			array('type_id'=>'4','type'=>'mix'),
			array('type_id'=>'8','type'=>'per mix'),
			array('type_id'=>'10','type'=>'instant cool')
		));
	}
}
class BinaryFileTypeTableSeeder extends Seeder{
	public function run()
	{
		DB::table('binary_file_type')->delete();

		DB::table('binary_file_type')->insert(array(
			array('type_id'=>'0','type'=>'Temp logging','length'=>16),
			array('type_id'=>'1','type'=>'EventProcess','length'=>13),
			array('type_id'=>'2','type'=>'Rise Oc Error','length'=>13),
			array('type_id'=>'3','type'=>'Acknowledge Oc Error','length'=>13),
			array('type_id'=>'4','type'=>'Rise Error','length'=>13),
			array('type_id'=>'5','type'=>'Acknowledge Error','length'=>13),
			array('type_id'=>'6','type'=>'Event with temperature logging','length'=>17),
			array('type_id'=>'7','type'=>'Temp logging extended','length'=>17),
			array('type_id'=>'8','type'=>'Err confirmed by user','length'=>13),
			array('type_id'=>'9','type'=>'Volume logging','length'=>11),
			array('type_id'=>'10','type'=>'Temp logging extended with Level Indication','length'=>17)
		));
	}
}
class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('permissions')->delete();

		DB::table('permissions')->insert(array(
			array('role_id'=>'2','permission'=>'User Create'),
			array('role_id'=>'2','permission'=>'Dealer Create'),
			array('role_id'=>'2','permission'=>'Admin Create'),
			array('role_id'=>'2','permission'=>'Register'),
			array('role_id'=>'3','permission'=>'Register'),
			array('role_id'=>'3','permission'=>'User Create')
		));
	}

}
class RoleTableSeeder extends Seeder {

	public function run()
	{
		DB::table('roles')->delete();

		DB::table('roles')->insert(array(
			array('role'=>'user'),
			array('role'=>'admin'),
			array('role'=>'dealer')
		));
	}

}
class LanguageTableSeeder extends Seeder {

	public function run()
	{
		DB::table('languages')->delete();

		DB::table('languages')->insert(array(
			array('language_short'=>'nl','language_long'=>'Nederlands'),
			array('language_short'=>'en','language_long'=>'English'),
			array('language_short'=>'fr','language_long'=>'Francais')
		));
	}

}
class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

			\App\User::create(array('name'=>'Pieter Meulemeester',
			'email' => 'pietermeulemeester@gmail.com',
			'password'=>Hash::make('talitha'),
			'role_id'=>'2'
		));
		\App\User::create(array('name'=>'Test',
			'email' => 'testuser@masterproef.com',
			'password'=>Hash::make('admin123'),
			'role_id'=>'1'
		));
		\App\User::create(array('name'=>'Nick Borra',
			'email' => 'nick.borra@packo.com',
			'password'=>Hash::make('admin123'),
			'role_id'=>'2'
		));
	}

}