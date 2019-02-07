<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (BUILDERS_PATH . '/BundlesBuilder.php');
include_once (EOS_PATH . '/SystemConfigEo.php');

class SystemConfigBundlesBuilder extends BundlesBuilder{
	private $className;
	private $logger;

	public function __construct($fileName, $bundle = NULL){
		parent::__construct($fileName, $bundle);
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger(get_class($this));
		if ($this->bundle === NULL){
			$this->bundle = new SystemConfigEo();
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
		$systemConfigEo = NULL;
		try {
			$fileContent = $this->fileUtils->readTextFile ( $this->fileName );
			$propertyArray = $this->bundleUtils->parseProperties($fileContent);
			if (isset($propertyArray)){
				$systemConfigEo = new SystemConfigEo();
			
				$isProductionString = $propertyArray['is_production'];
				if(isset($isProductionString)){
					$isProductionString = strtoupper(trim($isProductionString));
					$isProduction = NULL;
					if ($isProductionString == 'TRUE'){
						$isProduction = TRUE;
					} else if ($isProductionString == 'FALSE'){
						$isProduction = FALSE;
					}
					$systemConfigEo->setIsProduction($isProduction);
				}
			
			
				$defaultLanguage = $propertyArray['default_language'];
			
				if (isset($defaultLanguage)){
					$systemConfigEo->setDefaultLanguage(trim($defaultLanguage));
				}
			
				$backgroundsPath = $propertyArray['backgrounds_path'];
			
				if (isset($backgroundsPath)){
					$systemConfigEo->setBackgroundsPath(trim($backgroundsPath));
				}
				$defaultBlogRecordsPerPageString = $propertyArray['default_blog_records_per_page'];
				if (isset($defaultBlogRecordsPerPageString)){
					$defaultBlogRecordsPerPageString = trim($defaultBlogRecordsPerPageString);
					$defaultBlogRecordsPerPage = (int) $defaultBlogRecordsPerPageString;
					$systemConfigEo->setDefaultBlogRecordsPerPage($defaultBlogRecordsPerPage);
				}
			
				$cookieExpiryHrString = $propertyArray['cookie_expiry_hr'];
				if(isset($cookieExpiryHrString)){
					$cookieExpiryHrString = trim($cookieExpiryHrString);
					$cookieExpiryHr = (int) $cookieExpiryHrString;
					$systemConfigEo->setCookieExpiryHr($cookieExpiryHr);
				}
			
			
				$defaultRecentUpdateRecordsString = $propertyArray['default_recent_update_records'];
				if(isset($defaultRecentUpdateRecordsString)){
					$cookieExpiryHrString = trim($defaultRecentUpdateRecordsString);
					$defaultRecentUpdateRecords = (int) $defaultRecentUpdateRecordsString;
					$systemConfigEo->setDefaultRecentUpdateRecords($defaultRecentUpdateRecords);
				}
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->buildBundle() - $this->fileName=' . print_r($this->fileName,1) ,$ex );
			throw $ex;
		}
		$this->bundleEo = $systemConfigEo;
	}
}
?>