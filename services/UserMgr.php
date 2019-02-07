<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( SERVICES_PATH . '/Manager.php');
include_once( DAOS_PATH . '/UserDao.php');
include_once( EOS_PATH . '/UserEo.php');
class UserMgr extends Manager{
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
		$this->dao = new UserDao ();
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	public function selectMaxId(){
		$maxId = NULL;
		try {
			$maxId = $this->dao->selectMaxId();
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->selectMaxId()', $ex );
			throw $ex;
		}
		return $maxId;
	}
	public function select($so){
		$userEoArray = NULL;
		try {
			$userEoArray = $this->dao->select($so);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->select() - $so=' . $so, $ex );
			throw $ex;
		}
		return $userEoArray;
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