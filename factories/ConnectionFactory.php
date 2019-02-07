<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (FACTORIES_PATH . '/ConnectionReusableBuilder.php');
class ConnectionFactory{
	private $className;
	private $logger;
	private static $connectionFactory;
	private static $connectionReusableBuilder;
	
	public static function getInstance(){
		if(!isset(ConnectionFactory::$connectionFactory)){
			ConnectionFactory::$connectionFactory = new ConnectionFactory();
		}
		return ConnectionFactory::$connectionFactory;
	}
	
	private function __construct() {
		$this->getClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
	}
	
	private function getClassName(){
		if (!isset($this->className)){
			$this->className =  __CLASS__;
		}
		return $this->className;
	}
	
	public function getConnection(){
		$connection;
		try {
			$connectionReusable = $this->getConnectionReusableObject();
			$connectionReusableObject = $connectionReusable->getReusableObject();
			$connection = $connectionReusableObject;
			
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->getConnection() - ' ,$ex );
			throw $ex;
		}
		return $connection;
	}
	
	private function getConnectionReusableObject() {
		$connectionReusable;
		try {
			$connectionReusableBuilder;

			if (!isset(ConnectionFactory::$connectionReusableBuilder)){
				ConnectionFactory::$connectionReusableBuilder = ConnectionReusableBuilder::getInstance();
			}
			$connectionReusableBuilder = ConnectionFactory::$connectionReusableBuilder;
			$connectionReusable = $connectionReusableBuilder->buildReusable();

		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->buildConnection() - ' ,$ex );
			throw $ex;
		}
		return $connectionReusable;
	}
}
?>