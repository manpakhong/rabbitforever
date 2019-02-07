<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/SystemConfigEo.php');
class CodeEo {
	public static $CODE_TYPE_LANGUAGE = 'language';
	public static $CODE_TYPE_LANGAUGE_LANG_TC = 'LANG_TC';
	public static $CODE_TYPE_LANGAUGE_LANG_EN = 'LANG_EN';
	public static $CODE_TYPE_MOVIE_TYPE = 'movie_type';
	public static $CODE_TYPE_MOVIE_CLASS = 'movie_class';
	public static $CODE_TYPE_MOVIE_CLASS_I = 'MOVIE_CLASS_I';
	public static $CODE_TYPE_MOVIE_CLASS_II_A = 'MOVIE_CLASS_II_A';
	public static $CODE_TYPE_MOVIE_CLASS_II_B = 'MOVIE_CLASS_II_B';
	public static $CODE_TYPE_MOVIE_CLASS_III = 'MOVIE_CLASS_III';
	public static $CODE_TYPE_MOVIE_CLASS_IV = 'MOVIE_CLASS_IV';
	
	public static $CODE_TYPE_MOVIE_STATUS = 'movie_status';
	public static $CODE_TYPE_MOVIE_STATUS_PENDING = 'MOVIE_STATUS_PENDING';
	public static $CODE_TYPE_MOVIE_STATUS_IN_PROGRESS = 'MOVIE_STATUS_IN_PROGRESS';
	public static $CODE_TYPE_MOVIE_STATUS_ARRIVED = 'MOVIE_STATUS_ARRIVED';
	public static $CODE_TYPE_MOVIE_STATUS_READY_FOR_DOWNLOAD = 'MOVIE_STATUS_READY_FOR_DOWNLOAD';
	public static $CODE_TYPE_MOVIE_STATUS_DOWNLOADED = 'MOVIE_STATUS_DOWNLOADED';
	
	
	protected $id;
	protected $code;
	protected $descEn;
	protected $descTc;
	protected $codeType;
	protected $createdBy;
	protected $updatedBy;
	protected $createdDate;
	protected $updatedDate;
	protected $remarks;
	private $defaultLang;
	private $lang;
	public function __construct(){
	}
	public function setDefaultLang($defaultLang){
		$this->defaultLang = $defaultLang;
	}
	public function setLang($lang){
		$this->lang = $lang;
	}
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getCode(){
		return $this->code;
	}
	public function setCode($code){
		$this->code=$code;
	}
	public function getDesc(){
		$property = NULL;
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getDescTc();
		} else if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
				$property = $this->getDescEn();
			
		} else {
			if(isset($this->defaultLang) && $this->defaultLang== SystemConfigEo::$LANG_TCHI){
				$property = $this->getDescTc();
			} else if (isset($this->defaultLang) && $this->defaultLang== SystemConfigEo::$LANG_EN){
				$property = $this->getDescEn();
			}
		}
		return $property;
	}
	public function getDescEn(){
		return $this->descEn;
	}
	public function setDescEn($descEn){
		$this->descEn=$descEn;
	}
	public function getDescTc(){
		return $this->descTc;
	}
	public function setDescTc($descTc){
		$this->descTc=$descTc;
	}
	public function getCodeType(){
		return $this->codeType;
	}
	public function setCodeType($codeType){
		$this->codeType=$codeType;
	}
	public function getCreatedBy(){
		return $this->createdBy;
	}
	public function setCreatedBy($createdBy){
		$this->createdBy=$createdBy;
	}
	public function getUpdatedBy(){
		return $this->updatedBy;
	}
	public function setUpdatedBy($updatedBy){
		$this->updatedBy=$updatedBy;
	}
	public function getCreatedDate(){
		return $this->createdDate;
	}
	public function setCreatedDate($createdDate){
		$this->createdDate=$createdDate;
	}
	public function getUpdatedDate(){
		return $this->updatedDate;
	}
	public function setUpdatedDate($updatedDate){
		$this->updatedDate=$updatedDate;
	}
	public function getRemarks(){
		return $this->remarks;
	}
	public function setRemarks($remarks){
		$this->remarks=$remarks;
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
} //end class
?>