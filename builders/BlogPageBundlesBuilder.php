<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( DAOS_PATH . '/Dao.php');
include_once (BUILDERS_PATH . '/BundlesBuilder.php');
include_once (EOS_PATH . '/SystemConfigEo.php');
include_once (EOS_PATH . '/BlogPageBundlesEo.php');
class BlogPageBundlesBuilder extends BundlesBuilder{
	private $className;
	private $logger;
	public function __construct($fileName, $bundle = NULL){
		parent::__construct($fileName, $bundle);
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger(get_class($this));
		if ($this->bundle === NULL){
			$this->bundle = new BlogPageBundlesEo();
		}
	}
	private function init(){
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className =  __CLASS__;
		}
	}
	public function buildBundle(){
		$bundleEo = NULL;
		try{
			$fileContent = $this->fileUtils->readTextFile($this->fileName);
			$propertyArray = $this->bundleUtils->parseProperties($fileContent);
			if (isset($propertyArray)){
				$bundleEo = new BlogPageBundlesEo($this->defaultLanguage);
				$pageEn=$propertyArray['page.en'];
				$ofEn=$propertyArray['of.en'];
				$dateEn=$propertyArray['date.en'];
				$subjectEn=$propertyArray['subject.en'];
				$languageEn=$propertyArray['language.en'];
				$categoryEn=$propertyArray['category.en'];
				$remarksEn=$propertyArray['remarks.en'];
				$editEn=$propertyArray['edit.en'];
				$selectACategoryEn=$propertyArray['select_a_category.en'];
				$pageTc=$propertyArray['page.tc'];
				$ofTc=$propertyArray['of.tc'];
				$dateTc=$propertyArray['date.tc'];
				$subjectTc=$propertyArray['subject.tc'];
				$languageTc=$propertyArray['language.tc'];
				$categoryTc=$propertyArray['category.tc'];
				$remarksTc=$propertyArray['remarks.tc'];
				$editTc=$propertyArray['edit.tc'];
				$selectACategoryTc=$propertyArray['select_a_category.tc'];
				if(isset($pageEn)){
					$bundleEo->setPageEn(trim($pageEn));
				}
				if(isset($ofEn)){
					$bundleEo->setOfEn(trim($ofEn));
				}
				if(isset($dateEn)){
					$bundleEo->setDateEn(trim($dateEn));
				}
				if(isset($subjectEn)){
					$bundleEo->setSubjectEn(trim($subjectEn));
				}
				if(isset($languageEn)){
					$bundleEo->setLanguageEn(trim($languageEn));
				}
				if(isset($categoryEn)){
					$bundleEo->setCategoryEn(trim($categoryEn));
				}
				if(isset($remarksEn)){
					$bundleEo->setRemarksEn(trim($remarksEn));
				}
				if(isset($editEn)){
					$bundleEo->setEditEn(trim($editEn));
				}
				if(isset($selectACategoryEn)){
					$bundleEo->setSelectACategoryEn(trim($selectACategoryEn));
				}
				if(isset($pageTc)){
					$bundleEo->setPageTc(trim($pageTc));
				}
				if(isset($ofTc)){
					$bundleEo->setOfTc(trim($ofTc));
				}
				if(isset($dateTc)){
					$bundleEo->setDateTc(trim($dateTc));
				}
				if(isset($subjectTc)){
					$bundleEo->setSubjectTc(trim($subjectTc));
				}
				if(isset($languageTc)){
					$bundleEo->setLanguageTc(trim($languageTc));
				}
				if(isset($categoryTc)){
					$bundleEo->setCategoryTc(trim($categoryTc));
				}
				if(isset($remarksTc)){
					$bundleEo->setRemarksTc(trim($remarksTc));
				}
				if(isset($editTc)){
					$bundleEo->setEditTc(trim($editTc));
				}
				if(isset($selectACategoryTc)){
					$bundleEo->setSelectACategoryTc(trim($selectACategoryTc));
				}
			}
		} catch (Exception $ex) {
			$this->logger->error($this->className . '->buildBundle() - $this->fileName=' . print_r($this->fileName, 1), $ex );
			throw $ex;
		}
		$this->bundleEo = $bundleEo;
	}
}
?>