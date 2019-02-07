<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/MovieWaitingEo.php');
include_once( UTILS_PATH . '/DateTimeUtils.php');

class MovieWaitingVo {
	public $id;
	public $movieId;
	public $movieNameTc;
	public $movieNameEn;
	public $waitingSeq;
	public $status;
	public $statusString;
	public $createdBy;
	public $updatedBy;
	public $createdDateString;
	public $createdDate;
	public $updatedDateString;
	public $updatedDate;
	public $remarks;
	function __construct($movieWaitingEo = NULL){
		if ($movieWaitingEo !== NULL){
			$dateTimeUtils = DateTimeUtils::getInstance();
			$this->id = $movieWaitingEo->getId();
			$this->movieId = $movieWaitingEo->getMovieId();
			$this->waitingSeq = $movieWaitingEo->getWaitingSeq();
			$this->status = $movieWaitingEo->getStatus();
			$this->createdBy = $movieWaitingEo->getCreatedBy();
			$this->updatedBy = $movieWaitingEo->getUpdatedBy();
			if (null !== $movieWaitingEo->getCreatedDate()){
				$createdDate = $movieWaitingEo->getCreatedDate();
				$this->createdDateString = $dateTimeUtils->formatDisplayDateTimeString($createdDate);
			}
			$this->createdDate = $movieWaitingEo->getCreatedDate();
			if (null !== $movieWaitingEo->getUpdatedDate()){
				$updatedDate = $movieWaitingEo->getUpdatedDate();
				$this->updatedDateString = $dateTimeUtils->formatDisplayDateTimeString($updatedDate);
			}
			$this->updatedDate = $movieWaitingEo->getUpdatedDate();
			$this->remarks = $movieWaitingEo->getRemarks();
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