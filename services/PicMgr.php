<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( SERVICES_PATH . '/Manager.php');
include_once( DAOS_PATH . '/PicDao.php');
include_once( EOS_PATH . '/PicEo.php');
class PicMgr extends Manager{
	private $className;
	private $logger;
	private $dao;
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
	}
	private function init(){
		$this->dao = new PicDao ();
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	public function select($so){
		$picEoArray = NULL;
		try {
			$picEoArray = $this->dao->select($so);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->select() - $so=' . $so, $ex );
			throw $ex;
		}
		return $picEoArray;
	}
	public function insert($eo){
		$id = NULL;
		try {
			$id = $this->dao->insert($eo);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->insert() - $eo=' . $eo, $ex );
			throw $ex;
		}
		return $id;
	}
	public function update($eo){
		$affectedRows = NULL;
		try {
			$affectedRows = $this->dao->update($eo);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->update() - $eo=' . $eo, $ex );
			throw $ex;
		}
		return $affectedRows;
	}
	public function delete($eo){
		$affectedRows = NULL;
		try {
			$affectedRows = $this->dao->delete($eo);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->delete() - $eo=' . $eo, $ex );
			throw $ex;
		}
		return $affectedRows;
	}
}
?>