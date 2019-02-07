<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
// include_once( SERVICES_PATH . '/MovieWaitingMgr.php');
include_once( SERVICES_PATH . '/CodeMgr.php');
// include_once( SOS_PATH . '/MovieWaitingSo.php');
// include_once( SOS_PATH . '/CodeSo.php');
// include_once( VOS_PATH . '/MovieWaitingPageVo.php');
// include_once( VOS_PATH . '/MovieWaitingVo.php');
// include_once( EOS_PATH . '/CodeEo.php');

// include_once( CONTROLS_PATH . '/MovieWaitingControl.php');
// include_once( CONTROLS_PATH . '/MovieControl.php');
// include_once( CONTROLS_PATH . '/MovieFileUploadControl.php');
// include_once( HELPERS_PATH . '/MovieWaitingControllerHelper.php');
class GoogleMapPageController extends Controller{
	private $className;
	private $logger;
	private $codeMgr;
	private $helper;
	
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
		$this->checkAndFillPostData();
	} // end constructor
	private function init(){
		$this->codeMgr = new CodeMgr();
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	private function checkAndFillPostData(){
		try{
			
			if (isset($_POST['data'])){
				$dataString = $_POST['data'];
				$dataObj = json_decode(stripslashes($dataString));
				// 				$this->logger->info($this->className . '->checkAndFillPostData() - $dataObj=' . print_r($dataObj, 1));
				$vo = $dataObj->vo;
				if(!isset($this->movieWaitingPageVo)){
					$this->movieWaitingPageVo = new MovieWaitingPageVo();
					if (isset($vo->command)){
						$this->movieWaitingPageVo->command = $vo->command;
					}
					if (isset($vo->voId)){
						$this->movieWaitingPageVo->voId = $vo->voId;
					}
					if (isset($vo->dataClassName)){
						$this->movieWaitingPageVo->dataClassName = $vo->dataClassName;
					}
					$this->logger->info($this->className . '->checkAndFillPostData() - $vo=' . print_r($vo, 1));
					if ($this->movieWaitingPageVo->dataClassName == MovieWaitingPageVo::DATA_CLASS_NAME_MOVIE_WAITING_VO){
						$dataInstance = $vo->dataInstance;
						
						if (isset($dataInstance)){
							$this->createMovieWaitingVoArray($dataInstance);
						}
					}
				}
				//$this->logger->info($this->className . '->checkAndFillPostData() - $dataString=' . $dataString);
			}
		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->checkAndFillPostData() - $_POST["data"]=' . $_POST["data"] ,$ex );
			throw $ex;
		}
	}
		
	public function renderBundleJs(){
		try{
// 			$this->commonPageBundlesEo->printAllPropertiesToJsBundleVo();
// 			$this->movieWaitingPageBundlesEo->printAllPropertiesToJsBundleVo();
// 			$this->moviePageBundlesEo->printAllPropertiesToJsBundleVo();
// 			$this->renderStatusCode();
		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->renderBundleJs() - $this->commonPageBundlesEo=' . print_r($this->$commonPageBundlesEo,1), $ex);
			throw $ex;
		}
	}
	public function getVo(){
		$vo = NULL;
		
		if (!isset($this->movieWaitingPageVo)){
			$this->movieWaitingPageVo= new MovieWaitingPageVo();
		}
		if (!isset($this->movieWaitingVoArray)){
			$this->movieWaitingPageVo->movieWaitingVoArray= $this->movieWaitingVoArray;
		}
		// 		$this->logger->info($this->className . '->getVo() - $this->blogPageVo=' . print_r($this->blogPageVo,1));
		
		$vo =  $this->movieWaitingPageVo;
		
		try{
		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->getVo() - $this->movieWaitingPageVo=' . print_r($this->movieWaitingPageVo ,1), $ex);
			throw $ex;
		}
		return $vo;
	} // end getVo()
	
	public function saveVo(){
		$isSaved = FALSE;
		try{
			// 			$this->logger->info($this->className . '->saveVo() - saveVo!');
			if (isset($this->movieWaitingPageVo)){
				// 				$this->logger->info($this->className . '->saveVo() - saveVo1!');
				if (isset($this->movieWaitingPageVo->movieWaitingVoArray)){
					// 					$this->logger->info($this->className . '->saveVo() - saveVo2!');
					$movieIdArray = $this->helper->retrieveMovieIdArray($this->movieWaitingPageVo->movieWaitingVoArray);
					
					$isSaved = $this->helper->batchSaveOrUpdateMovieWaitingVoArray($this->movieWaitingPageVo->movieWaitingVoArray);
					$movieWaitingEoArray= $this->helper->selectMovieWaitingEoArrayNotInMovieIdArray($movieIdArray);
					if (isset($movieWaitingEoArray)){
						$isDeleted = $this->helper->batchDeleteMovieWaitingEoArray($movieWaitingEoArray);
					}
					// 					$this->logger->info(
					// 							$this->className . '-$isSaved='. $isSaved . ',$isDeleted=' . $isDeleted . ',$movieIdArray =' .
					// 							print_r($movieIdArray,1) . ',$movieWaitingEoArray='. print_r($movieWaitingEoArray,1)
					// 							);
					$this->movieWaitingPageVo->isSaved = $isSaved;
				}
			}
		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->getVo() - $this->movieWaitingPageVo=' . print_r($this->movieWaitingPageVo ,1), $ex);
			throw $ex;
		}
		return $isSaved;
	} // end saveVo()
}

?>