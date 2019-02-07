<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
class PicEo {
	protected $id;
	protected $fileName;
	protected $fileDescription;
	protected $createdBy;
	protected $updatedBy;
	protected $createdDate;
	protected $updatedDate;
	protected $remarks;
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getFileName(){
		return $this->fileName;
	}
	public function setFileName($fileName){
		$this->fileName=$fileName;
	}
	public function getFileDescription(){
		return $this->fileDescription;
	}
	public function setFileDescription($fileDescription){
		$this->fileDescription=$fileDescription;
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