<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/MovieWaitingEo.php');
class MovieWaitingSo extends MovieWaitingEo{
	protected $idArray;
	protected $updatedByFrom;
	protected $updatedByTo;
	protected $createdDateFrom;
	protected $createdDateTo;
	protected $updatedDateFrom;
	protected $updatedDateTo;
	protected $orderBySoArray;
	protected $limitFrom;
	protected $limitOffset;
	protected $movieIdArray;
	
	public function addId($id){
		if (!isset($this->idArray)){
			$this->idArray = array();
		}
		array_push($this->idArray, $id);
	}
	public function setMovieIdArray($movieIdArray){
		$this->movieIdArray = $movieIdArray;
	}
	public function getMovieIdArray(){
		return $this->movieIdArray;
	}
	public function setIdArray($idArray){
		$this->idArray = $idArray;
	}
	public function getIdArray(){
		return $this->idArray;
	}
	public function getUpdatedByFrom(){
		return $this->updatedByFrom;
	}
	public function setUpdatedByFrom($updatedByFrom){
		$this->updatedByFrom = $updatedByFrom;
	}
	public function getCreatedDateFrom(){
		return $this->createdDateFrom;
	}
	public function setCreatedDateFrom($createdDateFrom){
		$this->createdDateFrom = $createdDateFrom;
	}
	public function getUpdatedDateFrom(){
		return $this->updatedDateFrom;
	}
	public function setUpdatedDateFrom($updatedDateFrom){
		$this->updatedDateFrom = $updatedDateFrom;
	}
	public function getOrderBySoArray(){
		return $this->orderBySoArray;
}
	public function addOrderBySo($orderBySo){
		if(!isset($this->orderBySoArray)){
			$this->orderBySoArray = array();
		}
		array_push($this->orderBySoArray, $orderBySo);
	}
	public function getLimitFrom(){
		return $this->limitFrom;
}
	public function setLimitFrom($limitFrom){
		$this->limitFrom = $limitFrom;
	}
	public function getLimitOffset(){
		return $this->limitOffset;
}
	public function setLimitOffset($limitOffset){
		$this->limitOffset = $limitOffset;
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