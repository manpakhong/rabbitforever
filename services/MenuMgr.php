<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (SERVICES_PATH . '/Manager.php');
include_once (DAOS_PATH . '/MenuDao.php');
include_once (EOS_PATH . '/MenuEo.php');
class MenuMgr extends Manager{
	private $className;
	private $logger;
	private $dao;
	function __construct() {
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger(get_class($this));
		$this->dao = new MenuDao();
	}
	
	private function fillClassName(){
		if (!isset($this->className)){
			$this->className =  __CLASS__;
		}
	}
	public function selectMaxLv(){
		$maxLv = NULL;
		try{
			$maxLv = $this->dao->selectMaxLv();
		} catch ( Exception $ex ){
			$this->logger->error ( $this->className . '->selectMaxLv()', $ex);
			throw $ex;
		}
		return $maxLv;
	}
	public function select($so){
		$menuEoArray = NULL;
		try {
			$menuEoArray = $this->dao->select($so);
		
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->select() - $so=' . $so ,$ex );
			throw $ex;
		}
		return $menuEoArray;
	}
	public function insert($eo){
		$id = NULL;
		try {
			$id = $this->dao->insert($eo);
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->insert() - $eo=' . $eo ,$ex );
			throw $ex;
		}
		return $id;
	}
	public function update($eo){
		$affectedRows = 0;
		try {
			$affectedRows = $this->dao->update($eo);
		
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->update() - $eo=' . $eo ,$ex );
			throw $ex;
		}
		return $affectedRows;
	}
	public function delete($eo){
		$affectedRows = 0;
		try {
			$affectedRows = $this->dao->delete($eo);
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->delete() - $eo=' . $eo ,$ex );
			throw $ex;
		}
		return $affectedRows;
	}
}
?>