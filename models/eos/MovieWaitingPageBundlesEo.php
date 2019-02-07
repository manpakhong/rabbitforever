<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/BundlesEo.php');
class MovieWaitingPageBundlesEo extends BundlesEo{
	private $seqEn;
	private $movieTcNameEn;
	private $movieEnNameEn;
	private $statusEn;
	private $movieIdEn;
	private $cannotFindMovieIdEn;
	private $movieIsOnWaitingListEn;
	private $seqTc;
	private $movieTcNameTc;
	private $movieEnNameTc;
	private $statusTc;
	private $movieIdTc;
	private $cannotFindMovieIdTc;
	private $movieIsOnWaitingListTc;
	public function __construct($defaultLang = NULL){
		parent::__construct($defaultLang);
	}
	public function setSeqEn($seqEn){
		$this->seqEn=$seqEn;
	}
	public function getSeqEn(){
		return $this->seqEn;
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
	public function setStatusEn($statusEn){
		$this->statusEn=$statusEn;
	}
	public function getStatusEn(){
		return $this->statusEn;
	}
	public function setMovieIdEn($movieIdEn){
		$this->movieIdEn=$movieIdEn;
	}
	public function getMovieIdEn(){
		return $this->movieIdEn;
	}
	public function setCannotFindMovieIdEn($cannotFindMovieIdEn){
		$this->cannotFindMovieIdEn=$cannotFindMovieIdEn;
	}
	public function getCannotFindMovieIdEn(){
		return $this->cannotFindMovieIdEn;
	}
	public function setMovieIsOnWaitingListEn($movieIsOnWaitingListEn){
		$this->movieIsOnWaitingListEn=$movieIsOnWaitingListEn;
	}
	public function getMovieIsOnWaitingListEn(){
		return $this->movieIsOnWaitingListEn;
	}
	public function setSeqTc($seqTc){
		$this->seqTc=$seqTc;
	}
	public function getSeqTc(){
		return $this->seqTc;
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
	public function setStatusTc($statusTc){
		$this->statusTc=$statusTc;
	}
	public function getStatusTc(){
		return $this->statusTc;
	}
	public function setMovieIdTc($movieIdTc){
		$this->movieIdTc=$movieIdTc;
	}
	public function getMovieIdTc(){
		return $this->movieIdTc;
	}
	public function setCannotFindMovieIdTc($cannotFindMovieIdTc){
		$this->cannotFindMovieIdTc=$cannotFindMovieIdTc;
	}
	public function getCannotFindMovieIdTc(){
		return $this->cannotFindMovieIdTc;
	}
	public function setMovieIsOnWaitingListTc($movieIsOnWaitingListTc){
		$this->movieIsOnWaitingListTc=$movieIsOnWaitingListTc;
	}
	public function getMovieIsOnWaitingListTc(){
		return $this->movieIsOnWaitingListTc;
	}
	public function getSeq(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getSeqTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getSeqEn();
		} else {
			$property = $this->getSeqEn();
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
	public function getStatus(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getStatusTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getStatusEn();
		} else {
			$property = $this->getStatusEn();
		}
		return $property;
	}
	public function getMovieId(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getMovieIdTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getMovieIdEn();
		} else {
			$property = $this->getMovieIdEn();
		}
		return $property;
	}
	public function getCannotFindMovieId(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getCannotFindMovieIdTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getCannotFindMovieIdEn();
		} else {
			$property = $this->getCannotFindMovieIdEn();
		}
		return $property;
	}
	public function getMovieIsOnWaitingList(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getMovieIsOnWaitingListTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getMovieIsOnWaitingListEn();
		} else {
			$property = $this->getMovieIsOnWaitingListEn();
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
		try{
			foreach ($this as $key => $value){
				if (gettype($value) != "object"){
					$stringValue = '';
					if (gettype($value) == "integer"){
						$stringValue = strval($value);
					} else {
						$stringValue = $value;
					}
					echo '<input type="hidden" class="' . $key . '" value="' . $stringValue. '" />';
				}
			}
		} catch (Exception $ex) {
			$this->logger->error ($this->className . '->printAllPropertiesToJsBundleVo()', $ex);
			throw $ex;
		}
	}
}
?>