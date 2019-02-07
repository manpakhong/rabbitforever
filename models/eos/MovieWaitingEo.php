<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
class MovieWaitingEo {
	protected $id;
	protected $movieId;
	protected $waitingSeq;
	protected $status;
	protected $createdBy;
	protected $updatedBy;
	protected $createdDate;
	protected $updatedDate;
	protected $remarks;
	function __construct( $movieWaitingVo = NULL ){
		if($movieWaitingVo !== NULL ){
			$this->id = $movieWaitingVo->id;
			$this->movieId = $movieWaitingVo->movieId;
			$this->waitingSeq = $movieWaitingVo->waitingSeq;
			$this->status = $movieWaitingVo->status;
			$this->createdBy = $movieWaitingVo->createdBy;
			$this->updatedBy = $movieWaitingVo->updatedBy;
			$this->createdDate = $movieWaitingVo->createdDate;
			$this->updatedDate = $movieWaitingVo->updatedDate;
			$this->remarks = $movieWaitingVo->remarks;
		}
	}
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getMovieId(){
		return $this->movieId;
	}
	public function setMovieId($movieId){
		$this->movieId=$movieId;
	}
	public function getWaitingSeq(){
		return $this->waitingSeq;
	}
	public function setWaitingSeq($waitingSeq){
		$this->waitingSeq=$waitingSeq;
	}
	public function getStatus(){
		return $this->status;
	}
	public function setStatus($status){
		$this->status=$status;
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