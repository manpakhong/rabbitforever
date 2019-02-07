<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once ( EOS_PATH . '/UserEo.php' );
include_once (VOS_PATH . '/Vo.php');
defined('DATA_CLASS_NAME_MOVIE_VO') or define('DATA_CLASS_NAME_MOVIE_VO', 'MovieVo');
class MoviePageVo extends Vo{
	const DATA_CLASS_NAME_MOVIE_VO= DATA_CLASS_NAME_MOVIE_VO;
	public $movieVo;
	public $movieVoArray;
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