<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( DAOS_PATH . '/Dao.php');
include_once (BUILDERS_PATH . '/BundlesBuilder.php');
include_once (EOS_PATH . '/SystemConfigEo.php');
include_once (EOS_PATH . '/MovieLookupPageBundlesEo.php');
class MovieLookupPageBundlesBuilder extends BundlesBuilder{
	private $className;
	private $logger;
	public function __construct($fileName, $bundle = NULL){
		parent::__construct($fileName, $bundle);
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger(get_class($this));
		if ($this->bundle === NULL){
			$this->bundle = new MovieLookupPageBundlesEo();
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
				$bundleEo = new MovieLookupPageBundlesEo($this->defaultLanguage);
				$idEn=$propertyArray['id.en'];
				$movieTcNameEn=$propertyArray['movie_tc_name.en'];
				$movieEnNameEn=$propertyArray['movie_en_name.en'];
				$movieTypeEn=$propertyArray['movie_type.en'];
				$classEn=$propertyArray['class.en'];
				$moviePicEn=$propertyArray['movie_pic.en'];
				$movieCoverEn=$propertyArray['movie_cover.en'];
				$trailorEn=$propertyArray['trailor.en'];
				$remarksEn=$propertyArray['remarks.en'];
				$waitingPathInputEn=$propertyArray['waiting_path_input.en'];
				$updatedByEn=$propertyArray['updated_by.en'];
				$createdByEn=$propertyArray['created_by.en'];
				$createdDateEn=$propertyArray['created_date.en'];
				$updatedDateEn=$propertyArray['updated_date.en'];
				$searchCriteriaEn=$propertyArray['search_criteria.en'];
				$refreshEn=$propertyArray['refresh.en'];
				$idTc=$propertyArray['id.tc'];
				$movieTcNameTc=$propertyArray['movie_tc_name.tc'];
				$movieEnNameTc=$propertyArray['movie_en_name.tc'];
				$movieTypeTc=$propertyArray['movie_type.tc'];
				$classTc=$propertyArray['class.tc'];
				$moviePicTc=$propertyArray['movie_pic.tc'];
				$movieCoverTc=$propertyArray['movie_cover.tc'];
				$trailorTc=$propertyArray['trailor.tc'];
				$remarksTc=$propertyArray['remarks.tc'];
				$waitingPathInputTc=$propertyArray['waiting_path_input.tc'];
				$updatedByTc=$propertyArray['updated_by.tc'];
				$createdByTc=$propertyArray['created_by.tc'];
				$createdDateTc=$propertyArray['created_date.tc'];
				$updatedDateTc=$propertyArray['updated_date.tc'];
				$searchCriteriaTc=$propertyArray['search_criteria.tc'];
				$refreshTc=$propertyArray['refresh.tc'];
				if(isset($idEn)){
					$bundleEo->setIdEn(trim($idEn));
				}
				if(isset($movieTcNameEn)){
					$bundleEo->setMovieTcNameEn(trim($movieTcNameEn));
				}
				if(isset($movieEnNameEn)){
					$bundleEo->setMovieEnNameEn(trim($movieEnNameEn));
				}
				if(isset($movieTypeEn)){
					$bundleEo->setMovieTypeEn(trim($movieTypeEn));
				}
				if(isset($classEn)){
					$bundleEo->setClassEn(trim($classEn));
				}
				if(isset($moviePicEn)){
					$bundleEo->setMoviePicEn(trim($moviePicEn));
				}
				if(isset($movieCoverEn)){
					$bundleEo->setMovieCoverEn(trim($movieCoverEn));
				}
				if(isset($trailorEn)){
					$bundleEo->setTrailorEn(trim($trailorEn));
				}
				if(isset($remarksEn)){
					$bundleEo->setRemarksEn(trim($remarksEn));
				}
				if(isset($waitingPathInputEn)){
					$bundleEo->setWaitingPathInputEn(trim($waitingPathInputEn));
				}
				if(isset($updatedByEn)){
					$bundleEo->setUpdatedByEn(trim($updatedByEn));
				}
				if(isset($createdByEn)){
					$bundleEo->setCreatedByEn(trim($createdByEn));
				}
				if(isset($createdDateEn)){
					$bundleEo->setCreatedDateEn(trim($createdDateEn));
				}
				if(isset($updatedDateEn)){
					$bundleEo->setUpdatedDateEn(trim($updatedDateEn));
				}
				if(isset($searchCriteriaEn)){
					$bundleEo->setSearchCriteriaEn(trim($searchCriteriaEn));
				}
				if(isset($refreshEn)){
					$bundleEo->setRefreshEn(trim($refreshEn));
				}
				if(isset($idTc)){
					$bundleEo->setIdTc(trim($idTc));
				}
				if(isset($movieTcNameTc)){
					$bundleEo->setMovieTcNameTc(trim($movieTcNameTc));
				}
				if(isset($movieEnNameTc)){
					$bundleEo->setMovieEnNameTc(trim($movieEnNameTc));
				}
				if(isset($movieTypeTc)){
					$bundleEo->setMovieTypeTc(trim($movieTypeTc));
				}
				if(isset($classTc)){
					$bundleEo->setClassTc(trim($classTc));
				}
				if(isset($moviePicTc)){
					$bundleEo->setMoviePicTc(trim($moviePicTc));
				}
				if(isset($movieCoverTc)){
					$bundleEo->setMovieCoverTc(trim($movieCoverTc));
				}
				if(isset($trailorTc)){
					$bundleEo->setTrailorTc(trim($trailorTc));
				}
				if(isset($remarksTc)){
					$bundleEo->setRemarksTc(trim($remarksTc));
				}
				if(isset($waitingPathInputTc)){
					$bundleEo->setWaitingPathInputTc(trim($waitingPathInputTc));
				}
				if(isset($updatedByTc)){
					$bundleEo->setUpdatedByTc(trim($updatedByTc));
				}
				if(isset($createdByTc)){
					$bundleEo->setCreatedByTc(trim($createdByTc));
				}
				if(isset($createdDateTc)){
					$bundleEo->setCreatedDateTc(trim($createdDateTc));
				}
				if(isset($updatedDateTc)){
					$bundleEo->setUpdatedDateTc(trim($updatedDateTc));
				}
				if(isset($searchCriteriaTc)){
					$bundleEo->setSearchCriteriaTc(trim($searchCriteriaTc));
				}
				if(isset($refreshTc)){
					$bundleEo->setRefreshTc(trim($refreshTc));
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