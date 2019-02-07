<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once ( CONTROLLERS_PATH . '/Controller.php');
include_once( SERVICES_PATH . '/UserMgr.php');
include_once ( EOS_PATH . '/UserEo.php' );
include_once( VOS_PATH . '/UserVo.php');
include_once (VOS_PATH . '/LoginPageVo.php');
include_once (SOS_PATH . '/UserSo.php');

class LoginController extends Controller{
	private $className;
	private $logger;
	private $userMgr;
	private $loginPageVo;
	private $loginPageBundlesEo;
	function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
		$this->checkAndFillPostData();
		$this->loginPageBundlesEo = $this->bundlesFactory->getInstanceOfLoginPageBundlesEo();
	}
	private function init(){
		$this->userMgr = new UserMgr ();
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	public function getLoginPageBundlesEo(){
		return $this->loginPageBundlesEo;
	}
	public function getCommonPageBundlesEo(){
		return $this->commonPageBundlesEo;
	}
	public function saveVo(){
		$isSaved = NULL;
		try {
			
		
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->saveVo() - ',$ex );
			throw $ex;
		}
		return $isSaved;
	}
	public function getVo(){
		$vo;
		try {
			$vo = $this->loginPageVo;
				
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->getVo() - ',$ex );
			throw $ex;
		}
		return $vo;
	}
	public function logoutUser(){
		try {
			if (isset($this->loginPageVo)){
				$userVo = $this->loginPageVo->userVo;
				if (isset($userVo)){
					$userName = $userVo->userName;
					if (isset($_SESSION['userSessionVo'])){
						unset($_SESSION['userSessionVo']);
					}
				}
				$userVo->isLogoff = TRUE;
				$this->loginPageVo ->userVo = $userVo;
			}
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->logoutUser() - ',$ex );
			throw $ex;
		}
	}
	public function authenticateUserLogin(){
		$isAuthenticated = FALSE;
		try {
			if (isset($this->loginPageVo)){
				$userVo = $this->loginPageVo->userVo;
				if (isset($userVo)){
					$userName = $userVo->userName;
					$password = $userVo->password;
					$so = new UserSo();
					$so->setUserName($userName);
					$userEoArray = $this->userMgr->select($so);
					if (isset($userEoArray)){
						foreach ($userEoArray as $key => $value){
							$eoUserName = $value->getUserName();
							$eoPassword = $value->getPassword();
							
							if ($eoPassword == $password){
								$isAuthenticated = TRUE;
								$userVo = new UserVo($value);
								$userVo->isAuthenticated = TRUE;
								$this->loginPageVo->userVo = $userVo;
							}
						}
					}
				}
			}
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->authenticateUserLogin() - ',$ex );
			throw $ex;
		}
		return $isAuthenticated;
	}
	private function checkAndFillPostData(){
		try {
			if (isset($_POST['data'])){
				$dataString = $_POST['data'];
				$dataObj = json_decode(stripslashes($dataString));
				$vo = $dataObj->vo;
				if (!isset($this->loginPageVo)){
					$this->loginPageVo = new LoginPageVo();
					if (isset($vo->command)){
						$this->loginPageVo->command = $vo->command;
					}
					if (isset($vo->voId)){
						$this->loginPageVo->voId = $vo->voId;
					}
					if (isset($vo->dataClassName)){
						$this->loginPageVo->dataClassName = $vo->dataClassName;
					}
					
					if (isset($vo->dataInstance)){
						$dataInstance = $vo->dataInstance;
						$userVo = new UserVo();
						$userVo->userName = $dataInstance->userName;
						$userVo->password = $dataInstance->password;
						$this->loginPageVo->userVo = $userVo;
					}
				}
				$this->logger->info($this->className . '->checkAndFillPostData() - $dataString=' . $dataString);
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->checkAndFillPostData() - $_POST["data"]=' . $_POST['data'], $ex );
			throw $ex;
		}
	}

}


?>