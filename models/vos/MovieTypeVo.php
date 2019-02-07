<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/MovieTypeEo.php');
class MovieTypeVo {
	public $id;
	public $movieTypeId;
	public $movieTypeDescEn;
	public $movieTypeDescTc;
	public $createdBy;
	public $updatedBy;
	public $createdDate;
	public $updatedDate;
	public $remarks;
	function __construct($movieTypeEo = NULL){
		if ($movieTypeEo !== NULL){
			$this->id = $movieTypeEo->getId();
			$this->movieTypeId = $movieTypeEo->getMovieTypeId();
			$this->movieTypeDescEn = $movieTypeEo->getMovieTypeDescEn();
			$this->movieTypeDescTc = $movieTypeEo->getMovieTypeDescTc();
			$this->createdBy = $movieTypeEo->getCreatedBy();
			$this->updatedBy = $movieTypeEo->getUpdatedBy();
			$this->createdDate = $movieTypeEo->getCreatedDate();
			$this->updatedDate = $movieTypeEo->getUpdatedDate();
			$this->remarks = $movieTypeEo->getRemarks();
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