<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( CONTROLLERS_PATH . '/MoviePageController.php');
include_once( UTILS_PATH . '/CommonUtils.php');
include_once( VOS_PATH . '/MoviePageVo.php');
include_once( VOS_PATH . '/MovieVo.php');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$logger = RabbitLogger::getLogger('MovieCommand');
$movieController;
if (isset($_POST['data'])){
	$movieController = new MoviePageController();
	$vo = $movieController->getVo();
	$commonUtils = CommonUtils::getInstance();
	$moviePageVo;
	if (isset($vo)){
		$command = $vo->command;
		$dataClassName = $vo->dataClassName;
		if($dataClassName == MoviePageVo::DATA_CLASS_NAME_MOVIE_VO){
			switch($command){
				case VO::$CMD_TYPE_SELECT:
					selectMovieVo();
					break;
				case VO::$CMD_TYPE_INSERT:
					saveMovieVo();
					break;
				case VO::$CMD_TYPE_UPDATE:
					saveMovieVo();
					break;
				case VO::$CMD_TYPE_DELETE:
					deleteMovieVo();
					break;
			}
		}
	}
}
function selectMovieVo(){
	global $logger;
	global $movieController;
	$movieController->selectMovieVo();
	$moviePageVo = $movieController->getVo();
	$moviePageArray = (array) $moviePageVo;
// 	$logger->info('MoviePageCommand' . '->selectMovieVo() - $moviePageArray=' . print_r($moviePageArray, 1));
	$jsonEncoded = json_encode($moviePageArray);
// 	$logger->info('MoviePageCommand' . '->selectMovieVo() - $jsonEncoded=' . print_r($jsonEncoded, 1));
	echo $jsonEncoded;
}
function saveMovieVo(){
	global $logger;
	global $movieController;
	$movieController->saveVo();
	$moviePageVo = $movieController->getVo();
	$moviePageArray = (array) $moviePageVo;
	$jsonEncoded = json_encode($moviePageArray);
	echo $jsonEncoded;
}
function deleteMovieVo(){
	global $logger;
	global $movieController;
	$movieController->deleteMovieVo();
	$movieVo = $movieController->getVo();
	$moviePageArray = (array) $moviePageVo;
	$jsonEncoded = json_encode($moviePageArray);
	echo $jsonEncoded;
}
?>