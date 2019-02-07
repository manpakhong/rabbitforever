<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/MovieEo.php');
include_once( UTILS_PATH . '/DateTimeUtils.php');
class MovieVo {
	public $id;
	public $movieNameEn;
	public $movieNameTc;
	public $movieTypeId;
	public $movieTypeString;
	public $classCode;
	public $classCodeString;
	public $moviePic1;
	public $moviePic2;
	public $movieTrailor;
	public $createdBy;
	public $updatedBy;
	public $createdDateString;
	public $createdDate;
	public $updatedDateString;
	public $updatedDate;
	public $remarks;
	function __construct($movieEo = NULL){
		if ($movieEo !== NULL){
			$dateTimeUtils = DateTimeUtils::getInstance();
			$this->id = $movieEo->getId();
			$this->movieNameEn = $movieEo->getMovieNameEn();
			$this->movieNameTc = $movieEo->getMovieNameTc();
			$this->movieTypeId = $movieEo->getMovieTypeId();
			$this->classCode = $movieEo->getClassCode();
			$this->moviePic1 = $movieEo->getMoviePic1();
			$this->moviePic2 = $movieEo->getMoviePic2();
			$this->movieTrailor = $movieEo->getMovieTrailor();
			$this->createdBy = $movieEo->getCreatedBy();
			$this->updatedBy = $movieEo->getUpdatedBy();
			if (null !== $movieEo->getCreatedDate()){
				$createdDate = $movieEo->getCreatedDate();
				$this->createdDateString = $dateTimeUtils->formatDisplayDateTimeString($createdDate);
			}
			$this->createdDate = $movieEo->getCreatedDate();
			if (null !== $movieEo->getUpdatedDate()){
				$updatedDate = $movieEo->getUpdatedDate();
				$this->updatedDateString = $dateTimeUtils->formatDisplayDateTimeString($updatedDate);
			}
			$this->updatedDate = $movieEo->getUpdatedDate();
			$this->remarks = $movieEo->getRemarks();
		}
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