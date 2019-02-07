<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once ( EOS_PATH . '/UserEo.php' );
include_once (VOS_PATH . '/Vo.php');
define('DATA_CLASS_NAME_COOKIE_VO', 'CookieVo');
class ControlPageVo extends Vo{
	const DATA_CLASS_NAME_COOKIE_VO = DATA_CLASS_NAME_COOKIE_VO;
	public function __toString(){
		$objectString=NULL;
		$count = 0;
		foreach($this as $key => $value){
			if($count > 0){
				$objString = $objectString . ',';
			}
			$objectString = $objectString . '$key => $value ';
			$count = $count + 1;
		}
		return $objectString;
	}
}
?>