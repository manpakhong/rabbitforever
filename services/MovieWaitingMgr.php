<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( SERVICES_PATH . '/Manager.php');
include_once( DAOS_PATH . '/MovieWaitingDao.php');
include_once( EOS_PATH . '/MovieWaitingEo.php');
include_once( VOS_PATH . '/MovieWaitingVo.php');
include_once( HELPERS_PATH . '/MovieWaitingMgrHelper.php');

class MovieWaitingMgr extends Manager{
	private $className;
	private $logger;
	private $dao;
	private $helper;
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
	}
	private function init(){
		$this->helper = new MovieWaitingMgrHelper($this->systemConfigEo->getDefaultLanguage());
		$this->dao = new MovieWaitingDao ();
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
	
	public function batchSelectNotInSoMovieIdArray($so){
		$movieWaitingEoArray = NULL;
		try {
			$movieWaitingEoArray = $this->dao->batchSelectNotInSoMovieIdArray($so);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->batchSelectNotInSoMovieIdArray() - $so=' . print_r($so,1), $ex );
			throw $ex;
		}
		return $movieWaitingEoArray;
	}
	public function batchSelectNotInSoIdArray($so){
		$movieWaitingEoArray = NULL;
		try {
			$movieWaitingEoArray = $this->dao->batchSelectNotInSoIdArray($so);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->batchSelectNotInSoIdArray() - $so=' . print_r($so,1), $ex );
			throw $ex;
		}
		return $movieWaitingEoArray;
	}
	public function batchSelectBySoIdArray($so){
		$movieWaitingEoArray = NULL;
		try {
			$movieWaitingEoArray = $this->dao->batchSelectBySoIdArray($so);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->batchSelectBySoIdArray() - $so=' . print_r($so,1), $ex );
			throw $ex;
		}
		return $movieWaitingEoArray;
	}
	public function selectVo($so){
		$movieWaitingVoArray = NULL;
		try {
			$movieWaitingEoArray = $this->dao->select($so);
			if (isset($movieWaitingEoArray)){
				$this->helper->loadMovieIdArrayFromMovieWaitingEoArray($movieWaitingEoArray);
				$this->helper->loadMovieCodeArray();
				$movieWaitingVoArray = array();
				foreach($movieWaitingEoArray as $key=>$value){
					$movieWaitingVo = new MovieWaitingVo($value);
					$this->helper->fillMovieWaitingVo($movieWaitingVo);
					array_push($movieWaitingVoArray, $movieWaitingVo);
				}
			}
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->select() - $so=' . print_r($so,1), $ex );
			throw $ex;
		}
		return $movieWaitingVoArray;
	}
	public function select($so){
		$movieWaitingEoArray = NULL;
		try {
			$movieWaitingEoArray = $this->dao->select($so);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->select() - $so=' . print_r($so,1), $ex );
			throw $ex;
		}
		return $movieWaitingEoArray;
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
// 			$this->logger->info ($this->className . '->delete() - $affectedRows=' . $affectedRows);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->delete() - $eo=' . print_r($eo, 1), $ex );
			throw $ex;
		}
		return $affectedRows;
	}
}
?>