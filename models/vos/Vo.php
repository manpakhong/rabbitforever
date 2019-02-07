<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
abstract class Vo{
	public static $CMD_TYPE_INSERT = 'INSERT';
	public static $CMD_TYPE_SELECT = 'SELECT';
	public static $CMD_TYPE_UPDATE = 'UPDATE';
	public static $CMD_TYPE_DELETE = 'DELETE';
	public static $CMD_TYPE_BATCH_SAVE = 'BATCH_SAVE';
	public static $CMD_TYPE_LOGIN = 'LOGIN';
	public static $CMD_TYPE_LOGOUT = 'LOGOUT';
	public static $CMD_TYPE_COOKIE_UPDATE = 'COOKIE_UPDATE';
	public $command;
	public $voId;
	public $dataClassName;
	public $dataInstance;
	public $isSaved;
}
?>