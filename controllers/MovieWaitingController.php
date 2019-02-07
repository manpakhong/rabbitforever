<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( SERVICES_PATH . '/MovieWaitingMgr.php');
include_once( SERVICES_PATH . '/CodeMgr.php');
include_once( SOS_PATH . '/MovieWaitingSo.php');
include_once( SOS_PATH . '/CodeSo.php');
include_once( VOS_PATH . '/MovieWaitingPageVo.php');
include_once( VOS_PATH . '/MovieWaitingVo.php');
include_once( EOS_PATH . '/CodeEo.php');

include_once( CONTROLS_PATH . '/MovieWaitingControl.php');
include_once( CONTROLS_PATH . '/MovieControl.php');
include_once( CONTROLS_PATH . '/MovieFileUploadControl.php');
include_once( HELPERS_PATH . '/MovieWaitingControllerHelper.php');
class MovieWaitingController extends Controller{
	private $className;
	private $logger;
	private $movieWaitingMgr;
	private $movieWaitingPageVo;
	private $movieWaitingControl;
	private $movieFileUploadControl;
	private $movieControl;
	private $movieWaitingPageBundlesEo;
	private $moviePageBundlesEo;
	private $codeMgr;
	private $movieWaitingVoArray;
	private $helper;
	
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
		$this->checkAndFillPostData();
		$this->movieWaitingPageBundlesEo = $this->bundlesFactory->getInstanceOfMovieWaitingPageBundlesEo();
		$this->moviePageBundlesEo = $this->bundlesFactory->getInstanceOfMoviePageBundlesEo();
	} // end constructor
	public function getMovieWaitingPageBundlesEo(){
		return $this->movieWaitingPageBundlesEo;
	}
	private function init(){
		$this->movieWaitingMgr = new MovieWaitingMgr();
		$this->codeMgr = new CodeMgr();
		$this->movieWaitingControl = new MovieWaitingControl();
		$this->movieFileUploadControl = new MovieFileUploadControl();
		$this->movieControl = new MovieControl();
		$this->helper = new MovieWaitingControllerHelper($this->defaultLanguage);
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	private function renderStatusCode(){
		try{
			$so = new CodeSo();
			$so->setCodeType(CodeEo::$CODE_TYPE_MOVIE_STATUS);
			$movieStatusArray = $this->codeMgr->select($so);
			if (isset($movieStatusArray)){
				foreach($movieStatusArray as $key=>$value){
					$value->setDefaultLang($this->defaultLanguage);
					$value->setLang($this->lang);
					echo '<input type="hidden" class="' . $value->getCode() . '" value="' . $value->getDesc() . '" />'; 
				}
			}
		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->renderStatusCode()',$ex );
			throw $ex;
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
	
	private function createMovieWaitingVoArray($dataInstance){
		try {
			//$this->logger->info($this->className . '->createCategoryVo() - ' . print_r($dataInstance,1));
			if (isset($dataInstance)){

				$movieWaitingVoArray = array();
				
				foreach ($dataInstance as $key => $value){
					$movieWaitingVo = new MovieWaitingVo();
					$movieWaitingVo->id = $value->id;
					$movieWaitingVo->movieId = $value->movieId;
					$movieWaitingVo->movieNameTc = $value->movieNameTc;
					$movieWaitingVo->movieNameEn = $value->movieNameEn;
					$movieWaitingVo->waitingSeq = $value->waitingSeq;
					$movieWaitingVo->status = $value->status;
					$movieWaitingVo->statusString = $value->statusString;
					$movieWaitingVo->createdBy = $value->createdBy;
					$movieWaitingVo->updatedBy = $value->updatedBy;
					$movieWaitingVo->createdDate = $value->createdDate;
					$movieWaitingVo->updatedDate = $value->updatedDate;
					$movieWaitingVo->createdDateString = $value->createdDateString;
					$movieWaitingVo->updatedDateString = $value->updatedDateString;
					$movieWaitingVo->remarks = $value->remarks;
					
					array_push($movieWaitingVoArray, $movieWaitingVo);
// 					$this->logger->info( $this->className . '->createMovieWaitingVoArray() - $this->movieWaitingVoArray=' . print_r($movieWaitingVoArray, 1));
				}
				$this->movieWaitingVoArray = $movieWaitingVoArray;
				$this->movieWaitingPageVo->movieWaitingVoArray = $movieWaitingVoArray;
			} else {
				// 				$this->logger->info($this->className . '->createCategoryVo() - !isset($dataInstance)');
			}
			
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->createMovieWaitingVoArray() - $dataInstance=' . $dataInstance ,$ex );
			throw $ex;
		}
		
	}
	
	public function renderBundleJs(){
		try{
			$this->commonPageBundlesEo->printAllPropertiesToJsBundleVo();
			$this->movieWaitingPageBundlesEo->printAllPropertiesToJsBundleVo();
			$this->moviePageBundlesEo->printAllPropertiesToJsBundleVo();
			$this->renderStatusCode();
		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->renderBundleJs() - $this->commonPageBundlesEo=' . print_r($this->$commonPageBundlesEo,1), $ex);
			throw $ex;
		}
	}
	public function renderMovieControl(){
		try{
			$this->movieControl->render();
		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->getVo() - $this->renderMovieControl=' . print_r($this->movieWaitingPageVo ,1), $ex);
			throw $ex;
		}
	}
	public function renderMovieFileUploadControl(){
		try{
			$this->movieFileUploadControl->render();
		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->getVo() - $this->renderMovieFileUploadControl=' . print_r($this->movieWaitingPageVo ,1), $ex);
			throw $ex;
		}
	}
	public function renderMovieWaitingControl(){
		try{
			$userSessionVo = NULL;
			if (isset($this->userSessionVo)){
				$userSessionVo = $this->userSessionVo;
			}
			$userVo;
			if (isset($this->userSessionVo->userVo)){
				$userVo = $userSessionVo->userVo;
			}
			$isAuthenticated = TRUE;
			if (isset($userVo) && isset($userVo->isAuthenticated)){
				if ($userVo->isAuthenticated){
				} else {
					$isAuthenticated = FALSE;
				}
			} else {
				$isAuthenticated = FALSE;
			}
			if (!$isAuthenticated){
				echo '<span class="systemMessageSpan">' . $this->commonPageBundlesEo->getUserDoesNotLogin() . '</span>';
			} else {
				$this->movieWaitingControl->render();
			}
			

		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->getVo() - $this->renderMovieWaitingControl=' . print_r($this->movieWaitingPageVo ,1), $ex);
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