<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( CONTROLLERS_PATH . '/MovieWaitingController.php');
include_once( UTILS_PATH . '/CommonUtils.php');
include_once( VOS_PATH . '/MovieWaitingPageVo.php');
include_once( VOS_PATH . '/MovieWaitingVo.php');
// if (session_status() == PHP_SESSION_NONE) {
// 	sesson_start();
// }
$logger = RabbitLogger::getLogger('MovieWaitingCommand');
$movieWaitingController;
if (isset($_POST['data'])){
	$movieWaitingController = new MovieWaitingController();
	$vo = $movieWaitingController->getVo();
	$commonUtils = CommonUtils::getInstance();
	$movieWaitingPageVo;
	if (isset($vo)){
		$command = $vo->command;
		$dataClassName = $vo->dataClassName;
		if($dataClassName == MovieWaitingPageVo::DATA_CLASS_NAME_MOVIE_WAITING_VO){
			switch($command){
				case VO::$CMD_TYPE_SELECT:
					selectMovieWaitingVo();
					break;
				case VO::$CMD_TYPE_INSERT:
					saveMovieWaitingVo();
					break;
				case VO::$CMD_TYPE_UPDATE:
					saveMovieWaitingVo();
					break;
				case VO::$CMD_TYPE_BATCH_SAVE:
					saveMovieWaitingVoArray();
					break;
				case VO::$CMD_TYPE_DELETE:
					deleteMovieWaitingVo();
					break;
			}
		}
	}
}
function saveMovieWaitingVoArray(){
	global $logger;
	global $movieWaitingController;
	$movieWaitingController->saveVo();
	$movieWaitingPageVo= $movieWaitingController->getVo();
	$movieWaitingPageVoArray = (array) $movieWaitingPageVo;
	$jsonEncoded = json_encode($movieWaitingPageVoArray);
	echo $jsonEncoded;
}
function selectMovieWaitingVo(){
	global $logger;
	global $movieWaitingController;
	$movieWaitingController->selectMovieWaitingVo();
	$movieWaitingVo = $movieWaitingController->getVo();
	$movieWaitingPageArray = (array) $movieWaitingPageVo;
	$jsonEncoded = json_encode($movieWaitingPageArray);
	echo $jsonEncoded;
}
function saveMovieWaitingVo(){
	global $logger;
	global $movieWaitingController;
	$movieWaitingController->saveVo();
	$movieWaitingVo = $movieWaitingController->getVo();
	$movieWaitingPageArray = (array) $movieWaitingPageVo;
	$jsonEncoded = json_encode($movieWaitingPageArray);
	echo $jsonEncoded;
}
function deleteMovieWaitingVo(){
	global $logger;
	global $movieWaitingController;
	$movieWaitingController->deleteMovieWaitingVo();
	$movieWaitingVo = $movieWaitingController->getVo();
	$movieWaitingPageArray = (array) $movieWaitingPageVo;
	$jsonEncoded = json_encode($movieWaitingPageArray);
	echo $jsonEncoded;
}
?>