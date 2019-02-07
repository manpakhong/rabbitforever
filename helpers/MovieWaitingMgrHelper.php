<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( HELPERS_PATH . '/Helper.php');
include_once( SERVICES_PATH . '/MovieMgr.php');
include_once( SOS_PATH . '/MovieSo.php');
include_once( SERVICES_PATH . '/CodeMgr.php');
include_once( SOS_PATH . '/CodeSo.php');
include_once( EOS_PATH . '/CodeEo.php');
include_once( EOS_PATH . '/SystemConfigEo.php');

class MovieWaitingMgrHelper extends Helper{
	private $className;
	private $logger;
	private $movieMgr;
	private $codeMgr;
	private $movieEoArray;
	private $movieStatusCodeEoArray;
	private $idArray;
	
	public function __construct($defaultLang = NULL){
		parent::__construct($defaultLang);
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
	}
	private function init(){
		$this->movieMgr = new MovieMgr();
		$this->codeMgr = new CodeMgr();
	}
	private function fillClassName(){
		if (!isset($this->className)){
			$this->className =  __CLASS__;
		}
	}
	
	public function loadMovieIdArrayFromMovieWaitingEoArray($movieWaitingEoArray){
		$idArray = NULL;
		try {
			if (!isset($idArray)){
				if (isset($movieWaitingEoArray)){
					$idArray = array();
					foreach ($movieWaitingEoArray as $key=>$value){
						array_push($idArray, $value->getMovieId());
					}
				}
			}
			$this->idArray = $idArray;
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->getIdArrayFromVo() - $vo=' . print_r($vo, 1) ,$ex );
			throw $ex;
		}
	}
	public function loadMovieCodeArray(){
		$movieStatusCodeEoArray = NULL;
		try {
			if (!isset($this->movieStatusCodeEoArray)){
				$so = new CodeSo();
				$so->setCodeType(CodeEo::$CODE_TYPE_MOVIE_STATUS);
				$movieStatusCodeEoArray = $this->codeMgr->select($so);
				$this->movieStatusCodeEoArray = $movieStatusCodeEoArray;
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->loadMovieCodeArray() ' ,$ex );
			throw $ex;
		}
	}
	public function fillMovieWaitingVo(&$movieWaitingVo){
		try {
			if (!isset($this->movieEoArray)){
				if (isset($this->idArray)){
					$so = new MovieSo();
					$so->setIdArray($this->idArray);
					//print_r($so);
					$movieEoArray = $this->movieMgr->batchSelectBySoIdArray($so);
					$this->movieEoArray = $movieEoArray;
				}
			}

			if (isset($movieWaitingVo->movieId)){
				$id = $movieWaitingVo->movieId;
				$movieEo = $this->getMovieEoFromArray($id);
				if (isset($movieEo)){
					$movieWaitingVo->movieNameEn = $movieEo->getMovieNameEn();
					$movieWaitingVo->movieNameTc = $movieEo->getMovieNameTc();
				}				
			}
			
			if (isset($movieWaitingVo->status)){
				$status = $movieWaitingVo->status;
				$movieStatusCodeEo = $this->getMovieStatusCodeEoFromArray($status);
				if (isset($movieStatusCodeEo)){
					if(!isset($this->lang)){
						$this->lang = $this->defaultLang;
					}
					if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
						$movieWaitingVo->statusString= $movieStatusCodeEo->getDescTc();
					} else
						if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
							$movieWaitingVo->statusString= $movieStatusCodeEo->getDescEn();
					} else {
						$movieWaitingVo->statusString= $movieStatusCodeEo->getDescEn();
					}
				}
			}
			
			
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->fillMovieWaitingVo() - $propertiesString=' . print_r($propertiesString, 1) ,$ex );
			throw $ex;
		}
		
	}
	private function getMovieStatusCodeEoFromArray($status){
		$movieStatusCodeEo = NULL;
		try {
			
			
			if (isset($this->movieStatusCodeEoArray)){
				foreach($this->movieStatusCodeEoArray as $key=>$value){
					$eoStatus = $value->getCode();
					if ($eoStatus== $status){
						$movieStatusCodeEo = $value;
						break;
					}
				}
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->getMovieStatusCodeEoFromArray() - $status=' . $status,$ex );
			throw $ex;
		}
		return $movieStatusCodeEo;
	}
	private function getMovieEoFromArray($id){
		$movieEo = NULL;
		try {
			if (isset($this->movieEoArray)){
				foreach($this->movieEoArray as $key=>$value){
					$eoId = $value->getId();
					if ($eoId == $id){
						$movieEo = $value;
						break;
					}
				}
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->getMovieEoFromArray() - $id=' . $id ,$ex );
			throw $ex;
		}
		return $movieEo;
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