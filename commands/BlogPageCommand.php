<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( CONTROLLERS_PATH . '/BlogController.php');
include_once( UTILS_PATH . '/CommonUtils.php');
include_once( VOS_PATH . '/BlogPageVo.php');
include_once( VOS_PATH . '/BlogVo.php');
// if (session_status() == PHP_SESSION_NONE) {
// 	sesson_start();
// }
$logger = RabbitLogger::getLogger('BlogPageCommand');
$blogController = NULL;
if (isset($_POST['data'])){
	$blogController = new BlogController();
	$vo = $blogController->getVo();
	
// 	$categoryVo = $blogController->getCategoryVo();
// 	global $logger;
// 	$logger->info('if (isset())-' . print_r($categoryVo, 1));
	
	$commonUtils = CommonUtils::getInstance();
	if (isset($vo)){
		$command = $vo->command;
		$dataClassName = $vo->dataClassName;
		if ($dataClassName == BlogPageVo::DATA_CLASS_NAME_BLOG_VO){
			switch($command){
				case VO::$CMD_TYPE_SELECT:
					selectBlogVo();
					break;
				case VO::$CMD_TYPE_INSERT:
					saveBlogVo();
					break;
				case VO::$CMD_TYPE_UPDATE:
					saveBlogVo();
					break;
				case VO::$CMD_TYPE_DELETE:
					deleteBlogVo();
					break;
			}
		} else 
		if ($dataClassName == BlogPageVo::DATA_CLASS_NAME_CATEGORY_VO){
			switch($command){
				case VO::$CMD_TYPE_SELECT:
					selectCategoryVo();
					break;
				case VO::$CMD_TYPE_INSERT:
					break;
				case VO::$CMD_TYPE_UPDATE:
					break;
				case VO::$CMD_TYPE_DELETE:
					break;
			}
		} else 
		if ($dataClassName == BlogPageVo::DATA_CLASS_NAME_COOKIE_VO){
			switch ($command){
				case VO::$CMD_TYPE_COOKIE_UPDATE:
					updateCookieVo();
					break;
			}
		}
		
	}
}
function updateCookieVo(){
	global $logger;
	global $blogController;
	$blogController->updateCookieVo();
	$blogPageVo = $blogController->getVo();
	$blogPageArray = (array) $blogPageVo;
	$jsonEncoded = json_encode($blogPageArray);
	echo $jsonEncoded;
}
function selectCategoryVo(){
	global $logger;
	global $blogController;
	$blogController->selectCategoryVo();
	$blogPageVo = $blogController->getVo();
	$categoryVo = $blogController->getCategoryVo();

// 	$logger->info('selectCategoryVo' . print_r($blogPageVo, 1));
// 	$logger->info('if (isset())-' . print_r($categoryVo, 1));
	$blogPageVoArray = (array) $blogPageVo;
// 	$logger->info('BlogPageCommand->selectCategoryVo' . print_r($blogPageVoArray, 1));
	$jsonEncoded = json_encode($blogPageVoArray);
	$logger->info('BlogPageCommand->' . 'selectCategoryVo() - $jsonEncoded=' . $jsonEncoded);
	echo $jsonEncoded;
}
function selectBlogVo(){
	global $logger;
	global $blogController;
	$blogPageVo = $blogController->getVo();

	$blogPageVoArray = (array) $blogPageVo;

	$jsonEncoded = json_encode($blogPageVoArray);

	$logger->info('BlogPageCommand->' . 'selectBlogVo() - $jsonEncoded=' . $jsonEncoded);
// 	header('Content-Type: application/json');
	echo $jsonEncoded;
}
function saveBlogVo(){
	global $logger;
	global $blogController;
	$blogController->saveVo();
	$blogPageVo = $blogController->getVo();
	$blogPageArray = (array) $blogPageVo;
	$jsonEncoded = json_encode($blogPageArray);
	echo $jsonEncoded;
}
function deleteBlogVo(){
	global $logger;
	global $blogController;
	$blogController->deleteVo();
	$blogPageVo = $blogController->getVo();
	$blogPageArray = (array) $blogPageVo;
	$jsonEncoded = json_encode($blogPageArray);
	echo $jsonEncoded;
}
?>