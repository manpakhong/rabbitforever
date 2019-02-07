<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( SERVICES_PATH . '/Manager.php');
include_once( DAOS_PATH . '/MovieDao.php');
include_once( EOS_PATH . '/MovieEo.php');
class MovieMgr extends Manager{
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
		$this->dao = new MovieDao ();
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	public function selectCount($so){
		$count = NULL;
		try {
			$count = $this->dao->selectCount($so);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->selectCount() - $so=' . print_r($so,1), $ex );
			throw $ex;
		}
		return $count;
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

	public function batchSelectBySoIdArray($so){
		$movieEoArray = NULL;
		try {
			$movieEoArray = $this->dao->batchSelectBySoIdArray($so);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->batchSelectBySoIdArray() - $so=' . print_r($so,1), $ex );
			throw $ex;
		}
		return $movieEoArray;
	}

	public function selectLike($so){
		$movieEoArray = NULL;
		try {
			$movieEoArray = $this->dao->selectLike($so);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->selectLike() - $so=' . print_r($so,1), $ex );
			throw $ex;
		}
		return $movieEoArray;
	}
	public function select($so){
		$movieEoArray = NULL;
		try {
			$movieEoArray = $this->dao->select($so);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->select() - $so=' . print_r($so,1), $ex );
			throw $ex;
		}
		return $movieEoArray;
	}
	public function insert($eo){
		$id = NULL;
		try {
			$id = $this->dao->insert($eo);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->insert() - $eo=' . print_r($eo, 1), $ex );
			throw $ex;
		}
		return $id;
	}
	public function update($eo){
		$affectedRows = NULL;
		try {
			$affectedRows = $this->dao->update($eo);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->update() - $eo=' . print_r($eo, 1), $ex );
			throw $ex;
		}
		return $affectedRows;
	}
	public function delete($eo){
		$affectedRows = NULL;
		try {
			$affectedRows = $this->dao->delete($eo);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->delete() - $eo=' . print_r($eo, 1), $ex );
			throw $ex;
		}
		return $affectedRows;
	}
}
?>