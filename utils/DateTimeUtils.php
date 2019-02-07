<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (UTILS_PATH . '/CommonUtils.php');
class DateTimeUtils{
	private static $dateTimeUtils;
	private $logger;
	private $className;
	private $commonUtils;
	private function __construct(){
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger(get_class($this));
		$this->commonUtils = CommonUtils::getInstance();
	}
	private function fillClassName(){
		if (!isset($this->className)){
			$this->className =  __CLASS__;
		}
	}
	public static function getInstance(){
		if (!isset(DateTimeUtils::$dateTimeUtils)){
			DateTimeUtils::$dateTimeUtils = new DateTimeUtils();
		}
		return DateTimeUtils::$dateTimeUtils;
	}
	
	public function getNowString(){
		$date = new DateTime();
		return $date->format('Ymd_His_u');
	}
	
	public function formatDisplayDateTimeString($dateString){
		$rtnDateString = NULL;
		try {
			$unixTime = strtotime($dateString);
			$dateArray = getDate($unixTime);
			// print_r($dateArray);
			$rtnDateString =
				$this->commonUtils->padZeroToLeft($dateArray["mday"],2) . '/' .
				$this->commonUtils->padZeroToLeft($dateArray["mon"], 2) . '/' .
				$dateArray["year"] . ' '  .
				$this->commonUtils->padZeroToLeft($dateArray["hours"], 2) . ':' .
				$this->commonUtils->padZeroToLeft($dateArray["minutes"], 2) . ':'.
				$this->commonUtils->padZeroToLeft($dateArray["seconds"], 2);
		
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->formatDisplayDateTimeString() - $dateString=' . $dateString ,$ex );
			throw $ex;
		}

		return $rtnDateString;
	}
	
	public function formatDisplayDateString($dateString){
		$rtnDateString = NULL;
		try {
		
			$unixTime = strtotime($dateString);
			$dateArray = getDate($unixTime);
			// print_r($dateArray);
			$rtnDateString =
				$this->commonUtils->padZeroToLeft($dateArray["mday"],2) . '/'.
				$this->commonUtils->padZeroToLeft($dateArray["mon"], 2) .'/' .
				$dateArray["year"];
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->formatDisplayDateString() - $dateString=' . $dateString ,$ex );
			throw $ex;
		}

		return $rtnDateString;
	}
	
	public function formatDisplayDateStringToSqlDateString($displayDateString){
		$sqlDateString = NULL;
		try {
			$pattern = '(\\d{2})-(\\d{2})-(\\d{4})';
			$displayDateStringA = str_replace("/","-",$displayDateString);
			preg_match('/' . $pattern . '/', $displayDateStringA, $matches);
			print_r($matches);
			if (count($matches) == 4){
				$sqlDateString = $matches[3] . '-' . $matches[2] . '-' . $matches[1];
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->formatDisplayDateStringToSqlDateString() - $displayDateString=' . $displayDateString ,$ex );
			throw $ex;
		}
		
		return $sqlDateString;
	}
	
	public function formatDisplayDateTimeStringToSqlDateTimeString($displayDateTimeString){
		$sqlDateTimeString = NULL;
		try {
			$pattern = '(\\d{2})-(\\d{2})-(\\d{4})\\s(\\d{2}):(\\d{2}):(\\d{2})';
			$displayDateTimeStringA = str_replace('/', '-', $displayDateTimeString);
			preg_match('/'. $pattern .'/', $displayDateTimeStringA, $matches);
			if (count($matches) == 7){
				$sqlDateTimeString = $matches[3] . '-' . $matches[2] . '-' . $matches[1] . ' ' . $matches[4] . ':' . $matches[5] . ':' . $matches[6];
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->formatDisplayDateTimeStringToSqlDateTimeString() - $displayDateTimeString=' . $displayDateTimeString ,$ex );
			throw $ex;
		}
		return $sqlDateTimeString;
	}
	
	
}
?>