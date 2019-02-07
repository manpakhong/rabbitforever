<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');

class CommonUtils{
	private $className;
	private $logger;
	private static $commonUtils;
	
	private function __construct(){
		$this->fillClassName();
	}
	private function fillClassName(){
		if (!isset($this->className)){
			$this->className =  __CLASS__;
		}
	}
	public static function getInstance(){
		if (!isset(CommonUtils::$commonUtils)){
			CommonUtils::$commonUtils = new CommonUtils();
		}
		return CommonUtils::$commonUtils;
	}
	

	public function convertDateTimeToDbString(DateTime $dateTime){
		$dateTimeString;
		try{
			if (isset($dateTime)){
				$dateTimeString = $dateTime->format('Y-m-d H:i:s.u');
			}
		}
		catch (Exception $e){
			printf('Exception $e', $e);
		}
		return $dateTimeString;
	}
	public function trimTimeToMin(DateTime $dateTime){
		$dateTime->setTime(0,0,0);
		//return $dateTime;
	}
	public function trimTimeToMax(DateTime $dateTime){
		$dateTime->setTime(23,59,59);
		//return $dateTime;
	}
	public function padZeroToLeft($input, $padLength){
		return str_pad($input, 2, "0", STR_PAD_LEFT);
	}
	
	
}
?>