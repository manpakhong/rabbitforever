<?php 
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
abstract class Control{
	private $className;
	private $logger;
	protected $bundlesFactory;
	protected $systemConfigEo;
	protected $currentLanguage;
	protected $commonPageBundlesEo;
	public function __construct(){
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
		$this->checkGetParams();
	}
	private function init(){
		$this->bundlesFactory = BundlesFactory::getInstance();
		$this->systemConfigEo = $this->bundlesFactory->getInstanceOfSystemConfigEo();
		$this->commonPageBundlesEo = $this->bundlesFactory->getInstanceOfCommonPageBundlesEo();
	}
	private function checkGetParams(){
		try {
			if (isset($_GET[Controller::$PAGING_LANG])){
				$this->currentLanguage = $_GET[Controller::$PAGING_LANG];
			} else {
				$this->currentLanguage =$this->systemConfigEo->getDefaultLanguage();
			}
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->checkPostParams() - ',$ex );
			throw $ex;
		}
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	abstract public function render();
}
?>