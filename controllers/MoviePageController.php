<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( SERVICES_PATH . '/MovieMgr.php');
include_once( SERVICES_PATH . '/MovieTypeMgr.php');
include_once( SERVICES_PATH . '/CodeMgr.php');
include_once( SOS_PATH . '/CodeSo.php');
include_once( SOS_PATH . '/MovieTypeSo.php');
include_once( SOS_PATH . '/MovieSo.php');
include_once( VOS_PATH . '/MoviePageVo.php');
include_once( VOS_PATH . '/MovieVo.php');
include_once( VOS_PATH . '/MovieTypeVo.php');
include_once( VOS_PATH . '/CodeVo.php');
class MoviePageController extends Controller{
	private $className;
	private $logger;
	private $movieMgr;
	private $codeMgr;
	private $movieTypeMgr;
	private $moviePageVo;
	private $movieVo;
	private $movieTypeArray;
	private $classCodeArray;
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
		$this->checkAndFillPostData();
	} // end constructor
	private function init(){
		$this->movieMgr = new MovieMgr();
		$this->codeMgr = new CodeMgr();
		$this->movieTypeMgr = new MovieTypeMgr();
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	private function fillMovieClassInfo(){
		try {
			$so = new CodeSo();
			$codeArray = $this->codeMgr->select($so);
			$this->classCodeArray = $codeArray;
			
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->fillMovieClassInfo() - ',$ex );
			throw $ex;
		}
	}
	private function fillMovieTypeInfo(){
		try {
			$so = new MovieTypeSo();
			$movieTypeArray = $this->movieTypeMgr->select($so);
			$this->movieTypeArray = $movieTypeArray;
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->fillMovieTypeInfo() - ',$ex );
			throw $ex;
		}
	}
	private function checkAndFillPostData(){
		try{
			if (isset($_POST['data'])){
				$dataString = $_POST['data'];
				$dataObj = json_decode(stripslashes($dataString));
				$vo = $dataObj->vo;
				if(!isset($this->moviePageVo)){
					$this->moviePageVo = new MoviePageVo();
					if (isset($vo->command)){
						$this->moviePageVo->command = $vo->command;
					}
					if (isset($vo->voId)){
						$this->moviePageVo->voId = $vo->voId;
					}
					if (isset($vo->dataClassName)){
						$this->moviePageVo->dataClassName = $vo->dataClassName;
					}
					if (isset($vo->dataInstance)){
						$dataInstance = $vo->dataInstance;
						$movieVo = new MovieVo();
						$movieVo->id = $dataInstance->id;
						$movieVo->movieNameEn = $dataInstance->movieNameEn;
						$movieVo->movieNameTc = $dataInstance->movieNameTc;
						$movieVo->movieTypeId = $dataInstance->movieTypeId;
						$movieVo->movieTypeString = $dataInstance->movieTypeString;
						$movieVo->classCode = $dataInstance->classCode;
						$movieVo->classCodeString = $dataInstance->classCodeString;
						$movieVo->moviePic1 = $dataInstance->moviePic1;
						$movieVo->moviePic2 = $dataInstance->moviePic2;
						$movieVo->movieTrailor = $dataInstance->movieTrailor;
						$movieVo->createdBy = $dataInstance->createdBy;
						$movieVo->updatedBy = $dataInstance->updatedBy;
						$movieVo->createdDate = $dataInstance->createdDate;
						$movieVo->createdDateString = $dataInstance->createdDateString;
						$movieVo->updatedDate = $dataInstance->updatedDate;
						$movieVo->updatedDateString = $dataInstance->updatedDateString;
						$movieVo->remarks = $dataInstance->remarks;
						$this->moviePageVo->movieVo = $movieVo;
						$this->movieVo = $movieVo;
					}
				}
				$this->logger->info($this->className . '->checkAndFillPostData() - $dataString=' . $dataString);
			}
		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->checkAndFillPostData() - $_POST["data"]=' . $_POST["data"] ,$ex );
			throw $ex;
		}
	}
	public function selectMovieVo(){
		try{
			$so = new MovieSo();
			$movieNameEn = $this->movieVo->movieNameEn;
			$movieNameTc = $this->movieVo->movieNameTc;
			
			if (!empty($movieNameEn)){
				$movieNameEn = '%' . $movieNameEn . '%';
				$so->setMovieNameEn($movieNameEn);
			}
			if (!empty($movieNameTc)){
				$movieNameTc = '%' . $movieNameTc . '%';
				$so->setMovieNameTc($movieNameTc);
			}

			
			if (!empty($this->movieVo->movieTypeId) && $this->movieVo->movieTypeId != -1){
				$so->setMovieTypeId($this->movieVo->movieTypeId);
			}
			if (!empty($this->movieVo->classCode)){
				$so->setClassCode($this->movieVo->classCode);
			}
// 			$this->logger->info(print_r($so, 1));
			$movieEoArray = $this->movieMgr->selectLike($so);
			$movieVoArray = array();
			if (isset($movieEoArray)){
				foreach($movieEoArray as $key=>$value){
					$movieVo = new MovieVo($value);
					array_push($movieVoArray, $movieVo);
				}
			}
// 			$this->logger->info($this->className . '->selectMovieVo() - $movieVoArray=' . print_r($movieVoArray, 1));
			
			$this->moviePageVo->movieVoArray = $movieVoArray;
		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->selectMovieVo() - $this->moviePageVo=' . print_r($this->moviePageVo ,1), $ex);
			throw $ex;
		}
	}
	public function getVo(){
		$vo = NULL;
		try{
			$vo = $this->moviePageVo;
		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->getVo() - $this->moviePageVo=' . print_r($this->moviePageVo ,1), $ex);
			throw $ex;
		}
		return $vo;
	} // end getVo()
	public function saveVo(){
		$isSaved = FALSE;
		try {
			if(isset($this->moviePageVo)){
				$vo = $this->moviePageVo->movieVo;
				$id = $vo->id;
				$eo = new MovieEo($vo);
				if (isset($id) && $id > 0){
					$affectedRow = $this->movieMgr->update($eo);
					if ($affectedRow == 1){
						$isSaved = TRUE;
					}
				} else {
					$eo->setId(NULL);
					$this->logger->info($this->className . '->saveVo() - $eo' . print_r($eo, 1));
					$id = $this->movieMgr->insert($eo);
					if (isset($id) && $id > 0){
						$eo->setId($id);
						$vo->id = $id;
						$isSaved = TRUE;
					}
				}
				if ($isSaved){
					$this->moviePageVo->isSaved = TRUE;
				} else {
					$this->moviePageVo->isSaved = FALSE;
				}
			}
		} catch ( Exception $ex ) {
			$this->logger->error( $this->className . '->getVo() - $this->moviePageVo=' . print_r($this->moviePageVo ,1), $ex);
			throw $ex;
		}
	} // end saveVo()
}
?>