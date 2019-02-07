<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (FACTORIES_PATH . '/BundlesFactory.php');

abstract class Manager{
	private $className;
	private $logger;
	protected $bundlesFactory;
	protected $systemConfigEo;
	protected $userSessionVo;
	public function __construct(){
		try {
			$this->fillClassName();
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