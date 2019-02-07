<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( CONTROLLERS_PATH . '/MovieTypeController.php');
include_once( UTILS_PATH . '/CommonUtils.php');
include_once( VOS_PATH . '/MovieTypePageVo.php');
include_once( VOS_PATH . '/MovieTypeVo.php');
if (session_status() == PHP_SESSION_NONE) {
	sesson_start();
}
$logger = RabbitLogger::getLogger('MovieTypeCommand');
$movieTypeController;
if (isset($_POST['data'])){
	$movieTypeController = new MovieTypeController();
	$vo = $movieTypeController->getVo();
	$commonUtils = CommonUtils::getInstance();
	$movieTypePageVo;
	if (isset($vo)){
		$command = $vo->command;
		$dataClassName = $vo->dataClassName;
		if($dataClassName == MovieTypeVo::DATA_CLASS_NAME_XXX_VO){
			switch($command){
				case VO::$CMD_TYPE_SELECT:
					selectMovieTypeVo();
					break;
				case VO::$CMD_TYPE_INSERT:
					saveMovieTypeVo();
					break;
				case VO::$CMD_TYPE_UPDATE:
					saveMovieTypeVo();
					break;
				case VO::$CMD_TYPE_DELETE:
					deleteMovieTypeVo();
					break;
			}
		}
	}
}
function selectMovieTypeVo(){
	global $logger;
	global $movieTypeController;
	$movieTypeController->selectMovieTypeVo();
	$movieTypeVo = $movieTypeController->getVo();
	$movieTypePageArray = (array) $movieTypePageVo;
	$jsonEncoded = json_encode($movieTypePageArray);
	echo $jsonEncoded;
}
function saveMovieTypeVo(){
	global $logger;
	global $movieTypeController;
	$movieTypeController->saveMovieTypeVo();
	$movieTypeVo = $movieTypeController->getVo();
	$movieTypePageArray = (array) $movieTypePageVo;
	$jsonEncoded = json_encode($movieTypePageArray);
	echo $jsonEncoded;
}
function deleteMovieTypeVo(){
	global $logger;
	global $movieTypeController;
	$movieTypeController->deleteMovieTypeVo();
	$movieTypeVo = $movieTypeController->getVo();
	$movieTypePageArray = (array) $movieTypePageVo;
	$jsonEncoded = json_encode($movieTypePageArray);
	echo $jsonEncoded;
}
?>