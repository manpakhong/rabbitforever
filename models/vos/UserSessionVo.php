<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once ( EOS_PATH . '/UserEo.php' );
include_once (VOS_PATH . '/Vo.php');
include_once (VOS_PATH . '/EnvParamVo.php');
class UserSessionVo extends Vo{
	public $sessionStartDateTime;
	public $userVo;
	public $envParamVo;
}
?>