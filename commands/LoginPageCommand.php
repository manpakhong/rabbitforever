<?php

include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( CONTROLLERS_PATH . '/LoginController.php');
include_once ( VOS_PATH . '/LoginPageVo.php');
include_once (VOS_PATH . '/UserSessionVo.php');
include_once (UTILS_PATH . '/CommonUtils.php');

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}


$logger = RabbitLogger::getLogger('LoginPageCommand');
//$logger->info($_POST['data']);
$loginController;
if (isset($_POST['data'])){
	$loginController = new LoginController();
	$vo = $loginController->getVo();
	$commonUtils = CommonUtils::getInstance();
	$loginPageVo;
	
	if (isset($vo)){
		$command = $vo->command;

		$loginPageVo = $loginController->getVo();
		$userVo;
		if (isset($loginPageVo)){
			$command = $loginPageVo->command;
			$dataClassName = $loginPageVo->dataClassName;
			switch($command){
				case VO::$CMD_TYPE_LOGIN:
					doLoginProcess();
					break;
				case VO::$CMD_TYPE_LOGOUT:
					doLogoutProcess();
					break;
			}
		}
	}
}
function doLoginProcess(){
	global $logger;
	global $loginController;
	$isAuthenticated = $loginController->authenticateUserLogin();
	$vo = $loginController->getVo();
	if ($isAuthenticated){
		$vo->isAuthenticated= TRUE;
	} else {
		$vo->isAuthenticated= FALSE;
	}

	$userVo = $vo->userVo;
	if (isset($userVo)){
		$userSessionVo = new UserSessionVo();
		$userSessionVo->userVo = $userVo;
		$sessionStartDateTime = new DateTime();
		$userSessionVo->sessionStartDateTime = $sessionStartDateTime;
		if (isset($_SESSION['userSessionVo'])){
			unset($_SESSION['userSessionVo']);
		}
		$_SESSION['userSessionVo'] = serialize($userSessionVo);

	}
	$message = 'Login successfully.';
	$title = 'Login response';
	$confirmUrl = '.';
	$loginPageArray = (array) $vo;
	$jsonEncoded = json_encode($loginPageArray);
	echo $jsonEncoded;
}
function doLogoutProcess(){
	global $logger;
	global $loginController;
	$loginController->logoutUser();
	$vo = $loginController->getVo();
	$userVo = $vo->userVo;
	$loginPageArray = (array) $vo;
	$jsonEncoded = json_encode($loginPageArray);
	echo $jsonEncoded;
}
?>