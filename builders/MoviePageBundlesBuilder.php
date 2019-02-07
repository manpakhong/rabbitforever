<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( DAOS_PATH . '/Dao.php');
include_once (BUILDERS_PATH . '/BundlesBuilder.php');
include_once (EOS_PATH . '/SystemConfigEo.php');
include_once (EOS_PATH . '/MoviePageBundlesEo.php');
class MoviePageBundlesBuilder extends BundlesBuilder{
	private $className;
	private $logger;
	public function __construct($fileName, $bundle = NULL){
		parent::__construct($fileName, $bundle);
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger(get_class($this));
		if ($this->bundle === NULL){
			$this->bundle = new MoviePageBundlesEo();
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
				$bundleEo = new MoviePageBundlesEo($this->defaultLanguage);
				$seqEn=$propertyArray['seq.en'];
				$movieTcNameEn=$propertyArray['movie_tc_name.en'];
				$movieEnNameEn=$propertyArray['movie_en_name.en'];
				$movieTypeEn=$propertyArray['movie_type.en'];
				$classEn=$propertyArray['class.en'];
				$moviePicEn=$propertyArray['movie_pic.en'];
				$movieCoverEn=$propertyArray['movie_cover.en'];
				$trailorEn=$propertyArray['trailor.en'];
				$remarksEn=$propertyArray['remarks.en'];
				$waitingPathInputEn=$propertyArray['waiting_path_input.en'];
				$pleaseLookupMovieBeforePressSelectButtonEn=$propertyArray['please_lookup_movie_before_press_select_button.en'];
				$movieTcNameTc=$propertyArray['movie_tc_name.tc'];
				$movieEnNameTc=$propertyArray['movie_en_name.tc'];
				$movieTypeTc=$propertyArray['movie_type.tc'];
				$classTc=$propertyArray['class.tc'];
				$moviePicTc=$propertyArray['movie_pic.tc'];
				$movieCoverTc=$propertyArray['movie_cover.tc'];
				$trailorTc=$propertyArray['trailor.tc'];
				$remarksTc=$propertyArray['remarks.tc'];
				$waitingPathInputTc=$propertyArray['waiting_path_input.tc'];
				$pleaseLookupMovieBeforePressSelectButtonTc=$propertyArray['please_lookup_movie_before_press_select_button.tc'];
				if(isset($seqEn)){
					$bundleEo->setSeqEn(trim($seqEn));
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
				if(isset($pleaseLookupMovieBeforePressSelectButtonEn)){
					$bundleEo->setPleaseLookupMovieBeforePressSelectButtonEn(trim($pleaseLookupMovieBeforePressSelectButtonEn));
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
				if(isset($pleaseLookupMovieBeforePressSelectButtonTc)){
					$bundleEo->setPleaseLookupMovieBeforePressSelectButtonTc(trim($pleaseLookupMovieBeforePressSelectButtonTc));
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