<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
class MovieTypeEo {
	protected $id;
	protected $movieTypeId;
	protected $movieTypeDescEn;
	protected $movieTypeDescTc;
	protected $createdBy;
	protected $updatedBy;
	protected $createdDate;
	protected $updatedDate;
	protected $remarks;
	function __construct( $movieTypeVo = NULL ){
		if($movieTypeVo !== NULL ){
			$this->id = $movieTypeVo->id;
			$this->movieTypeId = $movieTypeVo->movieTypeId;
			$this->movieTypeDescEn = $movieTypeVo->movieTypeDescEn;
			$this->movieTypeDescTc = $movieTypeVo->movieTypeDescTc;
			$this->createdBy = $movieTypeVo->createdBy;
			$this->updatedBy = $movieTypeVo->updatedBy;
			$this->createdDate = $movieTypeVo->createdDate;
			$this->updatedDate = $movieTypeVo->updatedDate;
			$this->remarks = $movieTypeVo->remarks;
		}
	}
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getMovieTypeId(){
		return $this->movieTypeId;
	}
	public function setMovieTypeId($movieTypeId){
		$this->movieTypeId=$movieTypeId;
	}
	public function getMovieTypeDescEn(){
		return $this->movieTypeDescEn;
	}
	public function setMovieTypeDescEn($movieTypeDescEn){
		$this->movieTypeDescEn=$movieTypeDescEn;
	}
	public function getMovieTypeDescTc(){
		return $this->movieTypeDescTc;
	}
	public function setMovieTypeDescTc($movieTypeDescTc){
		$this->movieTypeDescTc=$movieTypeDescTc;
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