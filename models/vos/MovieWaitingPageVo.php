<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once ( EOS_PATH . '/UserEo.php' );
include_once (VOS_PATH . '/Vo.php');
defined('DATA_CLASS_NAME_MOVIE_WAITING_VO') or define('DATA_CLASS_NAME_MOVIE_WAITING_VO', 'MovieWaitingVoArray');
class MovieWaitingPageVo extends Vo{
	const DATA_CLASS_NAME_MOVIE_WAITING_VO= DATA_CLASS_NAME_MOVIE_WAITING_VO;
	public $movieWaitingVoArray;
	public $cookieVo;
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