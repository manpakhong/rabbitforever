<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');

class OrderBySo{
	private $fieldName;
	private $isAsc;
	
	public function getFieldName(){
		return $this->fieldName;
	}
	
	public function setFieldName($fieldName){
		$this->fieldName = $fieldName;
	}
	
	public function getIsAsc(){
		return $this->isAsc;
	}
	
	public function setIsAsc($isAsc){
		$this->isAsc = $isAsc;
	}	
	public function __toString(){
		$objectString;
		$count = 0;
		foreach($this as $key => $value){
			if ($count > 0){
				$objectString = $objectString . ',';
			}
			$objectString = $objectString . '$key => $value ';
			$count = $count + 1;
		}
		return $objectString;
	}
}
?>