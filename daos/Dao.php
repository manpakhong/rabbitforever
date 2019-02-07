<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (FACTORIES_PATH . '/ConnectionFactory.php');
abstract class Dao{
	private $className;
	private $logger;
	private $connectionFactory;
	protected $connection;
	protected $bundlesFactory;
	protected $systemConfigEo;
	public function __construct(){
		try {
			$this->fillClassName();
			$this->connectionFactory = ConnectionFactory::getInstance();
			$this->connection = $this->connectionFactory->getConnection();
			if ($this->connection->connect_errno){
				$warningMsg = $this->className . '->__construct() - Failed to connect to Sql:('.
						$this->connection->connect_errno . ')' . 
						$this->connection->connect_error;
				$this->logger->warn ( $warningMsg );
			}
			$this->init();
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->__construct()' ,$ex );
			throw $ex;
		}
	}
	private function init(){
		$this->bundlesFactory = BundlesFactory::getInstance();
		$this->systemConfigEo = $this->bundlesFactory->getInstanceOfSystemConfigEo();
	}
	private function fillClassName(){
		if (!isset($this->className)){
			$this->className =  __CLASS__;
		}
	}
	abstract public function select($so);
	abstract public function insert($eo);
	abstract public function update($eo);
	abstract public function delete($eo);
}
?>