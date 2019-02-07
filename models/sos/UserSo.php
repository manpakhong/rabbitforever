<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/UserEo.php');
class UserSo extends UserEo{
	protected $createdDateFrom;
	protected $createdDateTo;
	protected $updatedDateFrom;
	protected $updatedDateTo;
	protected $orderBySoArray;
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