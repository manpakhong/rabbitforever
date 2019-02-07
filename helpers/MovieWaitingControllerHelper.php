<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( HELPERS_PATH . '/Helper.php');
include_once( SERVICES_PATH . '/MovieMgr.php');
include_once( SOS_PATH . '/MovieSo.php');
include_once( SERVICES_PATH . '/CodeMgr.php');
include_once( SOS_PATH . '/CodeSo.php');
include_once( SOS_PATH . '/MovieWaitingSo.php');
include_once( EOS_PATH . '/CodeEo.php');
include_once( EOS_PATH . '/SystemConfigEo.php');
include_once( SERVICES_PATH . '/MovieWaitingMgr.php');
class MovieWaitingControllerHelper extends Helper{
	private $className;
	private $logger;
	private $movieMgr;
	private $codeMgr;
	private $movieEoArray;
	private $movieStatusCodeEoArray;
	private $idArray;
	private $movieWaitingMgr;
	
	public function __construct($defaultLang = NULL){
		parent::__construct($defaultLang);
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
	}
	
	private function init(){
		$this->movieMgr = new MovieMgr();
		$this->codeMgr = new CodeMgr();
		$this->movieWaitingMgr = new MovieWaitingMgr();
	}
	private function fillClassName(){
		if (!isset($this->className)){
			$this->className =  __CLASS__;
		}
	}
	
	public function retrieveMovieIdArray($movieWaitingVoArray){
		$movieWaitingIdArray = array();
		try{			
			foreach($movieWaitingVoArray as $key => $value){
				if (isset($value) && isset($value->id)){
					array_push($movieWaitingIdArray, $value->movieId);					
				}
			}			
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->retrieveMovieIdArray() - $movieWaitingVoArray=' . print_r($movieWaitingVoArray, 1), $ex );
			throw $ex;
		}
		return $movieWaitingIdArray;
	}
	
	public function selectMovieWaitingEoArrayNotInMovieIdArray($movieIdArray){
		$movieWaitingEoArray = array();
		try{
			$so = new MovieWaitingSo();
			$so->setMovieIdArray($movieIdArray);
			$movieWaitingEoArray = $this->movieWaitingMgr->batchSelectNotInSoMovieIdArray($so);
			
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->selectMovieWaitingEoArrayNotInMovieIdArray() - $movieIdArray=' . print_r($movieIdArray, 1), $ex );
			throw $ex;
		}
		return $movieWaitingEoArray;
	}
	
	public function batchDeleteMovieWaitingEoArray($movieWaitingEoArray){
		$isDeleted = FALSE;
		try{
			foreach($movieWaitingEoArray as $key => $value){
				if (isset($value)){
					$id = $value->getId();
					if (isset($id)){
						$eo = $value;
						$this->movieWaitingMgr->delete($eo);
					}
				}
			}
			$isDeleted = TRUE;
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->batchDeleteMovieWaitingEoArray() - $movieWaitingEoArray=' . print_r($movieWaitingEoArray, 1), $ex );
			throw $ex;
		}
		return $isDeleted;
	}
	
	public function batchSaveOrUpdateMovieWaitingVoArray($movieWaitingVoArray){
		$isSaved = FALSE;
		try{
			$inserted = 0;
			$updated = 0;
			
			foreach($movieWaitingVoArray as $key => $value){
				if (isset($value) && isset($value->id)){					
					$eo = new MovieWaitingEo($value);
					$this->logger->info($this->className . '->saveVo() - $eo=' . print_r($eo ,1));
					if ($value->id > 0){
						$affectedRecords = $this->movieWaitingMgr->update($eo);
						if ($affectedRecords > 0){
							$updated = $updated + 1;
						}

					} else {
						$insertedId = $this->movieWaitingMgr->insert($eo);
						if (isset($insertedId) && $insertedId > 0){
							$inserted = $inserted + 1;
							$value->id = $inserted;
						}
					}
				}
			}
			$arrayLength = count($movieWaitingVoArray);
			
			$total = $updated + $inserted;
			$this->logger->info($this->className . '->batchSaveOrUpdateMovieWaitingVoArray() - $arrayLength='. $arrayLength .',$total=' . $total . ',$updated=' . $updated . ',$inserted='. $inserted);
			if ($total == $arrayLength){
				$isSaved = TRUE;
			}
		
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->batchSaveOrUpdateMovieWaitingVoArray() - $movieWaitingVoArray=' . print_r($movieWaitingVoArray, 1), $ex );
			throw $ex;
		}
		return $isSaved;
	}
}
?>