<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once(LOG4PHP_PATH . '/Logger.php');

class RabbitLogger extends Logger{
	public static function configure($configuration = NULL, $configurator = NULL){
		Logger::configure(LOG4PHP_CONFIG_FILE);
	}
}
?>