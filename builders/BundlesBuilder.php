<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (UTILS_PATH . '/FileUtils.php');
include_once (UTILS_PATH . '/BundleUtils.php');
include_once (EOS_PATH . '/CodeEo.php');
abstract class BundlesBuilder{
	private $className;
	private $logger;
	protected $bundleEo;
	protected $fileUtils;
	protected $bundleUtils;
	protected $fileName;
	protected $currentLanguage;
	protected $defaultLanguage;
	protected $systemConfigEo;
	public function __construct($fileName, $bundle = NULL){
		$this->bundle = $bundle;
		$this->fileName = $fileName;
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger(get_class($this));
		$this->init();
		$this->checkGetParams();
	}
	public function setSystemConfigEo($systemConfigEo){
		$this->systemConfigEo = $systemConfigEo;
		$this->defaultLanguage = $systemConfigEo->getDefaultLanguage();
	}
	private function fillClassName(){
		if (!isset($this->className)){
			$this->className =  __CLASS__;
		}
	}
	private function init(){
		$this->fileUtils = new FileUtils();
		$this->bundleUtils = new BundleUtils();
	}
	private function checkGetParams(){
		try {
			if (isset($_GET[Controller::$PAGING_LANG])){
				$this->currentLanguage = $_GET[Controller::$PAGING_LANG];
			} else {
				$this->currentLanguage = CodeEo::$CODE_TYPE_LANGAUGE_LANG_EN;
			}
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->checkPostParams() - ',$ex );
			throw $ex;
		}
	}
	public function getBundleEo(){
		return $this->bundleEo;
	}
	abstract public function buildBundle();

}
?>