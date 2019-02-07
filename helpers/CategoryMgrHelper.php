<?php 
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( SERVICES_PATH . '/Manager.php');
include_once( DAOS_PATH . '/CategoryDao.php');
include_once( EOS_PATH . '/CategoryEo.php');

class CategoryMgrHelper{
	private static $className;
	private $className;
	private $logger;
	function __construct() {
		$this->fillClassName();
		$this->getClassName();
		$this->logger = RabbitLogger::getLogger(get_class($this));
	}
	private function fillClassName(){
		if (!isset($this->className)){
			$this->className =  __CLASS__;
		}
	}
	
	public function __toString(){
		$objectString=NULL;
		$count = 0;
		foreach($this as $key => $value){
			if($count > 0){
				$objString = $objectString . ',';
			}
			$objectString = $objectString . '$key => $value ';
			$count = $count + 1;
		}
		return $objectString;
	}
}
?>