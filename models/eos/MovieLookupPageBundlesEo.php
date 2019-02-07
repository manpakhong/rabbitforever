<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/BundlesEo.php');
include_once( EOS_PATH . '/SystemConfigEo.php');
class MovieLookupPageBundlesEo extends BundlesEo{
	private $idEn;
	private $movieTcNameEn;
	private $movieEnNameEn;
	private $movieTypeEn;
	private $classEn;
	private $moviePicEn;
	private $movieCoverEn;
	private $trailorEn;
	private $remarksEn;
	private $waitingPathInputEn;
	private $updatedByEn;
	private $createdByEn;
	private $createdDateEn;
	private $updatedDateEn;
	private $searchCriteriaEn;
	private $refreshEn;
	private $idTc;
	private $movieTcNameTc;
	private $movieEnNameTc;
	private $movieTypeTc;
	private $classTc;
	private $moviePicTc;
	private $movieCoverTc;
	private $trailorTc;
	private $remarksTc;
	private $waitingPathInputTc;
	private $updatedByTc;
	private $createdByTc;
	private $createdDateTc;
	private $updatedDateTc;
	private $searchCriteriaTc;
	private $refreshTc;
	public function __construct($defaultLang = NULL){
		parent::__construct($defaultLang);
	}
	public function setIdEn($idEn){
		$this->idEn=$idEn;
	}
	public function getIdEn(){
		return $this->idEn;
	}
	public function setMovieTcNameEn($movieTcNameEn){
		$this->movieTcNameEn=$movieTcNameEn;
	}
	public function getMovieTcNameEn(){
		return $this->movieTcNameEn;
	}
	public function setMovieEnNameEn($movieEnNameEn){
		$this->movieEnNameEn=$movieEnNameEn;
	}
	public function getMovieEnNameEn(){
		return $this->movieEnNameEn;
	}
	public function setMovieTypeEn($movieTypeEn){
		$this->movieTypeEn=$movieTypeEn;
	}
	public function getMovieTypeEn(){
		return $this->movieTypeEn;
	}
	public function setClassEn($classEn){
		$this->classEn=$classEn;
	}
	public function getClassEn(){
		return $this->classEn;
	}
	public function setMoviePicEn($moviePicEn){
		$this->moviePicEn=$moviePicEn;
	}
	public function getMoviePicEn(){
		return $this->moviePicEn;
	}
	public function setMovieCoverEn($movieCoverEn){
		$this->movieCoverEn=$movieCoverEn;
	}
	public function getMovieCoverEn(){
		return $this->movieCoverEn;
	}
	public function setTrailorEn($trailorEn){
		$this->trailorEn=$trailorEn;
	}
	public function getTrailorEn(){
		return $this->trailorEn;
	}
	public function setRemarksEn($remarksEn){
		$this->remarksEn=$remarksEn;
	}
	public function getRemarksEn(){
		return $this->remarksEn;
	}
	public function setWaitingPathInputEn($waitingPathInputEn){
		$this->waitingPathInputEn=$waitingPathInputEn;
	}
	public function getWaitingPathInputEn(){
		return $this->waitingPathInputEn;
	}
	public function setUpdatedByEn($updatedByEn){
		$this->updatedByEn=$updatedByEn;
	}
	public function getUpdatedByEn(){
		return $this->updatedByEn;
	}
	public function setCreatedByEn($createdByEn){
		$this->createdByEn=$createdByEn;
	}
	public function getCreatedByEn(){
		return $this->createdByEn;
	}
	public function setCreatedDateEn($createdDateEn){
		$this->createdDateEn=$createdDateEn;
	}
	public function getCreatedDateEn(){
		return $this->createdDateEn;
	}
	public function setUpdatedDateEn($updatedDateEn){
		$this->updatedDateEn=$updatedDateEn;
	}
	public function getUpdatedDateEn(){
		return $this->updatedDateEn;
	}
	public function setSearchCriteriaEn($searchCriteriaEn){
		$this->searchCriteriaEn=$searchCriteriaEn;
	}
	public function getSearchCriteriaEn(){
		return $this->searchCriteriaEn;
	}
	public function setRefreshEn($refreshEn){
		$this->refreshEn=$refreshEn;
	}
	public function getRefreshEn(){
		return $this->refreshEn;
	}
	public function setIdTc($idTc){
		$this->idTc=$idTc;
	}
	public function getIdTc(){
		return $this->idTc;
	}
	public function setMovieTcNameTc($movieTcNameTc){
		$this->movieTcNameTc=$movieTcNameTc;
	}
	public function getMovieTcNameTc(){
		return $this->movieTcNameTc;
	}
	public function setMovieEnNameTc($movieEnNameTc){
		$this->movieEnNameTc=$movieEnNameTc;
	}
	public function getMovieEnNameTc(){
		return $this->movieEnNameTc;
	}
	public function setMovieTypeTc($movieTypeTc){
		$this->movieTypeTc=$movieTypeTc;
	}
	public function getMovieTypeTc(){
		return $this->movieTypeTc;
	}
	public function setClassTc($classTc){
		$this->classTc=$classTc;
	}
	public function getClassTc(){
		return $this->classTc;
	}
	public function setMoviePicTc($moviePicTc){
		$this->moviePicTc=$moviePicTc;
	}
	public function getMoviePicTc(){
		return $this->moviePicTc;
	}
	public function setMovieCoverTc($movieCoverTc){
		$this->movieCoverTc=$movieCoverTc;
	}
	public function getMovieCoverTc(){
		return $this->movieCoverTc;
	}
	public function setTrailorTc($trailorTc){
		$this->trailorTc=$trailorTc;
	}
	public function getTrailorTc(){
		return $this->trailorTc;
	}
	public function setRemarksTc($remarksTc){
		$this->remarksTc=$remarksTc;
	}
	public function getRemarksTc(){
		return $this->remarksTc;
	}
	public function setWaitingPathInputTc($waitingPathInputTc){
		$this->waitingPathInputTc=$waitingPathInputTc;
	}
	public function getWaitingPathInputTc(){
		return $this->waitingPathInputTc;
	}
	public function setUpdatedByTc($updatedByTc){
		$this->updatedByTc=$updatedByTc;
	}
	public function getUpdatedByTc(){
		return $this->updatedByTc;
	}
	public function setCreatedByTc($createdByTc){
		$this->createdByTc=$createdByTc;
	}
	public function getCreatedByTc(){
		return $this->createdByTc;
	}
	public function setCreatedDateTc($createdDateTc){
		$this->createdDateTc=$createdDateTc;
	}
	public function getCreatedDateTc(){
		return $this->createdDateTc;
	}
	public function setUpdatedDateTc($updatedDateTc){
		$this->updatedDateTc=$updatedDateTc;
	}
	public function getUpdatedDateTc(){
		return $this->updatedDateTc;
	}
	public function setSearchCriteriaTc($searchCriteriaTc){
		$this->searchCriteriaTc=$searchCriteriaTc;
	}
	public function getSearchCriteriaTc(){
		return $this->searchCriteriaTc;
	}
	public function setRefreshTc($refreshTc){
		$this->refreshTc=$refreshTc;
	}
	public function getRefreshTc(){
		return $this->refreshTc;
	}
	public function getId(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getIdTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getIdEn();
		} else {
			$property = $this->getIdEn();
		}
		return $property;
	}
	public function getMovieTcName(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getMovieTcNameTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getMovieTcNameEn();
		} else {
			$property = $this->getMovieTcNameEn();
		}
		return $property;
	}
	public function getMovieEnName(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getMovieEnNameTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getMovieEnNameEn();
		} else {
			$property = $this->getMovieEnNameEn();
		}
		return $property;
	}
	public function getMovieType(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getMovieTypeTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getMovieTypeEn();
		} else {
			$property = $this->getMovieTypeEn();
		}
		return $property;
	}
	public function getClass(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getClassTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getClassEn();
		} else {
			$property = $this->getClassEn();
		}
		return $property;
	}
	public function getMoviePic(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getMoviePicTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getMoviePicEn();
		} else {
			$property = $this->getMoviePicEn();
		}
		return $property;
	}
	public function getMovieCover(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getMovieCoverTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getMovieCoverEn();
		} else {
			$property = $this->getMovieCoverEn();
		}
		return $property;
	}
	public function getTrailor(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getTrailorTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getTrailorEn();
		} else {
			$property = $this->getTrailorEn();
		}
		return $property;
	}
	public function getRemarks(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getRemarksTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getRemarksEn();
		} else {
			$property = $this->getRemarksEn();
		}
		return $property;
	}
	public function getWaitingPathInput(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getWaitingPathInputTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getWaitingPathInputEn();
		} else {
			$property = $this->getWaitingPathInputEn();
		}
		return $property;
	}
	public function getUpdatedBy(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getUpdatedByTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getUpdatedByEn();
		} else {
			$property = $this->getUpdatedByEn();
		}
		return $property;
	}
	public function getCreatedBy(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getCreatedByTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getCreatedByEn();
		} else {
			$property = $this->getCreatedByEn();
		}
		return $property;
	}
	public function getCreatedDate(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getCreatedDateTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getCreatedDateEn();
		} else {
			$property = $this->getCreatedDateEn();
		}
		return $property;
	}
	public function getUpdatedDate(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getUpdatedDateTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getUpdatedDateEn();
		} else {
			$property = $this->getUpdatedDateEn();
		}
		return $property;
	}
	public function getSearchCriteria(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getSearchCriteriaTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getSearchCriteriaEn();
		} else {
			$property = $this->getSearchCriteriaEn();
		}
		return $property;
	}
	public function getRefresh(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getRefreshTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getRefreshEn();
		} else {
			$property = $this->getRefreshEn();
		}
		return $property;
	}
	public function __toString(){
		$objectString=NULL;
		$count = 0;
		foreach($this as $key => $value){
			if($count > 0){
				$objString = $objectString . ',';
			}
			$objectString = $objectString . '$key => $value ';
			$count = $count + 1;
		}
		return $objectString;
	}
	
	public function printAllPropertiesToJsBundleVo(){
		try {
			echo '<script type="text/javascript">';
			foreach ($this as $key => $value){
				if (gettype($value) != "object"){
					if (gettype($value) == "integer"){
						print "bundleVo." . $key . " = '" . strval($value) . "';";
					} else {
						print "bundleVo." . $key . " = '" . $value . "';";
					}
				}
			}
			echo '</script>';
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->printAllPropertiesToJsBundleVo()',$ex );
			throw $ex;
		}
	}
}
?>