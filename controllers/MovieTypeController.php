<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( SERVICES_PATH . '/MovieTypeMgr.php');
include_once( SOS_PATH . '/MovieTypeSo.php');
include_once( VOS_PATH . '/MovieTypePageVo.php');
include_once( VOS_PATH . '/MovieTypeVo.php');
include_once( EOS_PATH . '/MovieWaitingPageBundlesEo.php');
class MovieTypeController extends Controller{
	private $className;
	private $logger;
	private $movieTypeMgr;
	private $movieTypeVo;
	private $movieTypePageVo;
	private $movieWaitingPageBundlesEo;
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
		$this->movieWaitingPageBundlesEo = $this->bundlesFactory->getInstanceOfMovieWaitingPageBundlesEo();
		$this->checkAndFillPostData();
	} // end constructor
	private function init(){
		$this->movieTypeMgr = new MovieTypeMgr();
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
				$vo = $dataObj->vo;
				if(!isset($this->movieTypePageVo)){
				    $this->$movieTypePageVo = new MovieTypePageVo();
					if (isset($vo->command)){
						$this->movieTypeVo->command = $vo->command;
					}
					if (isset($vo->voId)){
						$this->movieTypeVo->voId = $vo->voId;
					}
					if (isset($vo->dataClassName)){
						$this->movieTypeVo->dataClassName = $vo->dataClassName;
					}
					if (isset($vo->dataInstance)){
						$dataInstance = $vo->dataInstance;
						$movieTypeVo = new MovieTypeVo();
						$movieTypeVo->id = $dataInstance->id;
						$movieTypeVo->movieTypeId = $dataInstance->movieTypeId;
						$movieTypeVo->movieTypeDescEn = $dataInstance->movieTypeDescEn;
						$movieTypeVo->movieTypeDescTc = $dataInstance->movieTypeDescTc;
						$movieTypeVo->createdBy = $dataInstance->createdBy;
						$movieTypeVo->updatedBy = $dataInstance->updatedBy;
						$movieTypeVo->createdDate = $dataInstance->createdDate;
						$movieTypeVo->updatedDate = $dataInstance->updatedDate;
						$movieTypeVo->remarks = $dataInstance->remarks;
						$this->movieTypePageVo->movieTypeVo = $movieTypeVo;
					}
				}
				$this->logger->info($this->className . '->checkAndFillPostData() - $dataString=' . $dataString);
			}
		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->checkAndFillPostData() - $_POST["data"]=' . $_POST["data"] ,$ex );
			throw $ex;
		}
	}
	public function getVo(){
		$vo = NULL;
		try{
		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->getVo() - $this->movieTypePageVo=' . print_r($this->movieTypePageVo ,1), $ex);
			throw $ex;
		}
		return $vo;
	} // end getVo()
	public function saveVo(){
		try{
		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->getVo() - $this->movieTypePageVo=' . print_r($this->movieTypePageVo ,1), $ex);
			throw $ex;
		}
	} // end saveVo()
}
?>