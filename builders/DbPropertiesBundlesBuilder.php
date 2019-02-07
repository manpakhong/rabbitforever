<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (BUILDERS_PATH . '/BundlesBuilder.php');
include_once (EOS_PATH . '/SystemConfigEo.php');

class DbPropertiesBundlesBuilder extends BundlesBuilder{
	private $className;
	private $logger;

	public function __construct($fileName, $bundle = NULL){
		parent::__construct($fileName, $bundle);
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger(get_class($this));
		if ($this->bundle === NULL){
			$this->bundle = new MySqlDbPropertiesEo();
		}
	}
	private function init(){

	}
	private function fillClassName(){
		if (!isset($this->className)){
			$this->className =  __CLASS__;
		}
	}
	public function buildBundle(){
		$dbPropertiesEo = NULL;
		try {
			$fileContent = $this->fileUtils->readTextFile ( $this->fileName );
			$propertyArray = $this->bundleUtils->parseProperties($fileContent);
			if (isset($propertyArray)){
				$host = $propertyArray['host'];
				$port = $propertyArray['port'];
				$schema = $propertyArray['schema'];
				$userName = $propertyArray['username'];
				$password = $propertyArray['password'];
				$systemSchema = $propertyArray['system_schema'];
			
			
				$dbPropertiesEo = new MySqlDbPropertiesEo();
				if (isset($host)){
					$dbPropertiesEo->setHost(trim($host));
				}
				if (isset($port)){
					$dbPropertiesEo->setPort(trim($port));
				}
				if (isset($schema)){
					$dbPropertiesEo->setSchema(trim($schema));
				}
				if (isset($userName)){
					$dbPropertiesEo->setUserName(trim($userName));
				}
				if (isset($password)){
					$dbPropertiesEo->setPassword(trim($password));
				}
				if (isset($systemSchema)){
					$dbPropertiesEo->setSystemSchema(trim($systemSchema));
				}
				if (isset($fixedIpAddress)){
					$dbPropertiesEo->setFixedIpAddress($fixedIpAddress);
				}
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->buildBundle() - $this->fileName=' . print_r($this->fileName,1) ,$ex );
			throw $ex;
		}
		$this->bundleEo = $dbPropertiesEo;
	}
}
?>