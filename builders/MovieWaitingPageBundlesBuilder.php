<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( DAOS_PATH . '/Dao.php');
include_once (BUILDERS_PATH . '/BundlesBuilder.php');
include_once (EOS_PATH . '/SystemConfigEo.php');
include_once (EOS_PATH . '/MovieWaitingPageBundlesEo.php');
class MovieWaitingPageBundlesBuilder extends BundlesBuilder{
	private $className;
	private $logger;
	public function __construct($fileName, $bundle = NULL){
		parent::__construct($fileName, $bundle);
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger(get_class($this));
		if ($this->bundle === NULL){
			$this->bundle = new MovieWaitingPageBundlesEo();
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
				$bundleEo = new MovieWaitingPageBundlesEo($this->defaultLanguage);
				$seqEn=$propertyArray['seq.en'];
				$movieTcNameEn=$propertyArray['movie_tc_name.en'];
				$movieEnNameEn=$propertyArray['movie_en_name.en'];
				$statusEn=$propertyArray['status.en'];
				$movieIdEn=$propertyArray['movie_id.en'];
				$cannotFindMovieIdEn=$propertyArray['cannot_find_movie_id.en'];
				$movieIsOnWaitingListEn=$propertyArray['movie_is_on_waiting_list.en'];
				$seqTc=$propertyArray['seq.tc'];
				$movieTcNameTc=$propertyArray['movie_tc_name.tc'];
				$movieEnNameTc=$propertyArray['movie_en_name.tc'];
				$statusTc=$propertyArray['status.tc'];
				$movieIdTc=$propertyArray['movie_id.tc'];
				$cannotFindMovieIdTc=$propertyArray['cannot_find_movie_id.tc'];
				$movieIsOnWaitingListTc=$propertyArray['movie_is_on_waiting_list.tc'];
				if(isset($seqEn)){
					$bundleEo->setSeqEn(trim($seqEn));
				}
				if(isset($movieTcNameEn)){
					$bundleEo->setMovieTcNameEn(trim($movieTcNameEn));
				}
				if(isset($movieEnNameEn)){
					$bundleEo->setMovieEnNameEn(trim($movieEnNameEn));
				}
				if(isset($statusEn)){
					$bundleEo->setStatusEn(trim($statusEn));
				}
				if(isset($movieIdEn)){
					$bundleEo->setMovieIdEn(trim($movieIdEn));
				}
				if(isset($cannotFindMovieIdEn)){
					$bundleEo->setCannotFindMovieIdEn(trim($cannotFindMovieIdEn));
				}
				if(isset($movieIsOnWaitingListEn)){
					$bundleEo->setMovieIsOnWaitingListEn(trim($movieIsOnWaitingListEn));
				}
				if(isset($seqTc)){
					$bundleEo->setSeqTc(trim($seqTc));
				}
				if(isset($movieTcNameTc)){
					$bundleEo->setMovieTcNameTc(trim($movieTcNameTc));
				}
				if(isset($movieEnNameTc)){
					$bundleEo->setMovieEnNameTc(trim($movieEnNameTc));
				}
				if(isset($statusTc)){
					$bundleEo->setStatusTc(trim($statusTc));
				}
				if(isset($movieIdTc)){
					$bundleEo->setMovieIdTc(trim($movieIdTc));
				}
				if(isset($cannotFindMovieIdTc)){
					$bundleEo->setCannotFindMovieIdTc(trim($cannotFindMovieIdTc));
				}
				if(isset($movieIsOnWaitingListTc)){
					$bundleEo->setMovieIsOnWaitingListTc(trim($movieIsOnWaitingListTc));
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