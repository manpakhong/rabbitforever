<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (FACTORIES_PATH . '/BundlesFactory.php');
class FileUtils {
	private $className;
	private $logger;
	private $bundlesFactory;
	private $systemConfigEo;
	function __construct() {
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger(get_class($this));

	}
	private function fillClassName(){
		if (!isset($this->className)){
			$this->className =  __CLASS__;
		}
	}
	private function getClassName(){
		if (!isset($this->className)){
			$this->className =  __CLASS__;
		}
		return $this->className;
	}
	private function init(){
		try {
			$this->bundlesFactory = BundlesFactory::getInstance();
			$this->systemConfigEo = $this->bundlesFactory->getInstanceOfSystemConfigEo();
		} catch ( Exception $ex ) {
			$this->logger->error ($className . '->init() ' ,$ex );
			throw $ex;
		}
	}
	public function readTextFile($fileName) {
		$fileString;
		try {
			if(isset($fileName)){
				$fileString = file_get_contents($fileName);
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($className . '->readTextFile() - $propertiesString=' . $propertiesString ,$ex );
			throw $ex;
		}
		return $fileString;
	}
	public function getFileArrayInDirectory($directory){
		$fileArray = NULL;
		try {
			if(isset($directory)){
				$fileArray = array();
				$fileArrayTemp = scandir($directory);
				foreach ($fileArrayTemp as $key=>$value){
					if ($value != '.' && $value != '..'){
						array_push($fileArray, $value);
					}
				}
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($className . '->getFileArrayInDirectory() - $directory=' . $directory ,$ex );
			throw $ex;
		}
		return $fileArray;
	}
	public function getRandomFileNameInFileArray($fileArray){
		$fileName = NULL;
		try {
			if(isset($fileArray)){
				$max = count($fileArray);
				if ($max > 0){
					$maxIndex = $max - 1;
					$pickOutIndex = rand(0, $maxIndex);
					$fileName = $fileArray[$pickOutIndex];
				}
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($className . '->getFileArrayInDirectory() - $directory=' . $directory ,$ex );
			throw $ex;
		}
		return $fileName;
	}
}
?>